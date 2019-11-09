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
                        <div class="col-lg-3 col-sm-6 text-center">
                            <img src="../uploads/{{$team->image}}" height="130"/>
                        </div>
                        <div class="col-lg-9 col-sm-6 p-2">
                            <h2>{{$team->name}}</h2>
                            <div>
                                <h5>Number of Players: {{count($team->getPlayers)}}</h5>
                                <h5>City: {{$team->city}}</h5>
                            </div>
                            <div>
                                <a href='{{$team->id}}/edit'>
                                    <button type="button" class="btn btn-primary btn-sm">Edit League</button>
                                </a>
                                <a href="">
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:15px">
                <div class="col-md-8">
                    <h1 class="h3 mb-2 text-gray-800">Players</h1>
                </div>
            </div>

            @foreach($team->getPlayers as $player)
                <div class="col-12 p-1 card" style="margin-top: 20px">
                    <a style="color:black" href={{route('web.teams.show', $player->id)}}>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2 col-sm-4 text-center">
                                    <img src="../uploads/{{$team->image}}" height="100"/>
                                </div>
                                <div class="col p-2 ">
                                    <div class="row">
                                        <div class="col-xs-12 col-lg-12">
                                            <h3>{{$player->name}}</h3>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <h5>Age: {{$player->age}}</h5>
                                            <h5>Position: {{$player->position}}</h5>
                                        </div>
                                        <div class='col-xs-12 col-md-6'>
                                            <h5>Nationality: {{$player->nationality}}</h5>
                                            <h5>Condition: {{$player->condition}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    {{--                @foreach($league->teams as $team)--}}
                    {{--                    <p>{{$team->name}}</p>--}}
                    {{--                @endforeach--}}
                </div>
            @endforeach
        </div>
    </div>

@endsection
