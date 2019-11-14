@extends('layouts.bo')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Edit Team</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('web.players.update', $player->id )}}" enctype="multipart/form-data" id="editplayer">

                @csrf
                @method('put')
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $player->name }}" autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('age') }}</label>

                    <div class="col-md-6">
                        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ $player->age }}" autocomplete="age">

                        @error('age')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>

                    <div class="col-md-6">
                        <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ $player->position }}" autocomplete="position" >

                        @error('position')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="condition" class="col-md-4 col-form-label text-md-right">{{ __('Condition') }}</label>

                    <div class="col-md-6">
                        <input id="condition" type="text" class="form-control @error('condition') is-invalid @enderror" name="condition" value="{{ $player->condition }}" autocomplete="condition" >

                        @error('condition')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('Nationality') }}</label>

                    <div class="col-md-6">
                        <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ $player->nationality }}" autocomplete="nationality" >

                        @error('nationality')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="team" class="col-md-4 col-form-label text-md-right">{{ __('Team') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" id="team" name='team' form="editplayer">
                            @foreach($teams->sortBy('name') as $team)
                                @if($team->id == $player->team)
                                    <option selected="selected" value={{$team->id}}>{{$team->name}}</option>
                                @else
                                    <option value={{$team->id}}>{{$team->name}}</option>
                                @endif
                            @endforeach
                        </select>
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
                            Edit Player
                        </button>
                    </div>
                </div>
            </form>
        </div>


@endsection
