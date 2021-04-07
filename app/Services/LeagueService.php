<?php


namespace App\Services;


use App\Http\Requests\League\CreateRequest;
use App\Http\Requests\League\UpdateRequest;
use App\Models\League;
use App\Repositories\LeagueRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class LeagueService
{
    /**]
     * @var LeagueRepository
     */
    protected $leagueRepository;

    /**
     * TeamService constructor.
     * @param LeagueRepository $leagueRepository
     */

    public function __construct(LeagueRepository $leagueRepository)
    {
        $this->leagueRepository = $leagueRepository;
    }

    /**
     * @return Collection
     */

    public function allSeason():Collection
    {
        return $this->leagueRepository->get();
    }


    /**
     * @param CreateRequest $request
     * @return Model|mixed
     */

    public function create(CreateRequest $request)
    {
        return $this->leagueRepository->create($request->all());
    }

    /**
     * @param UpdateRequest $request
     * @param League $league
     * @return Model
     */

    public function update(UpdateRequest $request, League $league)
    {
        return $this->leagueRepository->update($request->all(), $league);
    }

    /**
     * @param League $league
     * @return bool|null
     * @throws \Exception
     */

    public function delete(League $league)
    {
        if (Gate::allows('isAdmin')) {
            return $this->leagueRepository->delete($league);
        }
        return false;
    }

}
