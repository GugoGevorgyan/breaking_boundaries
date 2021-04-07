<?php


namespace App\Services;


use App\Http\Requests\Season\CreateRequest;
use App\Http\Requests\Season\UpdateRequest;
use App\Models\Season;
use App\Repositories\SeasonRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class SeasonService
{
    /**]
     * @var SeasonRepository
     */
    protected $seasonRepository;

    /**
     * TeamService constructor.
     * @param SeasonRepository $seasonRepository
     */

    public function __construct(SeasonRepository $seasonRepository)
    {
        $this->seasonRepository = $seasonRepository;
    }

    /**
     * @return Collection
     */

    public function allSeason():Collection
    {
        return $this->seasonRepository->get();
    }


    /**
     * @param CreateRequest $request
     * @return Model|mixed
     */

    public function create(CreateRequest $request)
    {
        return $this->seasonRepository->create($request->all());
    }

    /**
     * @param UpdateRequest $request
     * @param Season $season
     * @return Model
     */

    public function update(UpdateRequest $request, Season $season)
    {
        return $this->seasonRepository->update($request->all(), $season);
    }

    /**
     * @param Season $season
     * @return bool|null
     * @throws \Exception
     */

    public function delete(Season $season)
    {
        if (Gate::allows('isAdmin')) {
            return $this->seasonRepository->delete($season);
        }
        return false;
    }

}
