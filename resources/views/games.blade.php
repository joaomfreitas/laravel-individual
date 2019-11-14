@extends('layouts.bo')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1 class="h3 mb-2 text-gray-800">Games</h1>
        </div>
    </div>
    <!-- DataTales Example -->
    <a href={{route('web.games.create')}}>
        <button type="button" class="btn btn-primary">+ Add Game</button>
    </a>
    <div class="mb-2" style="margin-top:20px">
        Sort by:
        <a href="?sort=date">
            <button type="button" class="btn btn-secondary">OLDEST TO NEWEST</button>
        </a>
        <a href="?sort=home_goals">
            <button type="button" class="btn btn-secondary">GOALS SCORED HOME ASC</button>
        </a>
        <a href="?sort=away_goals">
            <button type="button" class="btn btn-secondary">GOALS SCORED AWAY ASC</button>
        </a>
    </div>
    <div class="mb-5 p-2">
        <div class="row">
            @foreach($games->sortBy(app('request')->input('sort')) as $game)
                <div class="col-12 p-2 text-center card">
                    <a style="color: black" href={{route('web.games.show', $game->id)}}>
                        <div class="card-body hoverCard">
                            <div class="row">
                                <div class="col-4 p-2">
                                    <img src="uploads/{{$game->homeTeam->image}}" height="100"/>
                                    <h4>{{$game->homeTeam->name}}</h4>
                                    <h3>HOME</h3>
                                </div>
                                <div class="col-4 my-auto">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>{{$game->date}}</h4>
                                        </div>
                                        <div class="col-6 text-center my-auto">
                                            @if($game->home_goals > $game->away_goals)
                                                <h1 style="color:forestgreen">{{$game->home_goals}}</h1>
                                            @else
                                                <h1 style="color:black">{{$game->home_goals}}</h1>
                                            @endif
                                        </div>
                                        <div class="col-6 text-center my-auto">
                                            @if($game->away_goals > $game->home_goals)
                                                <h1 style="color:forestgreen">{{$game->away_goals}}</h1>
                                            @else
                                                <h1 style="color:black">{{$game->away_goals}}</h1>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 p-2">
                                    <img src="uploads/{{$game->awayTeam->image}}" height="100"/>
                                    <h4>{{$game->awayTeam->name}}</h4>
                                    <h3>AWAY</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
