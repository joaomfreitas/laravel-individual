<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamStoreRequest;
use App\Team;
use Illuminate\Http\Request;

/**
 * @group Team management
 */
class TeamController extends Controller
{
    /**
     * Display a listing of the teams.
     *
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function index()
    {
        //
        $teams = Team::all();

        return response($teams, 200);
    }

    /**
     * Show the form for creating a new team.
     *
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created team in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamStoreRequest $request)
    {
        //
        $data = $request->all();

        $file = $request->file('image')->store('images/teams');

        $data['image'] = $file;

        $team = Team::create($data);

        $response = [
            'data' => $team,
            'message' => 'Team added with success'
        ];

        return response($response, 201);
    }

    /**
     * Display the specified team.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function show(Team $team)
    {
        //
        return response($team, 201);
    }

    /**
     * Show the form for editing the specified team.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified teams in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function update(Request $request, Team $team)
    {
        //
        $data = $request->all();

        if($request->hasFile('image')){
            if($request->get('image') !== $team['image']){

                $file = $request->file('image')->store('images/teams');

                $data['image'] = $file;
            }
        }

        $team->update($data);

        $response = [
            'data' => $team,
            'message' => 'Team updated',
            'results' => 'OK'
        ];

        return response($response, 204);
    }

    /**
     * Remove the specified resource from teams.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function destroy(Team $team)
    {
        //

        $team->delete();

        $response = [
            'data' => $team,
            'message' => 'Team deleted',
            'results' => 'OK'
        ];

        return response($response, 204);
    }
}
