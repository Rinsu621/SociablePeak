<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'description', 'likes', 'comments','set_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function likes()
    // {
    //     return $this->hasMany(Like::class);
    // }
}
