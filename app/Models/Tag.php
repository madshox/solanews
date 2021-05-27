<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    Use Sluggable;

    protected $casts = [
        'name' => 'array'
    ];

    protected $guarded = [
        'id'
    ];

    public function posts() {
        return $this->belongsToMany(Post::class);
    }

    public function latestPosts() {
        return $this->belongsToMany(Post::class)->where('status', 1)
            ->where('lang', 'uz')->orderBy('updated_at', 'desc');
    }

    public function popularPosts() {
        return $this->belongsToMany(Post::class)->where('status', 1)
            ->where('lang', 'uz')->orderBy('count_view', 'desc');
    }

    public function latestPostsKr() {
        return $this->belongsToMany(Post::class)->where('status', 1)
            ->where('lang', 'kr')->orderBy('updated_at', 'desc');
    }

    public function popularPostsKr() {
        return $this->belongsToMany(Post::class)->where('status', 1)
            ->where('lang', 'kr')->orderBy('count_view', 'desc');
    }

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
