<?php

namespace App\Http\Controllers;

use App\Game;
use App\Http\Requests\GameStoreRequest;
use App\Http\Requests\GameUpdateRequest;
use Illuminate\Http\Request;

/**
 * @group Game management
 */
class GameController extends Controller
{
    /**
     * Display a listing of the games.
     * @authenticated
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $game = Game::all();

        return response($game, 200);
    }

    /**
     * Show the form for creating a new game.
     * @authenticated
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created game in storage.
     * @authenticated
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameStoreRequest $request)
    {
        //
        $data = $request->all();


        $game = Game::create($data);

        $response = [
            'data' => $game,
            'message' => 'Game added with success',
            'results' => 'OK'
        ];

        return response($response, 201);
    }

    /**
     * Display the specified game.
     * @authenticated
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
        return response($game, 201);
    }

    /**
     * Show the form for editing the specified game.
     * @authenticated
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified game in storage.
     * @authenticated
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(GameUpdateRequest $request, Game $game)
    {
        //
        $data = $request->all();

        $game->update($data);

        $response=[
            'data' => $game,
            'message' => 'Game updated',
            'results' => 'OK'
        ];

        return response($response, 204);
    }

    /**
     * Remove the specified game from storage.
     * @authenticated
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //

        $game->delete();

        $response = [
            'data' => $game,
            'message' => 'Game Deleted',
            'results' => 'OK'
        ];

        return response($response, 204);
    }
}
