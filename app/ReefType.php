<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReefType extends Model
{
    protected $table = 'reef_types';

    public function divespots() {
        return $this->hasMany(Divespot::class);
    }
}
