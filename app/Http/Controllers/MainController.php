<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPostReady;
use App\Models\Category;
use App\Models\Post;
use Goutte\Client;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        return view('index');
    }

    public function deleteAllPosts() {
        Post::where('status', 0)->delete();
        return redirect()->route('posts.index');
    }

    public function category($slug) {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::get();
        return view('category', compact('category', 'posts'));
    }

    public function post($slug, $post) {
        $category = Category::where('slug', $slug)->first();
        $post = Post::where('id', $post)->first();
        return view('post-item', compact('category', 'post'));
    }

    public function parse()
    {
//        $this->dispatch(new ProcessPostReady);
//        return redirect()->route('posts.index');

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
                    $images = 'https://daryo.uz/assets/images/logo.svg?s=1';
                }

                //get posts descriptions
                $description = $post->filter('.postContent')->filter('p')->each(function ($node) {
                    return $node->text();
                });
                $description = implode($description);

                sleep(1);

                $create_post = Post::create([
                    'title' => $title[0],
                    'category' => $cat,
                    'description' => $description,
                ]);

                ProcessPostReady::dispatch($create_post);
            }
        }
    }
}
