<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Club\CreateRequest;
use App\Http\Requests\Club\UpdateRequest;
use App\Http\Requests\ClubRequest;
use App\Models\Club;
use App\Services\ClubService;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClubController extends Controller
{
    /**
     * @var ClubService
     */
    private ClubService $clubService;

    /**
     * ClubController constructor.
     * @param ClubService $clubService
     */

    public function __construct(ClubService $clubService)
    {
        $this->clubService = $clubService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $result = $this->clubService->allClub();
        return response()->json([$result]);
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
    public function store(CreateRequest $request)
    {
        $result = $this->clubService->create($request);
        return response()->json([$result]);
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
     * @param Club $club
     * @return \Illuminate\Http\JsonResponse
     */

    public function edit(Club $club)
    {
        $result = $this->clubService->getClub($club->id);
        return response()->json([$result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Club $club
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRequest $request, Club $club)
    {
        $image_64 = $request->image; //your base64 encoded data

        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

        $replace = substr($image_64, 0, strpos($image_64, ',')+1);

// find substring fro replace here eg: data:image/png;base64,

        $image = str_replace($replace, '', $image_64);

        $image = str_replace(' ', '+', $image);

        $imageName = Str::random(10). time().'.'.$extension;


        Storage::disk('public')->put($imageName, base64_decode($image));
        Storage::disk('public')->move($imageName, 'clubs/'.$imageName);
//        Storage::move($imageName, 'public/clubs/'.$imageName);



//        $base64File = $request->input('file');
//        $fileData = base64_decode($base64File);
//        $tmpFilePath = sys_get_temp_dir() . '/' . Str::uuid()->toString();
//        file_put_contents($tmpFilePath, $fileData);
//
//
//        $result = $this->clubService->update($request, $club);
//
//        return response()->json([$result]);
//
//






//        if (isset($request->image) && $request->image->getClientOriginalName()) {
//            $ext = $request->image->getClientOriginalExtension();
//            $file = rand(1, 100) . time() . "." . "$ext";
//            $request->image->storeAs('public/images', $file);
//        } else {
//            $file = $club->image;
//        }
//        $club->update([
//            'name' => $request->name,
//            'image' => $file,
//        ]);
//        return response()->json(['message' => 'The Club was successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Club $club
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Club $club)
    {
        $result = $this->clubService->delete($club);
        return response()->json([$result]);
//        $name = $club->name;
//        $club->delete();
//        return response()->json(['message' => 'you have successfully removed ' . $name . ' club ']);
    }
}
