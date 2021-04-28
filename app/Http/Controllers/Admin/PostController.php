<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('dashboard.posts.index', compact('posts'));
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
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tagg = $post->tags->map(function ($item, $key) {
            return $item['id'];
        });
        $categories = Category::get();
        return view('dashboard.posts.form', compact( 'post', 'categories', 'tagg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'category_id' => Category::where('slug', $request->category)->value('id'),
            'status' => $request->status ? 1 : 0
        ]);
        //requestda tags bor, nado if kotoryy udalyaet ne xvatayushiy tegi
        $post->tags()->attach(request('tags'));

        return redirect()->route('posts.index')->with('warning', 'Пост успешно отредактирован');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $url = $_POST['current_page'];
        $post->delete();
        return redirect()->to('admin/posts' . '?page=' . $url)->with('danger', 'Пост успешно удален');
    }
}
