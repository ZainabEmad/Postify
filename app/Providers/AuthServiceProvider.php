<?php

namespace App\Providers;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;
use App\Policies\UserPolicy;
use App\Policies\PostPolicy;
use App\Policies\TagPolicy;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        User::class => UserPolicy::class,
        Post::class => PostPolicy::class,
        Tag::class => TagPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
