<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    // 子モデル
    public function parent()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
