<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable =
        [
          'post_id',
            'author',
            'email',
            'body',
            'is_active',
            'photo',
            'comment_id'
        ];
    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
