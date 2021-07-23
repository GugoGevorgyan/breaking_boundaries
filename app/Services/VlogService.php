<?php


namespace App\Services;


use App\Http\Requests\Vlog\UpdateRequest;
use App\Http\Requests\Vlog\CreateRequest;
use App\Models\Vlog;
use App\Repositories\VlogRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;

class VlogService
{
    /**
     * @var VlogRepository
     */
    protected VlogRepository $vlogRepository;


    /**
     * TeamService constructor.
     * @param VlogRepository $vlogRepository
     */

    public function __construct(VlogRepository $vlogRepository)
    {
        $this->vlogRepository = $vlogRepository;

    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function get()
    {
        return $this->vlogRepository->get();
    }

    /**
     * @param $filters
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */

    public function show($filters)
    {
        $filters = intval($filters);
        return $filters ? $this->vlogRepository->get($filters) : null;
    }

    /**
     * @param  $request
     */

    public function create($request)
    {

        $data = array_merge($request,
            [
                "admin_id"=>Auth::id(),
            ]
        );
        return $this->vlogRepository->create($data, ['title', 'link', 'admin_id']);
    }

    /**
     * @param UpdateRequest $request
     * @param Vlog $vlog
     * @return Model
     */

    public function update(UpdateRequest $request,Vlog $vlog)
    {

        return $this->vlogRepository->update($request->all(), $vlog);
    }

    /**
     * @param Vlog $vlog
     * @return bool|null
     * @throws \Exception
     */

    public function delete(Vlog $vlog)
    {
        return $this->vlogRepository->delete($vlog);
    }

}
