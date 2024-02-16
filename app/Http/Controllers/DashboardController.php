<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Category;
use softdeletestrait;

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
        $categories = Category::latest()->Paginate(3);
        $trashCategory = Category::onlyTrashed()->latest()->paginate(10);
        return view('Category/Category',compact('categories','trashCategory'));
    }

    public function addCategory(Request $request){
        $category = new Category();
        $category->user_id = Auth::user()->id;
        $category->category_name = $request->input('category_name');
        $category->save();
        return redirect()->back()->with('success','Category added successfuly !');
    }
    public function editCategory($id){
        $category = Category::find($id);
        return view('Category/edit',compact('category'));
    }
    public function categoryUpdate(Request $request,$id){
        $categories = Category::find($id);
        $categories->category_name = $request->category_name;
        $categories->update();
        return redirect()->route('category')->with('success','Category updated successfuly ');
    }
    public function sofrDelete($id)
    {
        $category = Category::find($id)->delete();
        return back()->with('success','Category deleted successfuly');

    }
    public function RestoreCategory($id)
    {
        $category = Category::withTrashed()->find($id)->restore();
        return back()->with('success','Category Restored successfuly ');
    }
    public function PdeleteCategory($id)
    {
        $category = Category::onlyTrashed()->find($id)->forceDelete();
        return back()->with('success','Category delete permenently');
    }
}
