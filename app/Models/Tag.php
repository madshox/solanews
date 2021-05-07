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
            ->orderBy('updated_at', 'desc');
    }

    public function popularPosts() {
        return $this->belongsToMany(Post::class)->where('status', 1)
            ->orderBy('count_view', 'desc');
    }
}
