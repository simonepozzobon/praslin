<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    public function galleries() {
        return $this->belongsToMany(Gallery::class);
    }
}
