<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class Utility extends Model
{
    public static function uploadImg($file) {
        $filename = $file->getClientOriginalName();
        $src = $file->storeAs('public/media', $filename);

        // preparo gli altri formati
        $thumb = $file->storeAs('public/media/thumb', $filename);
        $slide_img = $file->storeAs('public/media/slide_img', $filename);
        $portrait = $file->storeAs('public/media/portrait', $filename);
        $landscape = $file->storeAs('public/media/landscape', $filename);

        // genero gli altri formati
        $path = storage_path('app/public/media');

        // Thumb
        Image::make($path.'/thumb/'.$filename)->fit(500, 500, function ($constraint) {
            $constraint->upsize();
        })->save();

        // slide_img
        Image::make($path.'/slide_img/'.$filename)->fit(1920, 1080, function ($constraint) {
            $constraint->upsize();
        })->save();

        // portrait
        Image::make($path.'/portrait/'.$filename)->fit(720, 960, function ($constraint) {
            $constraint->upsize();
        })->save();

        // landscape 960 540
        Image::make($path.'/landscape/'.$filename)->fit(960, 540, function ($constraint) {
            $constraint->upsize();
        })->save();

        $image = [
            'src' => $src,
            'thumb' => $thumb,
            'slide_img' => $slide_img,
            'portrait' => $portrait,
            'landscape' => $landscape,
        ];

        return $image;
    }
}
