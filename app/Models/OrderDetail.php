<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'orderdetail';
    protected $fillable = [
        'order_id',
        'prod_id',
        'price',
       'qty',
    ];

    public function products(){
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
