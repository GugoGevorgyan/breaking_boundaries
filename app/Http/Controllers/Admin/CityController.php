<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $city = City::all();
        return response()->json($city);
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
    public function store(CityRequest $request)
    {
        $city = new City();
        $city->name = $request->name;
        $city->save();
        return response()->json(['message' => 'The City successfully created']);
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
        $edit = City::find($id);
        return response()->json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  City  $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => "required|max:20|unique:cities,name,{$city->id}"
        ]);

        $city->update([
            'name' => $request->name,
        ]);
        return response()->json(['message' => 'The City was successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  City  $city
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($city)
    {
        $name = $city->name;
        $city->delete();
        return response()->json(['message' => 'you have successfully removed ' . $name . ' city ']);
    }
}
