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
                        <div class="col-lg-3 col-sm-4 text-center">
                            <img src="../uploads/{{$player->image}}" height="200" style="max-width: 300px"/>
                        </div>
                        <div class="col-lg-9 col-sm-8 p-2">
                            <h2><a href="/teams/{{$player->teamInfo->id}}"><img src="../uploads/{{$player->teamInfo->image}}" height="30"/></a>&nbsp;{{$player->name}} </h2>
                            <div>
                                <h5>Age: {{$player->age}} </h5>
                                <h5>Nationality: {{$player->nationality}}</h5>
                                <h5>Position: {{$player->position}}</h5>
                                <h5>Condition: {{$player->condition}}</h5>
                            </div>
                            <div>
                                <a href='{{$player->id}}/edit'>
                                    <button type="button" class="btn btn-primary btn-sm">Edit Player</button>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalBonito">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" id='modalBonito' role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Player</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>You're about to delete <strong>{{$player->name}}</strong> are you sure you want to delete it?</p>
                    </div>
                    <div class="modal-footer">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('web.players.destroy', $player->id )}}">
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
