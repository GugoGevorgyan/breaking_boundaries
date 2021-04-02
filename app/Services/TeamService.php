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
     * @param $id
     * @return bool|null
     * @throws \Exception
     */

    public function delete($id)
    {
        if (Gate::allows('isAdmin')) {
            $id = intval($id);
            return $this->teamRepository->delete($id);
        }
    }

    /**
     * @param array $filters
     * @param array $relations
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function getTeam($filters){
        $filters = intval($filters);
        $teams = $filters ? $this->teamRepository->get($filters): null;
        return $teams;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */

    public function getAllTeam(){
        $teams = $this->teamRepository->get();
        if(($teams instanceof Collection)){
            $teamClubUsers = $teams->mapWithKeys(function ($item) {
                if (!empty($item->club['image'])) {
                    $imagePath = asset('storage/clubs/' . $item->club['image']);
                } else {
                    $imagePath = "";
                }
                return [$item['name'] => [
                    'criteria' => $item->team_type['criteria'],
                    'type-name' => $item->team_type['name'],
                    'city' => $item->city['name'],
                    'club' => $item->club['name'],
                    'club_image' => $imagePath,
                    'status' => $item['status'],
                    'users' => $item->users->map(function ($team) {
                        return [
                            'name' => $team->name,
                            'email' => $team->email,
                            'phone' => $team->phone,
                            'status' => $team->status,
                        ];
                    })
                ]
                ];
            });
            return $teamClubUsers;
        }
        return null;
    }

}
