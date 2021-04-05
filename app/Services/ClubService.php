<?php


namespace App\Services;


use App\Http\Requests\Club\CreateRequest;
use App\Http\Requests\Club\UpdateRequest;
use App\Models\Club;
use App\Repositories\ClubRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class ClubService
{
    use ImgFile;

    /**]
     * @var ClubRepository
     */
    protected $clubRepository;

    /**
     * TeamService constructor.
     * @param ClubRepository $clubRepository
     */

    public function __construct(ClubRepository $clubRepository)
    {
        $this->clubRepository = $clubRepository;
    }

    /**
     * @return Collection
     */

    public function allClub(): Collection
    {
        return $this->clubRepository->get();
    }

    /**
     * @param $filters
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|Collection|Model|null
     */

    public function getClub($filters)
    {
        return $filters ? $this->clubRepository->get($filters) : null;
    }


    /**
     * @param CreateRequest $request
     * @return Model|mixed
     */

    public function create($request)
    {
        if (!empty($request->image)) {
            $file = $this->createFile($request->image, 'clubs');
        }

//        if (!empty($request->image) && $request->image->getClientOriginalName()) {
//            $ext = $request->image->getClientOriginalExtension();
//            $file = rand(1, 100) . time() . "." . "$ext";
//            $request->image->storeAs('public/clubs', $file);
//        } else {
//            $file = '';
//        }
        $data = ['name' => $request->name, 'image' => $file];
        $result = $this->clubRepository->create($data);
        $result->image = !empty($result->image) ? asset('storage/clubs/' . $result->image) : null;
        return $result;
    }

    /**
     * @param UpdateRequest $request
     * @param Club $club
     * @return Model
     */

    public function update(UpdateRequest $request, Club $club)
    {

        $file = $this->updateFile($request->image, $club, 'clubs');
        $request->image = $file;
        $newClub = $request->only('name', 'image');
        $newClub['image'] = $file;

        return $this->clubRepository->update($newClub, $club);
    }

    /**
     * @param Club $club
     * @return bool|null
     * @throws \Exception
     */

    public function delete(Club $club)
    {
        if (Gate::allows('isAdmin')) {
            return $this->clubRepository->delete($club);
        }
        return false;
    }

}
