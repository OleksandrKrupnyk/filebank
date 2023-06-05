<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::enforceMorphMap([
            'profile' => UserProfile::class,
            'article' => Article::class,
            'user' => User::class
        ]);
    }
}
