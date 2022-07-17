<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'brand_id',
        'cate_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'trending',
        'ingredients',
        'uses',
        'directions',
        'image1',
        'image2',
        'image3',
    ];

    public function category(){
        return $this->belongsto(Category::class,'cate_id','id');
    }

    public function brand(){
        return $this->belongsto(Brand::class,'brand_id','id');
    }
}
