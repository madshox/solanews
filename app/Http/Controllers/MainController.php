<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPostReady;
use App\Models\Post;
use Goutte\Client;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
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
                    'img' => $images,
                    'description' => $description,
                ]);

                ProcessPostReady::dispatch($create_post);
            }
        }
    }
}
