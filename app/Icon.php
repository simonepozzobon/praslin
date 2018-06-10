<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $table = 'icons';

    public function divespots() {
        return $this->morphedByMany(Icon::class, 'iconable');
    }
}
