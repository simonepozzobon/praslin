<?php

namespace App\Http\Controllers;

use App\Image;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function galleries() {
        $images = Image::all();

        $images = $images->transform(function($img, $key) {
            $img->thumb = Storage::disk('local')->url($img->thumb);
            return $img;
        });

        return view('admin.galleries.index', compact('images'));
    }

    public function upload(Request $request) {
        $media = Utility::uploadImg($request->file);

        $img = new Image();
        $img->src = $media['src'];
        $img->thumb = $media['thumb'];
        $img->slide_img = $media['slide_img'];
        $img->portrait = $media['portrait'];
        $img->landscape = $media['landscape'];
        $img->save();

        $img->thumb = Storage::disk('local')->url($img->thumb);

        return $img;
    }

    public function getImages() {
        $images = Image::all();

        $images = $images->transform(function($img, $key) {
            $img->thumb = Storage::disk('local')->url($img->thumb);
            $img->landscape = Storage::disk('local')->url($img->landscape);
            return $img;
        });

        return $images;
    }
}
