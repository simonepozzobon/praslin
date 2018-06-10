<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiveLevel extends Model
{
    protected $table = 'dive_levels';

    public function divespots() {
        return $this->hasMany(Divespot::class);
    }
}
