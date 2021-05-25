<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

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
            ->where('lang', 'k')->orderBy('updated_at', 'desc');
    }

    public function popularPostsKr() {
        return $this->belongsToMany(Post::class)->where('status', 1)
            ->where('lang', 'k')->orderBy('count_view', 'desc');
    }
}
