<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory;
    Use Sluggable;

    protected $guarded = [
      'id'
    ];

    public function posts() {
        return $this->hasMany(Post::class)->where('status', 1)
            ->orderBy('created_at', 'desc');
    }

    public function latestPosts() {
        return $this->hasMany(Post::class)->where('status', 1)
            ->orderBy('created_at', 'desc')->limit(5);
    }

    public function popularPosts() {
        return $this->hasMany(Post::class)->where('status', 1)
            ->orderBy('count_view', 'desc')->limit(5);
    }

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
