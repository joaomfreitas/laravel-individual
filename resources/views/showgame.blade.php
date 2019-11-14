@extends('layouts.bo')
@section('content')

    <!-- DataTales Example -->
    {{--    <a href={{route('web.leagues.create')}}>--}}
    {{--        <button type="button" class="btn btn-primary">+ Add League</button>--}}
    {{--    </a>--}}
    <div class="mb-5 p-2">
        <div class="row">
            <div class="col-12 card" style="margin-bottom: 20px">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 p-2 text-center ">
                            <div class="row">
                                <div class="col-4 p-2">
                                    <img src="../uploads/{{$game->homeTeam->image}}" height="100"/>
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
                                        <div class="col-12">
                                            <a href='{{$game->id}}/edit'>
                                                <button type="button" class="btn btn-primary btn-sm">Edit Game</button>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalBonito">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 p-2">
                                    <img src="../uploads/{{$game->awayTeam->image}}" height="100"/>
                                    <h4>{{$game->awayTeam->name}}</h4>
                                    <h3>AWAY</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5 p-2">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        @foreach($players->sortBy('name')->where('team', $game->homeTeam->id) as $player)
                            <div class="col-12 p-2 text-center card">
                                <a style="color: black" href={{route('web.players.show', $player->id)}}>
                                    <div class="card-body hoverCard">
                                        <img src="../uploads/{{$player->image}}" height="100"/>
                                    </div>
                                    <h4>{{$player->name}}</h4>
                                    <h5>
                                        <img src="../uploads/{{$player->teamInfo->image}}" height="35"/>
                                        {{$player->position}}
                                    </h5>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        @foreach($players->sortBy('name')->where('team', $game->awayTeam->id) as $player)
                            <div class="col-12 p-2 text-center card">
                                <a style="color: black" href={{route('web.players.show', $player->id)}}>
                                    <div class="card-body hoverCard">
                                        <img src="../uploads/{{$player->image}}" height="100"/>
                                    </div>
                                    <h4>{{$player->name}}</h4>
                                    <h5>
                                        <img src="../uploads/{{$player->teamInfo->image}}" height="35"/>
                                        {{$player->position}}
                                    </h5>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" id='modalBonito' role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Game</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>You're about to delete this game are you sure you want to delete it?</p>
                    </div>
                    <div class="modal-footer">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('web.games.destroy', $game->id )}}">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
