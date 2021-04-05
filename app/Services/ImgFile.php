<?php


namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

trait ImgFile
{
    public function createFile($file, $folder)
    {
//        dd($file);
        $image_64 = $file; //your base64 encoded data

        $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf

        $replace = substr($image_64, 0, strpos($image_64, ',') + 1);

        $image = str_replace($replace, '', $image_64);

        $image = str_replace(' ', '+', $image);

        $imageName = Str::random(10) . time() . '.' . $extension;


        Storage::disk('public')->put($imageName, base64_decode($image));
        Storage::disk('public')->move($imageName, $folder . '/' . $imageName);

        return $imageName;
    }

    /**
     * @param $file
     * @param Model $model
     * @param $folder
     */

    public function updateFile($file, Model $model , $folder)
    {
        $image_path = public_path("\storage\\".$folder."\\") .$model->image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        return $this->createFile($file,$folder);
    }

    /**
     * @param $imageName
     * @param $folder
     * @return string
     */

    public function getFile($imageName, $folder)
    {
        return asset('storage/' . $folder . '/' . $imageName);
    }

}
