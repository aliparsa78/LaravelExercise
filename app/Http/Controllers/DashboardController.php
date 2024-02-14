<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

use Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::check()){
            if(Auth::user()->user_type==1){
                $users = User::all();
                return view('dashboard',compact('users'));
            }elseif(Auth::user()->user_type == 0){
                return view('home');
            }
        }
    }

    public function category(){
        $categories = Category::all();
        return view('Category',compact('categories'));
    }
}
