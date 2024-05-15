<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\item_color_tbl;
use App\Models\item_size_tbl;
use Auth;

class categoryController extends Controller
{
    public function sub_category()
    {
        return view('Category.sub_category');
    }

    public function women_category()
    {
        $find_women_cat = Category::where('cate_type', 'Women')->get();

        return view('Category.women_cat')->with('cate_type', $find_women_cat);
    }

    public function men_category()
    {
        $find_women_cat = Category::where('cate_type', 'Men')->get();

        return view('Category.men_cat')->with('cate_type', $find_women_cat);
    }

    public function kide_category()
    {
        $find_kide_cat = Category::where('cate_type', 'Kids & Babies Clothes')->get();

        return view('Category.kide')->with('cate_type', $find_kide_cat);
    }

    public function home_category()
    {
        $find_kide_cat = Category::where('cate_type', 'Home & Life Style')->get();

        return view('Category.home_cat')->with('cate_type', $find_kide_cat);
    }

    public function sub_cat_add(Request $request)
    {
        $all = $request->all();
        $cate_name = $request->cate_name;
        $cate_type = $request->cate_type;
        $cate_image = $request->file('cate_image');
        $cate_created_by = Auth::user()->id;
        $added_datetime = date('Y-m-d H:i:s');
 
        $errors = [
            'cate_name.required' => 'Category name is Required.',
            'cate_type.required' => 'Category type is Required.',
            'cate_image.required' => 'Category image is Required.',
            'cate_image.dimensions' => 'The category image has invalid image dimensions.',
            'cate_image.size' => 'The category image must be max:500 kilobytes.',
            'cate_image.image' => 'The category image must be an image.',
            'cate_image.mimes' => 'The category image must be a file of type: jpeg, png, jpg, gif, svg.',
          ];
          
          
        $this->validate($request, [
            'cate_name' => 'required|string|max:30',
            'cate_type' => 'required|string|max:30',
            'cate_image' => 'required|dimensions:max_width=300,max_height=300|image|mimes:jpeg,png,jpg,gif,svg',
        ],$errors);


        $find_cate = Category::where('cate_type', $cate_type)->count();
        $code = $find_cate + 1;
        
        if ($cate_type == "Women") 
        {
            $code_val = "WM".$code;
        }
        if ($cate_type == "Men") 
        {
            $code_val = "MN".$code;
        }
        if ($cate_type == "Kids & Babies Clothes") 
        {
            $code_val = "KDBC".$code;
        }
        if ($cate_type == "Home & Life Style") 
        {
            $code_val = "HLS".$code;
        }

        $image = $code_val.'.'.$cate_image->getClientOriginalExtension();
        $image_filepath = "img/sub_category/".$cate_type;
        $image_filepath_org = "img/sub_category/".$cate_type."/".$image;
        $cate_image->move(public_path($image_filepath),$image);

        

        $add_new_cate = new Category();
        $add_new_cate->main_cate_code = $code_val;
        $add_new_cate->cate_name = $cate_name;
        $add_new_cate->cate_type = $cate_type;
        $add_new_cate->cate_image = $image_filepath_org;
        $add_new_cate->cate_created_by = $cate_created_by;
        $add_new_cate->cate_created_date = $added_datetime;
        $add_new_cate->save();
        
        return redirect('sub_category')->with('success', 'Database update successfully..!');
    }
}



