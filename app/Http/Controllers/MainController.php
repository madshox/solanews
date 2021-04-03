<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPostReady;
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
                    'category' => $cat,
                    'description' => $description,
                    'img' => str_replace('D:\OSPanel\domains\solanews\storage/app/public/', '', $images_url)
                ]);

                ProcessPostReady::dispatch($create_post);
            }
        }
    }
}
