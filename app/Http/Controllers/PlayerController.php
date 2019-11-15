<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerStoreRequest;
use App\Http\Requests\PlayerUpdateRequest;
use App\Player;
use Illuminate\Http\Request;

/**
 * @group Player management
 */
class PlayerController extends Controller
{
    /**
     * Display a listing of the players.
     * @authenticated
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $player = Player::all();

        return response($player, 200);
    }

    /**
     * Show the form for creating a new player.
     *
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created player in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @authenticated
     */
    public function store(PlayerStoreRequest $request)
    {
        //
        $data = $request->all();

        $file = $request->file('image')->store('images/player');

        $data['image'] = $file;

        $player = Player::create($data);

        $response = [
            'data' => $player,
            'message' => 'Player added with success',
            'results' => 'OK'
        ];

        return response($response, 201);
    }

    /**
     * Display the specified player.
     * @authenticated
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
        return response($player, 201);

    }

    /**
     * Show the form for editing the specified player.
     * @authenticated
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified player in storage.
     *@authenticated
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(PlayerUpdateRequest $request, Player $player)
    {
        //
        $data = $request->all();

        if($request->hasFile('image')){
            if($request->get('image') !== $player['image']){

                $file = $request->file('image')->store('images/player');

                $data['image'] = $file;
            }
        }

        $player->update($data);

        $response=[
            'data' => $player,
            'message' => 'Player updated',
            'results' => 'OK'
        ];

        return response($response, 204);
    }

    /**
     * Remove the specified player from storage.
     * @authenticated
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //

        $player->delete();

        $response = [
            'data' => $player,
            'message' => 'Player Deleted',
            'results' => 'OK'
        ];

        return response($response, 204);
    }
}
