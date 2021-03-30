<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClubRequest;
use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $clubs = Club::all();
        return response()->json($clubs);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ClubRequest $request)
    {if (isset($request->image) && $request->image->getClientOriginalName()) {
        $ext = $request->image->getClientOriginalExtension();
        $file = rand(1, 100) . time() . "." . "$ext";
        $request->image->storeAs('public/clubs', $file);
    } else {
        $file = '';
    }
        $club = new Club();
        $club->name = $request->name;
        $club->image = $file;
        $club->save();
        return response()->json(['message' => 'The Club successfully created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $club = Club::find($id);
        return response()->json($club);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Club  $club
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Club $club)
    {
        $request->validate([
            'name' => "required|max:20|unique:clubs,name,{$club->id}",
            'image' => 'file|image|mimes:jpeg,png,jpg,svg|dimensions:max_width=500,max_height=400|max:960',
        ]);
        if (isset($request->image) && $request->image->getClientOriginalName()) {
            $ext = $request->image->getClientOriginalExtension();
            $file = rand(1, 100) . time() . "." . "$ext";
            $request->image->storeAs('public/images', $file);
        } else {
            $file = $club->image;
        }
        $club->update([
            'name' => $request->name,
            'image' => $file,
        ]);
        return response()->json(['message' => 'The Club was successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Club  $club
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($club)
    {
        $name = $club->name;
        $club->delete();
        return response()->json(['message' => 'you have successfully removed ' . $name . ' club ']);
    }
}
