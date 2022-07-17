<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;

class FrontendController extends Controller
{
    // public function index(){
    //     return view('admin.index');
    // }

    public function members()
    {
        $user = User::all();
        return view('admin.member', compact('user'));
    }

    public function delmember($id)
    {
        $user  = User::find($id);
        $user->delete();
        return back();
    }

    public function review(){
        $review = Review::all();
        return view('admin.review', compact('review'));
    }

    public function delreview($id)
    {
        $review  = Review::find($id);
        $review->delete();
        return back();
    }
}

