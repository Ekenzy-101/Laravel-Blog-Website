<?php

namespace App\Providers;

use App\Mail\VerifyUserEmail;
use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            $email = $notifiable->email;
            $username = $notifiable->username;
            $data = compact("email", "username", "notifiable", "url");
            return (new VerifyUserEmail($data))->to($notifiable->email);
        });

        ResetPassword::createUrlUsing(function ($user, string $token) {
            $app_url = getenv("APP_URL");

            return "{$app_url}/reset-password?token={$token}";
        });
    }
}
