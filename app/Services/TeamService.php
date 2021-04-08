<?php


namespace App\Services;


use App\Http\Requests\Team\UpdateRequest;
use App\Http\Requests\Team\TeamRequest;
use App\Models\Team;
use App\Repositories\TeamRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class TeamService
{
    /**
     * @var TeamRepository
     */
    protected $teamRepository;

    /**
     * TeamService constructor.
     * @param TeamRepository $teamRepository
     */

    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }

    /**
     * @param TeamRequest $request
     * @return Model|mixed
     */

    public function create(TeamRequest $request)
    {
        return $this->teamRepository->create($request->all());
    }

    /**
     * @param UpdateRequest $request
     * @param Team $team
     * @return Model
     */

    public function update(UpdateRequest $request, Team $team)
    {
        return $this->teamRepository->update($request->all(), $team);
    }

    /**
     * @param Team $team
     * @return bool|null
     * @throws \Exception
     */

    public function delete(Team $team)
    {
        if (Gate::allows('isAdmin')) {
            return $this->teamRepository->delete($team);
        }
    }

    /**
     * @param array $filters
     * @param array $relations
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function getTeam($filters){
        $filters = intval($filters);
        return $filters ? $this->teamRepository->get($filters): null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */

    public function getAllTeam(){
        return $this->teamRepository->get();
//              ->map(function ($league) {
//              return [
//                  'name' => $league->name,
//                  'year' => $league->year,
//                  'season_id' => $league->season_id,
//              ];
//          })
//;

//            $teamClubUsers = $teams->mapWithKeys(function ($item) {
//                if (!empty($item->club['image'])) {
//                    $imagePath = asset('storage/clubs/' . $item->club['image']);
//                } else {
//                    $imagePath = "";
//                }
//                return [$item['name'] => [
//                    'criteria' => $item->teamType['criteria'],
//                    'type-name' => $item->teamType['name'],
//                    'city' => $item->city['name'],
//                    'club' => $item->club['name'],
//                    'club_image' => $imagePath,
//                    'status' => $item['status'],
//                            'league' => $item->league->map(function ($league) {
//                                return [
//                                    'name' => $league->name,
//                                    'year' => $league->year,
//                                    'season_id' => $league->season_id,
//                        ];
//                    }),
//                    'users' => $item->users->map(function ($team) {
//                        return [
//                            'name' => $team->name,
//                            'email' => $team->email,
//                            'phone' => $team->phone,
//                            'status' => $team->status,
//                        ];
//                    })
//                ]
//                ];
//            });

//            return $teamClubUsers;
    }

}

