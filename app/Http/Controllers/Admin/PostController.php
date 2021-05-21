<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::where('lang', 'uz')->paginate(10);
        return view('dashboard.posts.index', compact('posts'));
    }

    public function index_k()
    {
        $posts = Post::where('lang', 'k')->paginate(10);
        return view('dashboard.posts.index_k', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        $page = request('page')?? 1;

        $tagg = $post->tags->map(function ($item, $key) {
            return $item['id'];
        });
        $categories = Category::get();

        return view('dashboard.posts.form', compact( 'post', 'categories', 'tagg', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, Post $post)
    {
        $page = $request->get('page');
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'category_id' => Category::where('slug', $request->category)->value('id'),
            'status' => $request->status ? 1 : 0
        ]);

        for ($i=0; $i < count($request['tags']); $i++) {
            if(!$post->tags->contains($request['tags'][$i])) {
                $post->tags()->attach($request['tags'][$i]);
            }
        }

        foreach ($post->tags as $tag) {
            if (!collect($request['tags'])->contains($tag->id)) {
                $post->tags()->detach($tag->id);
            }
        }

        if ($post->lang === 'uz') {
            return redirect("/admin/posts?page=$page")->with('warning', 'Пост успешно отредактирован');
        } else {
            return redirect("/admin/posts_k?page=$page")->with('warning', 'Пост успешно отредактирован');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        $url = $_POST['current_page'];
        $post->delete();
        if ($post->lang === 'uz') {
            return redirect()->to('admin/posts' . '?page=' . $url)->with('danger', 'Пост успешно удален');
        } else {
            return redirect()->to('admin/posts_k' . '?page=' . $url)->with('danger', 'Пост успешно удален');
        }
    }
}
