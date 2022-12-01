<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPrice extends Model
{
    use HasFactory;
    protected $table = 'item_prices';

    public function item(){
        return $this->belongsTo(Item::class,'item_id','id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }
}
