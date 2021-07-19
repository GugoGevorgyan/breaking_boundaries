<?php


namespace App\Services;


use App\Http\Requests\Game\CreateRequest;
use App\Http\Requests\Game\UpdateRequest;
use App\Models\Game;
use App\Repositories\GameRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class GameService
{
    /**]
     * @var GameRepository
     */
    protected $gameRepository;

    /**
     * TeamService constructor.
     * @param GameRepository $gameRepository
     */

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|Collection|Model|null
     */

    public function allGame()
    {
        return $this->gameRepository->get();
    }

    /**
     * @param $filters
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|Collection|Model|null
     */

    public function getGame($filters)
    {
        return $filters ? $this->gameRepository->get($filters) : null;
    }


    /**
     * @param CreateRequest $request
     * @return Model|mixed
     */

    public function create(CreateRequest $request)
    {
        $result = $this->gameRepository->create($request->all());
        if ($result) {
            $this->gameRepository->createPivot($result, 'teams', $request->team1_id);
            $this->gameRepository->createPivot($result, 'teams', $request->team2_id);
        }
        return $result;
    }

    /**
     * @param UpdateRequest $request
     * @param Game $game
     * @return Model
     */

    public function update(UpdateRequest $request, Game $game)
    {
        $result = $this->gameRepository->update($request->all(), $game);
//        if ($result) {
//            $this->gameRepository->deletePivot($result, 'teams', $request->team1_id);
//        }
        return $result;
    }

    /**
     * @param Game $game
     * @return array|bool|null
     * @throws \Exception
     */

    public function delete(Game $game)
    {
        return $this->gameRepository->delete($game);
    }

}
