@extends('layouts.bo')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1 class="h3 mb-2 text-gray-800">Leagues</h1>
        </div>
    </div>
    <!-- DataTales Example -->
    <a href={{route('web.leagues.create')}}>
        <button type="button" class="btn btn-primary">+ Add League</button>
    </a>
    <div class="mb-5 p-2">
        <div class="row">
            @foreach($leagues as $league)
                <div class="col-lg-3 col-xs-6 col-sm-6 p-2 text-center card">
                    <a style="color: black" href={{route('web.leagues.show', $league->id)}}>
                        <div class="card-body hoverCard">
                            <img src="uploads/{{$league->image}}" height="100"/>
                        </div>
                        <h4>{{$league->name}}</h4>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
