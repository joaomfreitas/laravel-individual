@extends('layouts.bo')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">Create New Player</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form class="form-horizontal" role="form" method="POST" action="{{ route('web.players.store') }}" enctype="multipart/form-data" id="addteam">

                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                    <div class="col-md-6">
                        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age">

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
                        <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}" required autocomplete="position" >

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
                        <input id="condition" type="text" class="form-control @error('condition') is-invalid @enderror" name="condition" value="{{ old('condition') }}" required autocomplete="condition" >

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
                        <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ old('nationality') }}" required autocomplete="nationality" >

                        @error('nationality')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="league" class="col-md-4 col-form-label text-md-right">{{ __('Team') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" id="team" name='team' form="addteam">
                            @foreach($teams->sortBy('name') as $team)
                                <option value={{$team->id}}>{{$team->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                    <div class="col-md-6">
                        <input id="image" type="file" class="@error('image') is-invalid @enderror" name="image" required>

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
                            Add Player
                        </button>
                    </div>
                </div>
            </form>
        </div>


@endsection
