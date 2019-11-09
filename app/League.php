<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class League extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'name', 'country', 'image',
    ];

    public function teams(){
        return $this->hasMany('App\Team', 'league');
    }

}
