<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceRow extends Model
{
    protected  $table = 'price_rows';

    public function table() {
        return $this->belongsTo(PriceTable::class);
    }

    public function columns() {
        return $this->hasMany(PriceColumn::class);
    }
}
