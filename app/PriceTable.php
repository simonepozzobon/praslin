<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceTable extends Model
{
    protected $table = 'price_tables';

    public function columns() {
        return $this->hasMany(PriceColumn::class);
    }

    public function rows() {
        return $this->hasMany(PriceRow::class);
    }
}
