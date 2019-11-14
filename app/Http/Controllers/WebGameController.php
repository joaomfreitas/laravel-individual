<?php

namespace App\Http\Controllers;

use App\Game;
use App\Http\Requests\GameStoreRequest;
use App\Http\Requests\GameUpdateRequest;
use App\Player;
use App\Team;
use Illuminate\Http\Request;

class WebGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $games = Game::all();
        return view('games')->with('games', $games);
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
        return view('addgame')->with('teams', $teams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameStoreRequest $request)
    {
        //
        $data = $request->all();

        Game::create($data);

        return redirect()->route('web.games.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
        $players = Player::where('team', $game['home_team'])->orWhere('team', $game['away_team'])->get();
//        return $players;
        return view('showgame')->with('game', $game)->with('players', $players);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
        return view('editgame')->with('game', $game);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(GameUpdateRequest $request, Game $game)
    {
        //

        $data = $request->all();

        $game->update($data);

        return redirect()->route('web.games.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
        $game->delete();

        return redirect()->route('web.games.index')->withErrors(['success' => 'Game deleted with success!']);
    }
}
