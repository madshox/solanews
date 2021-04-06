<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPostReady;
use App\Models\Category;
use App\Models\Post;
use Goutte\Client;
use Illuminate\Http\Request;
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

    public function category($slug) {
        $cat = Category::where('slug', $slug)->first();
        $posts = Post::get();
        return view('category', compact('cat', 'posts'));
    }

    public function post($slug, $post) {
        $cat = Category::where('slug', $slug)->first();
        $post = Post::where('id', $post)->first();
        return view('post-item', compact('cat', 'post'));
    }

    public function parse()
    {
        $this->dispatch(new ProcessPostReady);
        return redirect()->route('posts.index');
    }
}
