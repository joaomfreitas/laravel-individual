<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerStoreRequest;
use App\Http\Requests\PlayerUpdateRequest;
use App\Player;
use App\Team;
use Illuminate\Http\Request;

class WebPlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $players = Player::all();
        return view('players')->with('players', $players);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teams = Team::all();
        return view('addplayer')->with('teams', $teams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerStoreRequest $request)
    {
        //
        $data = $request->all();

        $file = $request->file('image')->store('images/player');

        $data['image'] = $file;

        Player::create($data);

        return redirect()->route('web.players.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
        return view('showplayer')->with('player', $player);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $teams = Team::all();
        return view('editplayer')->with('player', $player)->with('teams', $teams);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(PlayerUpdateRequest $request, Player $player)
    {
        //
        $data = $request->all();

        if($request->hasFile('image')){
            $file = $request->file('image')->store('images/player');
            $data['image'] = $file;
        }

        $player->update($data);
        return redirect()->route('web.players.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
        $player->delete();

        return redirect()->route('web.players.index')->withErrors(['success' => 'Player '.$player['name'].' deleted with success!']);
    }
}
