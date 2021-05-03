<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $posts = Post::where('status', 1)->orderBy('created_at', 'desc')->get();
        View::share('posts', $posts);

        $popularPost = Post::where('status', 1)->orderBy('count_view', 'desc')->get();
        View::share('popularPost', $popularPost);

        $categories = Category::get();
        View::share('categories', $categories);

        $tags = Tag::get();
        View::share('tags', $tags);
    }
}
