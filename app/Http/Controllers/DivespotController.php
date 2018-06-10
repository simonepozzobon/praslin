<?php

namespace App\Http\Controllers;

use App\Icon;
use App\Divespot;
use App\ReefType;
use App\DiveLevel;
use Illuminate\Http\Request;

class DivespotController extends Controller
{
    protected $table = 'dive_spots';

    public function index() {
        $divespots = Divespot::all();

        $formatted = collect();
        foreach ($divespots as $key => $dp) {
            $dp = $this->formatSpot($dp);
            $formatted->push($dp);
        }

        $divespots = $formatted;

        return view('admin.divespots.index', compact('divespots'));
    }

    public function getSpots() {
        $divespots = Divespot::all();

        $formatted = collect();
        foreach ($divespots as $key => $dp) {
            $dp = $this->formatSpot($dp);
            $formatted->push($dp);
        }

        return $formatted;
    }

    public function getFormData() {
        $icons = Icon::all();
        $reef_types = ReefType::all();
        $dive_levels = DiveLevel::all();

        $response = [
            'icons' => $icons,
            'levels' => $dive_levels,
            'reef_types' => $reef_types,
        ];

        return $response;
    }

    public function saveSpot(Request $r) {


        $dp = new Divespot();
        $dp->name = $r->title;
        $dp->lat = $r->lat;
        $dp->lon = $r->lon;
        $dp->reef_type_id = $r->reef_type_id;
        $dp->dive_level_id = $r->level;
        $dp->depth = $r->depth;
        $dp->rating = $r->rating;
        if ($r->snorkeling == null || $r->snorkeling == false) {
            $dp->snorkeling = 0;
        } else {
            $dp->snorkeling = 1;
        }
        $dp->save();

        $icons = json_decode($r->icons);
        foreach ($icons as $key => $iconID) {
            $icon = Icon::findOrFail($iconID->id);
            $dp->icons()->save($icon);
        }

        $dp = $this->formatSpot($dp);
        return $dp;
    }

    public function formatSpot($dp) {
        $dp->dive_level = $dp->dive_level;
        $dp->reef_type = $dp->reef_type;
        $dp->icons = $dp->icons()->get();
        return $dp;
    }
}
