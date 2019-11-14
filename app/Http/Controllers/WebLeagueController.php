<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeagueUpdateRequest;
use App\Http\Requests\WebLeagueStoreRequest;
use App\League;
use Illuminate\Http\Request;

class WebLeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $leagues = League::all();
        return view('leagues')->with('leagues', $leagues);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('addleague');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebLeagueStoreRequest $request)
    {
        //
        $data = $request->all();

        $file = $request->file('image')->store('images/league');

        $data['image'] = $file;

        League::create($data);

        return redirect()->route('web.leagues.index');
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
        return view('showleague')->with('league', $league);
//        return $league;
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
        return view('editleague')->with('league', $league);
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

        $data = $request->all();

        if($request->hasFile('image')){
            if($request->get('image') !== $league['image']){

                $file = $request->file('image')->store('images/league');

                $data['image'] = $file;
            }
        }

        $league->update($data);

        return redirect()->route('web.leagues.index');
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

        return redirect()->route('web.leagues.index')->withErrors(['success' => 'League '.$league['name'].' deleted with success!']);
    }

}
