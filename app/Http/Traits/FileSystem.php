<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait FileSystem
{
    public function uploadImage($parentDirectory)
    {
        $image_name = request()->image->getClientOriginalName();
        $image_name = time() . "_" . rand(100, 10000000) . "_" . $image_name;
        request()->file('image')->storeAs($parentDirectory, $image_name, 'custom_disk');
        return $image_name;
    }

    public function deleteImage($path){
        Storage::disk('custom_disk')->delete($path);
    }
}
