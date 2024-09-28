<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

trait ImageUpload
{
    public function file($file, $path, $resize = false, $w = 80, $h = 80): string
    {
        if ($file) {
            $image_path = "images/{$path}/";
            $extension = $file->getClientOriginalExtension();
            $file_name = Str::random(10) . '.' . $extension;
            $return_image = $image_path . $file_name;
            
            if ($resize) {
                $imgFile = Image::make($file->getRealPath());
                $imgFile->fit($w, $h)->save($return_image);
            } else {
                $file->move($image_path, $file_name);
            }
            return $file_name;
        }
    }
}
