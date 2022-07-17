<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }


    public function add(){
        return view('admin.category.add');
    }

    public function insert(Request $request){
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        // $category->status = $request->input('status') == TRUE ? '1' : '0';
        // $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->save();
        return redirect('categories')->with('status', 'Thêm loại sản phẩm thành công.');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request,$id){
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        // $category->status = $request->input('status') == TRUE ? '1' : '0';
        // $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->update();
        return redirect('categories')->with('status', 'Chỉnh sửa thông tin thành công.');

    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return back();
    }
}
