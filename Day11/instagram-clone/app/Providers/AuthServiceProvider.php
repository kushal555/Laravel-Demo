<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
//        \App\Post::class => \App\Policies\PostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // we define the rule for view the post for particular user
        Gate::define('show-post',function($user,$post){
            return $user->id == $post->user_id;
        });
        Gate::define('update-post',function($user,$post){
            return $user->id == $post->user_id;
        });
        Gate::define('policy-status',function($user,$post){
            return $user->id == $post->user_id;
        });
    }
}
