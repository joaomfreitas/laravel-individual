<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeagueStoreRequest;
use App\Http\Requests\LeagueUpdateRequest;
use App\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\\Http\Response
     */
    public function index()
    {
        //

        $league = League::with('teams')->get();

        return response($league, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeagueStoreRequest $request)
    {
        //
        $data = $request->all();

        $file = $request->file('image')->store('images/league');

        $data['image'] = $file;

        $league = League::create($data);

        $response = [
            'data' => $league,
            'message' => 'League added with success',
            'results' => 'OK'
        ];

        return response($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\League  $league
     * @return \Illuminate\Http\Response
     */
    public function show(League $league)
    {
        //
        return response($league, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\League  $league
     * @return \Illuminate\Http\Response
     */
    public function edit(League $league)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\League  $league
     * @return \Illuminate\Http\Response
     */
    public function update(LeagueUpdateRequest $request, League $league)
    {
        //
        $data = $request->all();

        if($request->hasFile('image')){
            $file = $request->file('image')->store('images/league');
            $data['image'] = $file;
        }

        $league->update($data);

        $response=[
            'data' => $league,
            'message' => 'League updated',
            'results' => 'OK'
        ];

        return response($response, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\League  $league
     * @return \Illuminate\Http\Response
     */
    public function destroy(League $league)
    {
        //

        $league->delete();

        $response = [
            'data' => $league,
            'message' => 'League Deleted',
            'results' => 'OK'
        ];

        return response($response, 204);
    }
}
