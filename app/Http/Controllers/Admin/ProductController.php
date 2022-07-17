<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function index()
    {
        $products= Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function add(){
        $category= Category::all();
        $brands = Brand::all();
        return view('admin.product.add', compact('category','brands'));
    }

    public function insert(Request $request){
        $products = new Product();
        $products->brand_id = $request->input('brand_id');
        $products->cate_id = $request->input('cate_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->qty = $request->input('qty');
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';
        $products->ingredients = $request->input('ingredients');
        $products->uses = $request->input('uses');
        $products->directions = $request->input('directions');
        
        if($request->hasFile('image1')){
            $file = $request->file('image1');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move("assets/uploads/products/",$filename);
            $products->image1 = $filename;
        }
        if($request->hasFile('image2')){
            $file = $request->file('image2');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move("assets/uploads/products/",$filename);
            $products->image2 = $filename;
        }
        if($request->hasFile('image3')){
            $file = $request->file('image3');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move("assets/uploads/products/",$filename);
            $products->image3 = $filename;
        }
        $products->save();
        return redirect('products')->with('status', 'Thêm sản phẩm thành công.');
    }

    public function edit($id){
        $products = Product::find($id);
        return view('admin.product.edit', compact('products'));
    }

    public function update(Request $request, $id){
        $products = Product::find($id);
        if($request->hasfile('image1')){
            $path = 'assets/uploads/products/'.$products->image1;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image1');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move("assets/uploads/products/",$filename);
            $products->image1 = $filename;
        }

        if($request->hasfile('image2')){
            $path = 'assets/uploads/products/'.$products->image2;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image2');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move("assets/uploads/products/",$filename);
            $products->image2 = $filename;
        }

        if($request->hasfile('image3')){
            $path = 'assets/uploads/products/'.$products->image3;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image3');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move("assets/uploads/products/",$filename);
            $products->image3 = $filename;
        }
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->original_price = $request->input('original_price');
        $products->selling_price = $request->input('selling_price');
        $products->qty = $request->input('qty');
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';
        $products->ingredients = $request->input('ingredients');
        $products->uses = $request->input('uses');
        $products->directions = $request->input('directions');
        $products->update();
        return redirect('products')->with('status','Chỉnh sửa thông tin sản phẩm thành công.');
    }

    public function destroy($id){
        $products = Product::find($id);
        $products->delete();
        return back();
    }
}
