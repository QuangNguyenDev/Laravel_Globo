<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'authorId',
        'parentId',
        'title',
        'metaTitle',
        'slug',
        'summary',
        'published',
        'content',
    ];

    protected static function boot()
    {
        parent::boot();

        // Automatically generate slug before creating a new post
        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
            $post->metaTitle = $post->title;
        });
    }
}
