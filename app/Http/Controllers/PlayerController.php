<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerStoreRequest;
use App\Http\Requests\PlayerUpdateRequest;
use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $player = Player::all();

        return response($player, 200);
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
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
        return response($player, 201);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
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

        $response=[
            'data' => $player,
            'message' => 'Player updated',
            'results' => 'OK'
        ];

        return response($response, 204);
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

        $response = [
            'data' => $player,
            'message' => 'Player Deleted',
            'results' => 'OK'
        ];

        return response($response, 204);
    }
}
