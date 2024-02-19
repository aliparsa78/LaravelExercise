<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('Brand.index',compact('brands'));
    }
    function addBrand(Request $request){
        $validate = $request->validate([
            'brand_name'=>'required|max:18',
            'brand_image'=>'required|mimes:jpg,png,jpeg'
        ],
        [
            'brand_name.required'=>'please insert the Brand Name',
            'brand_name.max'=>'Please insert the brand name under 18 character',
            'brand_image.required'=>'Please insert the brand image',
            'brand_image.mimes'=>'Please insert the brand image with(jpg,jpeg,png) extension',
        ]
        );


        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        if($request->hasFile('brand_image')){
            $image = $request->brand_image;
            $imageName = time().'.'.$image->getClientOriginalExtension();
            // $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $request->brand_image->move('Images/Brand/',$imageName);
            $brand->brand_image = $imageName;
        }
        $brand->save();
        return redirect()->back();
    }

    public function edite($id)
    {
        $brand = Brand::find($id);
        return view('Brand.edite',compact('brand'));
    }
    public function updateBrand(Request $request, $id)
    {
        $brand = Brand::find($id);
        $old_image = $brand->brand_image;
        $image_path = public_path('Images/Brand/'.$old_image);
        $brand->brand_name = $request->brand_name;
        if($request->hasFile('brand_image')){
            if(file_exists($image_path)){
                
                unlink($image_path);
            }
            $image = $request->brand_image;
            $imageName = time().'.'.$image->getClientOriginalExtension();
            // $imageName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $request->brand_image->move('Images/Brand/',$imageName);
            $brand->brand_image = $imageName;
        }
        $brand->update();
        return redirect()->route('brand')->with('success','Brand updated successfuly ');
    }
    public function DeleteBrand($id){
        $brand = Brand::find($id);
        $old_image = $brand->brand_image;
        $image_path = public_path('Images/Brand/'.$old_image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        Brand::find($id)->delete();
        return back()->with('success','Brand Deleted Successfuly !');
    }
}
