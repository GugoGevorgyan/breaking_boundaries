<?php


namespace App\Services;


use App\Http\Requests\Team\TeamTypeRequest;
use App\Http\Requests\Team\TeamTypeUpdateRequest;
use App\Http\Requests\Team\UpdateRequest;
use App\Http\Requests\Team\TeamRequest;
use App\Models\Team;
use App\Models\Team_type;
use App\Repositories\TeamRepository;
use App\Repositories\TeamTypeRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class TeamTypeService
{
    /**
     * @var TeamTypeRepository
     */
    protected $teamTypeRepository;

    /**
     * TeamService constructor.
     * @param TeamRepository $teamTypeRepository
     */

    public function __construct(TeamRepository $teamTypeRepository)
    {
        $this->teamTypeRepository = $teamTypeRepository;
    }

    /**
     * @param TeamRequest $request
     * @return Model|mixed
     */

    public function create(TeamTypeRequest $request)
    {
        return $this->teamTypeRepository->create($request->all());
    }

    /**
     * @param TeamTypeUpdateRequest $request
     * @param Team_type $teamType
     * @return Model
     */

    public function update(TeamTypeUpdateRequest $request, Team_type $teamType)
    {
        return $this->teamTypeRepository->update($request->all(), $teamType);
    }

    /**
     * @param Team_type $teamType
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */

    public function delete(Team_type $teamType)
    {
        if (Gate::allows('isAdmin')) {
            $result = $this->teamTypeRepository->delete($teamType);
            return response()->json([$result]);
        }
    }

    /**
     * @param array $filters
     * @param array $relations
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function getTeamType($filters){
        $filters = intval($filters);
        return $filters ? $this->teamTypeRepository->get($filters): null;
    }


}
