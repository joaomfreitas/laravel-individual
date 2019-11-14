<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date', 'home_team', 'away_team', 'home_goals', 'away_goals'
    ];

    public function homeTeam(){
        return $this->belongsTo('App\Team', 'home_team');
    }

    public function awayTeam(){
        return $this->belongsTo('App\Team', 'away_team');
    }

    //
}
