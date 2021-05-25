<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory;
    Use Sluggable;

    protected $casts = [
        'title' => 'array'
    ];

    protected $guarded = [
      'id'
    ];

    public function posts() {
        return $this->hasMany(Post::class)->where('status', 1)
            ->orderBy('created_at', 'desc');
    }

    public function latestPosts() {
        return $this->hasMany(Post::class)->where('status', 1)
            ->where('lang', 'uz')->orderBy('created_at', 'desc')->limit(5);
    }

    public function popularPosts() {
        return $this->hasMany(Post::class)->where('status', 1)
            ->where('lang', 'uz')->orderBy('count_view', 'desc')->limit(5);
    }

    public function latestPostsKr() {
        return $this->hasMany(Post::class)->where('status', 1)
            ->where('lang', 'k')->orderBy('created_at', 'desc')->limit(5);
    }

    public function popularPostsKr() {
        return $this->hasMany(Post::class)->where('status', 1)
            ->where('lang', 'k')->orderBy('count_view', 'desc')->limit(5);
    }

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
