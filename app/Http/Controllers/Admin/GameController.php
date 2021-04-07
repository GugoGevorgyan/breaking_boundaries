<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Game\UpdateRequest;
use App\Http\Requests\Game\CreateRequest;
use App\Models\Game;
use App\Services\GameService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * @var GameService
     */
    private GameService $gameService;

    /**
     * ClubController constructor.
     * @param GameService $gameService
     */

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $result = $this->gameService->allGame();
        return response()->json([$result]);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateRequest $request)
    {
        $result = $this->gameService->create($request);
        return response()->json([$result]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Game $game
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Game $game)
    {
        $result = $this->gameService->getGame($game->id);
        return response()->json([$result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Game $game
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, Game $game)
    {
        $result = $this->gameService->update($request, $game);
        return response()->json([$result]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Game $game
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Game $game)
    {
        $result = $this->gameService->delete($game);
        return response()->json([$result]);
    }
}
