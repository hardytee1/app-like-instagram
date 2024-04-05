<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id'];

    // Define the relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with Post model
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}