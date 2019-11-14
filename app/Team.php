<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;
    //

    protected $fillable = [
        'name', 'budget', 'city', 'image', 'league'
    ];

    protected function getLeague(){
        return $this->belongsTo('App\League', 'league');
    }

    protected function getPlayers(){
        return $this->hasMany('App\Player', 'team');
    }
}
