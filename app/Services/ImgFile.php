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

//        $source = uniqid();
//        $file = base64_decode($file);
//        $mime = finfo_buffer(finfo_open(), $file, FILEINFO_MIME_TYPE);
//        list($fileType, $mimeType) = explode('/', $mime, 2);
//        $path = '/public/'.$folder.'/'.$source.'.'.$mimeType;
////        dd($fileType);
////        file_put_contents($path, $file);
//
//        return [$source, $mimeType, $fileType, filesize($path)];

        $extension = explode('/', explode(':', substr($file, 0, strpos($file, ';')))[1])[1];   // .jpg .png .pdf

        $replace = substr($file, 0, strpos($file, ',') + 1);
        $image = str_replace($replace, '', $file);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10) . time() . '.' . $extension;
        Storage::disk('public')->put($folder.'/'.$imageName, base64_decode($image));

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



//    public function prepareFile(string $file): array
//    {
//        $source = uniqid();
//        $file = base64_decode($file);
//        $mime = finfo_buffer(finfo_open(), $file, FILEINFO_MIME_TYPE);
//        list($fileType, $mimeType) = explode('/', $mime, 2);
//        $path = sys_get_temp_dir().'/'.$source.'.'.$mimeType;
//        file_put_contents($path, $file);
//
//        return [$source, $mimeType, $fileType, filesize($path)];
//    }

}
