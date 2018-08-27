<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'company_id',
        'user_id',
        'days'
    ];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }
}
