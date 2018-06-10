<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divespot extends Model
{
    protected $table = 'divespots';

    public function reef_type() {
        return $this->belongsTo(ReefType::class);
    }

    public function dive_level() {
        return $this->belongsTo(DiveLevel::class);
    }

    public function icons() {
        return $this->morphToMany(Icon::class, 'iconable');
    }
}
