<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldItem extends Model
{
    use HasFactory;

    public function sales()
    {
        return $this->belongsTo('App\Models\Sales', 'sale_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
