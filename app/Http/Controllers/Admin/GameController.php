<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Game\UpdateRequest;
use App\Http\Requests\Game\CreateRequest;
use App\Http\Resources\GameResource;
use App\Models\Game;
use App\Response\APIResponse;
use App\Services\GameService;

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
        return APIResponse::successResponse(GameResource::collection($this->gameService->allGame()));
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
        return APIResponse::successResponse(new GameResource($this->gameService->create($request)));
    }

    /**
     * Display the specified resource.
     *
     * @param Game $game
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Game $game)
    {
        return APIResponse::successResponse(new GameResource($this->gameService->getGame($game->id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Game $game
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Game $game)
    {
        return APIResponse::successResponse(new GameResource($this->gameService->getGame($game->id)));
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
        return APIResponse::successResponse(new GameResource($this->gameService->update($request, $game)));
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
        return APIResponse::successResponse(new GameResource($this->gameService->delete($game)));
    }
}
