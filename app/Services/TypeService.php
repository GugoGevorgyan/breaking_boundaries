<?php


namespace App\Services;

use App\Http\Requests\Team\TeamRequest;
use App\Http\Requests\Type\CreateRequest;
use App\Http\Requests\Type\UpdateRequest;
use App\Models\Type;
use App\Repositories\TypeRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use phpDocumentor\Reflection\Types\Collection;

class TypeService
{
    /**
     * @var TypeRepository
     */
    protected $typeRepository;

    /**
     * TeamService constructor.
     * @param TypeRepository $typeRepository
     */

    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    /**
     * @param TeamRequest $request
     * @return Model|mixed
     */

    public function create(CreateRequest $request)
    {
        return $this->typeRepository->create($request->all());
    }

    /**
     * @param UpdateRequest $request
     * @param Type $teamType
     * @return Model
     */

    public function update(UpdateRequest $request, Type $teamType)
    {
        return $this->typeRepository->update($request->all(), $teamType);
    }

    /**
     * @param Type $teamType
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */

    public function delete(Type $teamType)
    {
        if (Gate::allows('isAdmin')) {
            $result = $this->typeRepository->delete($teamType);
            return response()->json([$result]);
        }
    }

    /**
     * @param array $filters
     * @param array $relations
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function getType($filters)
    {
        $filters = intval($filters);
        return $filters ? $this->typeRepository->get($filters) : null;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */

    public function allType()
    {
        return $this->typeRepository->get();
    }


}
