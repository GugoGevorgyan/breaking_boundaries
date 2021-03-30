<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Club;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $teams = Team::all();

        $teamClubUsers = $teams->mapWithKeys(function ($item) {
            if( !empty($item->club['image']) ){
                $imagePath =asset('storage/clubs/'.$item->club['image']);
            }else{
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

        return response()->json($teamClubUsers->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TeamRequest $request)
    {
        $team = new Team();
        $team->name = $request->name;
        $team->club_id = $request->club_id;
        $team->team_type_id = $request->team_type_id;
        $team->city_id = $request->city_id;
        $team->save();
        return response()->json(['message' => 'The Team successfully created']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param TEam $team
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $team)
    {
        $request->validate([
            'name' => "required|max:20|unique:clubs,name,{$team->id}"
        ]);

        $team->update([
            'name' => $request->name,
            'club_id' => $request->club_id,
            'team_type_id' => $request->team_type_id,
            'city_id' => $request->city_id,
        ]);
        return response()->json(['message' => 'The Club was successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param team $team
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($team)
    {
        $name = $team->name;
        $team->delete();
        return response()->json(['message' => 'you have successfully removed ' . $name . ' team ']);
    }



    public function status(Request $request, $id){
        if (Gate::allows('isAdmin')){
            $team = Team::find($id);
            if ($team){
                $status = $team->status === 1 ? 0 : 1;
                $team->update([
                    'status' => $status,
                ]);
                return response()->json(['message' => 'The team successfully update status']);
            }
            return response()->json(['error' => 'oops, team not found']);
        }
    }
}
