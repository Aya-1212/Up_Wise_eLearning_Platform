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

    public function deleteFile($path)
    {
        Storage::disk('custom_disk')->delete($path);
    }

    public function uploadVideo(string $key, $parentDirectory)
    {
        $video_name = request()->file($key)->getClientOriginalName();
        $video_name = time() . "_" . rand(100, 10000000) . "_" . $video_name;
        request()->file($key)->storeAs($parentDirectory, $video_name, 'custom_disk');
        return $video_name;
    }

}
