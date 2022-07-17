<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\FrontendController;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Review;


class FrontendController extends Controller
{
    public function index(){
        $featured_products = Product::where('trending','1')->take(15)->get();
        return view('frontend.index', compact('featured_products'));
    }

    public function brand(){
        $brands= Brand::all();
        return view('frontend.brand.brand-list',compact('brands'));
    }

    public function category(){
        $category= Category::all();
        return view('layouts.frontend',compact('category'));
    }

    public function viewcate($slug){
        if(Category::where('slug',$slug)->exists())
        {
            $category=Category::where('slug',$slug)->first();
            $products = Product::where('cate_id',$category->id)->get();
            return view('frontend.category.category',compact('category', 'products'));
        }
        else
        {
            return redirect('/')->with('status','Slug does not exists');
        }
    }

    public function product(){
        $products= Product::all();
        return view('frontend.product.product-list',compact('products'));
    }

    public function viewprods($slug){
        if(Brand::where('slug',$slug)->exists())
        {
            $brands=Brand::where('slug',$slug)->first();
            $products = Product::where('brand_id',$brands->id)->get();
            return view('frontend.brand.brand',compact('brands', 'products'));
        }
        else
        {
            return redirect('/')->with('status','Slug does not exists');
        }
    }

    public function viewdetail($prod_slug)
    {   
        if(Product::where('slug',$prod_slug)->exists())
        {
            $products = Product::where('slug',$prod_slug)->first();
            $reviews = Review::where('prod_id', $products->id)->get();
            $other = Product::where('cate_id',$products->cate_id)->inRandomOrder()->limit(5)->get();
            return view('frontend.product.product-detail', compact('products','reviews','other'));
        }
        else{
            return redirect('/')->with('status','The link was broken');
        }      
    }

    public function search(Request $request){
        $result = Product::where('name', 'like','%'.$request->input('search').'%')->get();
        return view('frontend.search',['products'=>$result]);
    }


}
