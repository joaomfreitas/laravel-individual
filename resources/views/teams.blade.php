@extends('layouts.bo')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1 class="h3 mb-2 text-gray-800">Teams</h1>
        </div>
    </div>
    <!-- DataTales Example -->
    <a href={{route('web.teams.create')}}>
        <button type="button" class="btn btn-primary">+ Add Team</button>
    </a>
    <div class="mb-2" style="margin-top:20px">
        Sort by:
        <a href="?sort=name">
            <button type="button" class="btn btn-secondary">NAME</button>
        </a>
        <a href="?sort=budget">
            <button type="button" class="btn btn-secondary">BUDGET</button>
        </a>
        <a href="?sort=city">
            <button type="button" class="btn btn-secondary">CITY</button>
        </a>
        <a href="?sort=league">
            <button type="button" class="btn btn-secondary">LEAGUE (ID)</button>
        </a>
    </div>
    <div class="mb-5 p-2">
        <div class="row">
            @foreach($teams->sortBy(app('request')->input('sort')) as $team)
                <div class="col-lg-3 col-xs-6 col-sm-6 p-2 text-center card">
                    <a style="color: black" href={{route('web.teams.show', $team->id)}}>
                        <div class="card-body hoverCard">
                            <img src="uploads/{{$team->image}}" height="100"/>
                        </div>
                        <h4>{{$team->name}}</h4>
                        <h5>{{$team->getLeague->name}}</h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
