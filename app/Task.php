<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'project_id',
        'user_id',
        'company_id',
        'days',
        'hours'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function Users(){
        return $this->belongsToMany('App\User');
    }

    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }
}
