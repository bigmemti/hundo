<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'message',
        'comment_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function comment() {
        return $this->belongsTo(Comment::class);
    }

    public function replies() {
        return $this->hasMany(Comment::class);
    }

    public function createdAt(): Attribute {
        return Attribute::make(get : fn($value) => Carbon::parse($value)->format('F d, Y  \a\t h:i a'));
    }
}
