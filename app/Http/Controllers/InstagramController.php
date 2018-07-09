<?php

namespace App\Http\Controllers;

use Auth;
use App\Utility;
use App\Instagram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InstagramController extends Controller
{
    public function index() {
        if (!Auth::user()) {
            return redirect('/');
        }
        return view('admin.instagram.index');
    }

    public function upload(Request $request) {
        $media = Utility::uploadInstagram($request->file);

        $insta = new Instagram();
        $insta->src = $media['src'];
        $insta->thumb = $media['thumb'];

        if (isset($request->caption) && $request->caption) {
            $insta->caption = $request->caption;
        } else {
            $insta->caption = ' ';
        }

        $insta->save();

        $insta->thumb = Storage::disk('local')->url($insta->thumb);

        return $insta;
    }
}
