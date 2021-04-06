<?php

namespace App\Jobs;

use App\Models\Category;
use App\Models\Post;
use Goutte\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessPostReady implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
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
                $category = Category::firstOrCreate([
                    'title' => $cat
                ]);

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
                    'category' => $cat,
                    'description' => $description,
                    'img' => str_replace(storage_path() . '/app/public/', '', $images_url),
                    'news_source' => $link
                ]);

                ProcessPostReady::dispatch($create_post);
            }
        }
    }
}
