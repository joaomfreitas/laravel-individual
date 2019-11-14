@extends('layouts.bo')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Edit Game</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('web.games.update', $game->id )}}" enctype="multipart/form-data">

                @csrf
                @method('put')
                <div class="form-group row">
                    <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('date') }}</label>

                    <div class="col-md-6">
                        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ $game->date }}" autocomplete="date" >

                        @error('date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="home_team" class="col-md-4 col-form-label text-md-right">{{ __('home_team') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" id="home_team" name='home_team' form="editgame">
                            @foreach($teams->sortBy('name') as $team)
                                @if($team->id == $game->home_team)
                                    <option selected="selected" value={{$team->id}}>{{$team->name}}</option>
                                @else
                                    <option value={{$team->id}}>{{$team->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="home_goals" class="col-md-4 col-form-label text-md-right">{{ __('Home Goals') }}</label>

                    <div class="col-md-6">
                        <input id="home_goals" type="number" class="form-control @error('home_goals') is-invalid @enderror" name="home_goals" value="{{ $game->home_goals }}" autocomplete="home_goals">

                        @error('home_goals')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="away_team" class="col-md-4 col-form-label text-md-right">{{ __('away_team') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" id="away_team" name='away_team' form="editgame">
                            @foreach($teams->sortBy('name') as $team)
                                @if($team->id == $game->away_team)
                                    <option selected="selected" value={{$team->id}}>{{$team->name}}</option>
                                @else
                                    <option value={{$team->id}}>{{$team->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="away_goals" class="col-md-4 col-form-label text-md-right">{{ __('Away Goals') }}</label>

                    <div class="col-md-6">
                        <input id="away_goals" type="number" class="form-control @error('away_goals') is-invalid @enderror" name="away_goals" value="{{ $game->away_goals }}" autocomplete="away_goals">

                        @error('away_goals')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                    <div class="col-md-6">
                        <img src="/uploads/{{$player->image}}" height="100"/>
                        <input id="image" type="file" class="@error('image') is-invalid @enderror" name="image">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Edit Game
                        </button>
                    </div>
                </div>
            </form>
        </div>


@endsection
