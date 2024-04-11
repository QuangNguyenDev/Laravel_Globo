<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Models\PostCategory;
use App\Models\Users;
use App\Models\Post;
use App\Models\Categories;
use App\Models\PostTags;
use App\Models\PostMeta;
use App\Models\PostComment;
use App\Models\Tags;

class RouteServiceProvider extends ServiceProvider
{
    // Other methods...

    public function boot()
    {
        parent::boot();

        // Define route model bindings
        Route::model('users', Users::class);
        Route::model('posts', Post::class);
        Route::model('categories',Categories::class);
        Route::model('tags', Tags::class);
        Route::model('postCategory', PostCategory::class);
        Route::model('postTags', PostTags::class);
        Route::model('postMeta', PostMeta::class);
        Route::model('postComment', PostComment::class);
    }
}
