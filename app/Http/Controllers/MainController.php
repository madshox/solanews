<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $client = new Client();
        $crawler = $client->request('GET', 'https://daryo.uz/uz/feed/');

        //get posts links
        $links = $crawler->filter('item')->filter('link')->each(function ($node) {
            return $node->text();
        });
        $post_links = compact('links');


        $post_cats = [];
        $post_titles = [];
        $post_images = [];
        $post_descriptions = [];
        foreach ($post_links as $post_link) {
            foreach ($post_link as $link) {
                //get posts cats
                $post = $client->request('GET', $link);
//                $cat = str_replace('/category', '', $post->filter('.itemCat a')->attr('href'));
//                    if(!str_contains($cat, 'reklama')) {
//                        $post_cats[] = trim($cat, '/');
//                    }

                //get posts titles
                $title = $post->filter('.articleContHead')->filter('h1')->each(function ($node) {
                    return $node->text();
                });
                $post_titles[] = $title;

//                //get posts images
//                $images = $post->filter('.postContent img')->attr('src');
//                $post_images[] = $images;

                //get posts descriptions
                $description = $post->filter('.postContent')->filter('p')->each(function ($node) {
                    return $node->text();
                });
                $post_descriptions[] = $description;
            }
        }
        $postDatas = collect($post_titles, $post_descriptions);
        return view('welcome', compact('post_titles', 'post_descriptions'));
    }
}
