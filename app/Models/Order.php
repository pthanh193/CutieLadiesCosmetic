<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'status',
        'tracking_no',
        'total_price',
       
    ];

    public function orderdetail(){
        return $this->hasMany(OrderDetail::class);
    }
}
