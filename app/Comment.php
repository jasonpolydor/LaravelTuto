<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'body',
        'url',
        'user_id',
        'commentable_id',
        'commentable_type'
    ];

    public function commentable(){
        return $this->morphTo();
    }

    public function user(){
        return $this->hasOne('\App\User', 'id', 'user_id');
    }
}
