<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["caption", "image_url", "like_count", "user_id"]; // Updated fillable attributes

    /**
     * Define the relationship with User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship with the Like model.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}