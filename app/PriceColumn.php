<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceColumn extends Model
{
    protected $table = 'price_columns';

    public function table() {
        return $this->belongsTo(PriceTable::class);
    }

    public function row() {
        return $this->belongsTo(PriceRow::class);
    }
}
