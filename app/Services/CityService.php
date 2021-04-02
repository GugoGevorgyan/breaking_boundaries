<?php


namespace App\Services;


use App\Http\Requests\City\CreateRequest;
use App\Http\Requests\City\UpdateRequest;
use App\Models\City;
use App\Repositories\CityRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class CityService
{
    /**]
     * @var CityRepository
     */
    protected $cityRepository;

    /**
     * TeamService constructor.
     * @param CityRepository $cityRepository
     */

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * @return Collection
     */

    public function allCity():Collection
    {
        return $this->cityRepository->get();
    }

    /**
     * @param $filters
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|Collection|Model|null
     */

    public function getCity($filters)
    {
        return $filters ? $this->cityRepository->get($filters): null;
    }


    /**
     * @param CreateRequest $request
     * @return Model|mixed
     */

    public function create(CreateRequest $request)
    {
        return $this->cityRepository->create($request->all());
    }

    /**
     * @param UpdateRequest $request
     * @param City $city
     * @return Model
     */

    public function update(UpdateRequest $request, City $city)
    {
        return $this->cityRepository->update($request->all(), $city);
    }

    /**
     * @param City $city
     * @return bool|null
     * @throws \Exception
     */

    public function delete(City $city)
    {
        if (Gate::allows('isAdmin')) {
            return $this->cityRepository->delete($city);
        }
        return false;
    }

}
