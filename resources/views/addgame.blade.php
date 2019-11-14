@extends('layouts.bo')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Create New Game</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('web.games.store') }}" enctype="multipart/form-data" id="addgame">

                @csrf
                <div class="form-group row">
                    <label for="home_team" class="col-md-4 col-form-label text-md-right">{{ __('Home Team') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" id="home_team" name='home_team' form="addgame">
                            @foreach($teams->sortBy('name') as $team)
                                <option value={{$team->id}}>{{$team->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="home_goals" class="col-md-4 col-form-label text-md-right">{{ __('Home Goals') }}</label>

                    <div class="col-md-6">
                        <input id="home_goals" type="number" class="form-control @error('home_goals') is-invalid @enderror" name="home_goals" value="{{ old('home_goals') }}" required autocomplete="home_goals">

                        @error('home_goals')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="away_team" class="col-md-4 col-form-label text-md-right">{{ __('Away Team') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" id="away_team" name='away_team' form="addgame">
                            @foreach($teams->sortBy('name') as $team)
                                <option value={{$team->id}}>{{$team->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="away_goals" class="col-md-4 col-form-label text-md-right">{{ __('Away Goals') }}</label>

                    <div class="col-md-6">
                        <input id="away_goals" type="number" class="form-control @error('away_goals') is-invalid @enderror" name="away_goals" value="{{ old('away_goals') }}" required autocomplete="away_goals">

                        @error('away_goals')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                    <div class="col-md-6">
                        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" >

                        @error('date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Add Game
                        </button>
                    </div>
                </div>
            </form>
        </div>


@endsection
