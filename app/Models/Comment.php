<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'description',
        'status',
        'role',
        'parent_id',
        'user_id',
        'post_id',

    ];



    /*     public function post()
    {
        return $this->BelongsTo(Post::class);
    } */

    public function user()
    {
        return $this->BelongsTo(User::class, 'user_id');
    }

    public function parent()
    {
        return $this->BelongsTo(Comment::class, 'parent_id');
    }
    public function responses()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
