<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Jobs\ProcessPostReady;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Post;
use App\Models\Tag;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index() {
        return view('index');
    }

    public function deleteAllPosts() {
        $not_publish_posts = Post::where('status', 0)->get();
        foreach ($not_publish_posts as $not_publish_post) {
            Storage::disk('public')->delete($not_publish_post->img);
        }
        Post::where('status', 0)->delete();
        return redirect()->route('posts.index');
    }

    public function deleteAllSelect(Request $request)
    {
        $ids = $request->ids;
        Post::whereIn('id', explode(',', $ids))->delete();
        return redirect()->route('posts.index')->with('danger', 'Посты успешно удалены');;
    }

    public function category($slug) {
        $cat = Category::where('slug', $slug)->first();
        $posts = Post::get();
        return view('category', compact('cat', 'posts'));
    }

    public function tag($tag) {
        $tag = Tag::where('name', $tag)->first();
        $tagList = Tag::get();
        return view('tag', compact('tag', 'tagList'));
    }

    public function post($slug, $post) {
        $cat = Category::where('slug', $slug)->first();
        $post = Post::where('id', $post)->first();

        //views
        $blogKey = 'blog_' . $post->id;
        if(!Session::has($blogKey)) {
            $post->increment('count_view');
            Session::put($blogKey, 1);
        }

        return view('post-item', compact('cat', 'post'));
    }

    public function ads() {
        return view('ads');
    }

    public function contacts() {
        return view('contacts');
    }

    public function feedback(FeedbackRequest $request) {
        Feedback::create($request->only(['name', 'phone', 'description']));
        return Redirect::back()->with('success', true);
    }

    public function parse()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://daryo.uz/uz/feed/');

        //get posts links
        $links = $crawler->filter('item')->filter('link')->each(function ($node) {
            return $node->text();
        });
        $post_links = compact('links');
        foreach ($post_links as $post_link) {
            foreach ($post_link as $link) {
                $post = $client->request('GET', $link);
                if (http_response_code() === 500) {
                    continue;
                }
                //get posts cats
                $cat = str_replace('/category', '', $post->filter('.itemCat a')->attr('href'));
                $cat = trim($cat, '/');
                $category = Category::where('title', $cat)->firstOr(function () {
                    return $cat = Category::where('title', 'yangiliklar')->first();
                });

                //get posts titles
                $title = $post->filter('.articleContHead')->filter('h1')->each(function ($node) {
                    return $node->text();
                });

                //get posts tags
                $tags = $post->filter('.postContent')->filter('p')->each(function ($node) {
                    return $node->text();
                });
                $tags = implode($tags);

                //get posts images
                if ($post->filter('.postContent img')->count() != 0) {
                    $images = $post->filter('.postContent img')->attr('src');
                } else {
                    $images = '//daryo.uz/assets/images/logo.svg?s=1';
                }

                //get posts descriptions
                $description = $post->filter('.postContent')->filter('p')->each(function ($node) {
                    return $node->text();
                });
                $description = implode($description);

                sleep(1);

                if(!is_dir(storage_path() . '/app/public/images/')){
                    mkdir(storage_path() . '/app/public/images/');
                    $images_url = storage_path() . '/app/public/images/' . time() . '.jpg';
                }
                else {
                    $images_url = storage_path() . '/app/public/images/' . time() . '.jpg';
                }

                if(str_contains($images, 'http:')) {
                    $img = $images;
                }
                else {
                    $img = 'http:' . $images;
                };

                file_put_contents($images_url, file_get_contents($img));


                $create_post = Post::create([
                    'title' => $title[0],
                    'category_id' => $category->id,
                    'category' => $category->title,
                    'description' => $description,
                    'img' => str_replace(storage_path() . '/app/public/', '', $images_url),
                    'news_source' => $link
                ]);

                ProcessPostReady::dispatch($create_post);
            }
        }
//        $this->dispatch(new ProcessPostReady);
//        return redirect()->route('posts.index');
    }
}
