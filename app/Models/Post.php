<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $table = "laravel_posts";

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        "id",
        'user_id',
        'content',
        'category',
        'image_file',
        'filename',
        'title',
    ];

    public function resolveRouteBinding($value, $field = null)
    {
        if (!Str::isUuid($value)) {
            return abort(404);
        }

        return $this->findOrFail($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
