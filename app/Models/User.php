<?php

namespace App\Models;

use App\Mail\PasswordResetEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $table = "laravel_users";

    protected $attributes = [
        "facebook_link" => "",
        "twitter_link" => "",
        "linkedin_link" => "",
        "instagram_link" => "",
    ];

    protected $fillable = [
        "id",
        'fullname',
        'username',
        'email',
        'password',
        'image_file',
        "facebook_link",
        "twitter_link",
        "linkedin_link",
        "instagram_link",
        "location",
        "bio",
        "job_title"
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, "user_id", "id");
    }

    public function getRouteKeyName()
    {
        return "username";
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where("username", $value)->firstOrFail();
    }

    public function sendPasswordResetNotification($token)
    {
        $link = getenv("APP_URL") .  "/reset-password";
        $email = $this->email;
        $username = $this->username;
        $data = compact("link", "email", "token", "username");
        Mail::to($email)->send(new PasswordResetEmail($data));
    }

}
