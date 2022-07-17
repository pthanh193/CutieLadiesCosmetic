<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }


    public function add(){
        return view('admin.brand.add');
    }

    public function insert(Request $request){
        $brands = new Brand();
        $brands->name = $request->input('name');
        $brands->slug = $request->input('slug');
        $brands->origin = $request->input('origin');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move("assets/uploads/brands/",$filename);
            $brands->image = $filename;
        }
        $brands->save();
        return redirect('brands')->with('status', 'Thêm thương hiệu thành công.');
    }

    public function edit($id){
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }

    public function update(Request $request,$id){
        $brands = Brand::find($id);
        $brands->name = $request->input('name');
        $brands->slug = $request->input('slug');
        $brands->origin = $request->input('origin');
        if($request->hasfile('image')){
            $path = 'assets/uploads/brands/'.$brands->image1;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move("assets/uploads/brands/",$filename);
            $brands->image = $filename;
        }
        $brands->update();
        return redirect('brands')->with('status', 'Chỉnh sửa thông tin thành công.');
    }

    public function destroy($id){
        $brands = Brand::find($id);
        $brands->delete();
        return back();
    }
}
