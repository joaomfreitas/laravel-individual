<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use SoftDeletes;
    //

    protected $fillable = [
        'name', 'age', 'position', 'nationality', 'condition', 'team', 'image'
    ];

    public function teamInfo(){
        return $this->belongsTo('App\Team', 'team');
    }


}
