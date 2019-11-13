@extends('layouts.bo')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1 class="h3 mb-2 text-gray-800">Players</h1>
        </div>
    </div>
    <!-- DataTales Example -->
    <a href={{route('web.players.create')}}>
        <button type="button" class="btn btn-primary">+ Add Player</button>
    </a>
    <div class="mb-2" style="margin-top:20px">
        Sort by:
        <a href="?sort=name">
            <button type="button" class="btn btn-secondary">NAME</button>
        </a>
        <a href="?sort=position">
            <button type="button" class="btn btn-secondary">POSITION</button>
        </a>
        <a href="?sort=team">
            <button type="button" class="btn btn-secondary">TEAM</button>
        </a>
    </div>
    <div class="mb-5 p-2">
        <div class="row">
            @foreach($players->sortBy(app('request')->input('sort')) as $player)
                <div class="col-lg-3 col-xs-6 col-sm-6 p-2 text-center card">
                    <a style="color: black" href={{route('web.players.show', $player->id)}}>
                        <div class="card-body hoverCard">
                            <img src="uploads/{{$player->image}}" height="100"/>
                        </div>
                        <h4>{{$player->name}}</h4>
                        <h5>
                            <img src="uploads/{{$player->teamInfo->image}}" height="35"/>
                            &nbsp;{{$player->teamInfo->name}}
                        </h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
