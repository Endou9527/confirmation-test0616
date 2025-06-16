<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $guarded = array('id');
    public static $rules = array(
        'name' => 'required',
    );

    // public function getProducts()
    // {
    //     return $this->belongsToMany(Product::class, 'product_season', 'season_id', 'product_id');
    // }
}
