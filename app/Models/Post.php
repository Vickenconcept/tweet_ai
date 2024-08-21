<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['autobot_id', 'title', 'body'];

    public function autobot()
    {
        return $this->belongsTo(Autobot::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
