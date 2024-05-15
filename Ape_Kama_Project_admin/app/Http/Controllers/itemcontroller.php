<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\items;
use App\Models\item_color_tbl;
use App\Models\item_size_tbl;
use App\Models\extra_image_tbl;
use Auth;

class itemcontroller extends Controller
{
    public function womenitem_cat($id)
    {
        $find_category = Category::find($id);
        $item_code = $find_category->main_cate_code;
        $cate_name = $find_category->cate_name;
        $main_cate_code = items::where('main_cate_code', $item_code)->where('item_status', '1')->get();

        return view('items.women_item')
        ->with('main_cate_code', $main_cate_code)
        ->with('item_code', $item_code)
        ->with('cate_name', $cate_name);
    }

    public function menitem_cat($id)
    {
        $find_category = Category::find($id);
        $item_code = $find_category->main_cate_code;
        $cate_name = $find_category->cate_name;
        $main_cate_code = items::where('main_cate_code', $item_code)->where('item_status', '1')->get();

        return view('items.men_item')
        ->with('main_cate_code', $main_cate_code)
        ->with('item_code', $item_code)
        ->with('cate_name', $cate_name);
    }

    public function kideitem_cat($id)
    {
        $find_category = Category::find($id);
        $item_code = $find_category->main_cate_code;
        $cate_name = $find_category->cate_name;
        $main_cate_code = items::where('main_cate_code', $item_code)->where('item_status', '1')->get();

        return view('items.kide_item')
        ->with('main_cate_code', $main_cate_code)
        ->with('item_code', $item_code)
        ->with('cate_name', $cate_name);
    }

    public function homeitem_cat($id)
    {
        $find_category = Category::find($id);
        $item_code = $find_category->main_cate_code;
        $cate_name = $find_category->cate_name;
        $main_cate_code = items::where('main_cate_code', $item_code)->where('item_status', '1')->get();

        return view('items.kide_item')
        ->with('main_cate_code', $main_cate_code)
        ->with('item_code', $item_code)
        ->with('cate_name', $cate_name);
    }

    

    public function item_add(Request $request)
    {

        $all = $request->all();
        $item_name = $request->item_name;
        $unit_price = $request->unit_price;
        $item_qty = $request->item_qty;
        $cat_code = $request->cat_code;
        $item_image = $request->file('item_image');
        $item_option = $request->item_option;
        $size_option_status = $request->size_option_status;
        $color_option_status = $request->color_option_status;

        //extra images request
        $ex_image1 = $request->file('ex_image1');
        $ex_image2 = $request->file('ex_image2');
        $ex_image3 = $request->file('ex_image3');
        $ex_image4 = $request->file('ex_image4');
        $ex_image5 = $request->file('ex_image5');

        $ex_img = array($ex_image1, $ex_image2, $ex_image3, $ex_image4, $ex_image5);
        $array_count_ex_img = array_filter($ex_img);
        $array_count_ex_img = count($array_count_ex_img);

        if ($array_count_ex_img != 0) 
        {
            $rand_date = date('Ymdhhiiss');
            $rand_token = "ex_img_".$rand_date;        
        }
        else
        {
            $rand_token = "";
        }

        $errors = [
            'item_name.required' => 'Item name is Required.',
            'unit_price.required' => 'Unit price is Required.',
            'item_qty.required' => 'Item Quantity is Required.',
            'item_image.dimensions' => 'The category image has invalid image dimensions.',
            'item_image.size' => 'The category image must be max:500 kilobytes.',
            'item_image.image' => 'The category image must be an image.',
            'item_image.mimes' => 'The category image must be a file of type: jpeg, png, jpg, gif, svg.',
          ];
          
          
        $this->validate($request, [
            'item_name' => 'required|string|max:30',
            'unit_price' => 'required|numeric',
            'item_qty' => 'required|numeric',
            'item_image' => 'required|dimensions:max_width=300,max_height=300|image|mimes:jpeg,png,jpg,gif,svg',
        ],$errors);

        $cate_created_by = Auth::user()->id;
        $added_datetime = date('Y-m-d H:i:s');

        $find_items_count = items::where('main_cate_code', $cat_code)->count();
        $find_items_value = Category::where('main_cate_code', $cat_code)->value('cate_type');
        $item_code = $find_items_count+1;
        $item_code = $find_items_value."-".$cat_code."-000".$item_code;

        $item_images_val = $item_code.'.'.$item_image->getClientOriginalExtension();
        $image_filepath = "img/items/".$find_items_value; 
        $image_filepath_org = "img/items/".$find_items_value."/".$item_images_val;
       
        $item_image->move(public_path($image_filepath),$item_images_val);
        

        if ($ex_image1 != null) 
        {
            // $item_code = $item_code.'-ex_image1';
            $item_images_val = $item_code.rand().'.'.$ex_image1->getClientOriginalExtension();
            $image_filepath = "img/items/".$find_items_value.'/extra_img';
            $image_filepath_org_ex1 = $image_filepath."/".$item_images_val;
            $ex_image1->move(public_path($image_filepath),$item_images_val);

            // db insert
            $new_ex_img1 = new extra_image_tbl();
            $new_ex_img1->item_code = $item_code;
            $new_ex_img1->item_ex_image_token = $rand_token;
            $new_ex_img1->item_ex_image_path = $image_filepath_org_ex1;
            $new_ex_img1->added_user = $cate_created_by;
            $new_ex_img1->add_date = $added_datetime;
            $new_ex_img1->save();

        }
        if ($ex_image2 != null) 
        {
            // $item_code = $item_code.'-ex_image2';
            $item_images_val = $item_code.rand().'.'.$ex_image2->getClientOriginalExtension();
            $image_filepath = "img/items/".$find_items_value.'/extra_img';
            $image_filepath_org_ex2 = $image_filepath."/".$item_images_val;
            $ex_image2->move(public_path($image_filepath),$item_images_val);

            // db insert
            $new_ex_img1 = new extra_image_tbl();
            $new_ex_img1->item_code = $item_code;
            $new_ex_img1->item_ex_image_token = $rand_token;
            $new_ex_img1->item_ex_image_path = $image_filepath_org_ex2;
            $new_ex_img1->added_user = $cate_created_by;
            $new_ex_img1->add_date = $added_datetime;
            $new_ex_img1->save();
        }
        if ($ex_image3 != null) 
        {
            // $item_code = $item_code.'-ex_image3';
            $item_images_val = $item_code.rand().'.'.$ex_image3->getClientOriginalExtension();
            $image_filepath = "img/items/".$find_items_value.'/extra_img';
            $image_filepath_org_ex3 = $image_filepath."/".$item_images_val;
            $ex_image3->move(public_path($image_filepath),$item_images_val);

            // db insert
            $new_ex_img1 = new extra_image_tbl();
            $new_ex_img1->item_code = $item_code;
            $new_ex_img1->item_ex_image_token = $rand_token;
            $new_ex_img1->item_ex_image_path = $image_filepath_org_ex3;
            $new_ex_img1->added_user = $cate_created_by;
            $new_ex_img1->add_date = $added_datetime;
            $new_ex_img1->save();
        }
        if ($ex_image4 != null) 
        {
            // $item_code = $item_code.'-ex_image4';
            $item_images_val = $item_code.rand().'.'.$ex_image4->getClientOriginalExtension();
            $image_filepath = "img/items/".$find_items_value.'/extra_img';
            $image_filepath_org_ex4 = $image_filepath."/".$item_images_val;
            $ex_image4->move(public_path($image_filepath),$item_images_val);

            // db insert
            $new_ex_img1 = new extra_image_tbl();
            $new_ex_img1->item_code = $item_code;
            $new_ex_img1->item_ex_image_token = $rand_token;
            $new_ex_img1->item_ex_image_path = $image_filepath_org_ex4;
            $new_ex_img1->added_user = $cate_created_by;
            $new_ex_img1->add_date = $added_datetime;
            $new_ex_img1->save();
        }
        if ($ex_image5 != null) 
        {
            // $item_code = $item_code.'-ex_image5';
            $item_images_val = $item_code.rand().'.'.$ex_image5->getClientOriginalExtension();
            $image_filepath = "img/items/".$find_items_value.'/extra_img';
            $image_filepath_org_ex5 = $image_filepath."/".$item_images_val;
            $ex_image5->move(public_path($image_filepath),$item_images_val);

            // db insert
            $new_ex_img1 = new extra_image_tbl();
            $new_ex_img1->item_code = $item_code;
            $new_ex_img1->item_ex_image_token = $rand_token;
            $new_ex_img1->item_ex_image_path = $image_filepath_org_ex4;
            $new_ex_img1->added_user = $cate_created_by;
            $new_ex_img1->add_date = $added_datetime;
            $new_ex_img1->save();
        }

        
        $add_items = new items();
        $add_items->item_code = $item_code;
        $add_items->item_name = $item_name;
        $add_items->item_price = $unit_price;
        $add_items->item_qty = $item_qty;
        $add_items->item_option = $item_option;
        $add_items->item_image = $image_filepath_org;
        $add_items->item_ex_image_token = $rand_token;
        $add_items->main_cate_code = $cat_code;
        $add_items->main_cate_name = $find_items_value;
        $add_items->item_add_user_id = $cate_created_by;
        $add_items->item_add_date = $added_datetime;
        $add_items->save();

        if ($item_option == "Yes") 
        {
            if ($color_option_status) 
            {
               $color_list = $request->color_list_value;
               foreach ($color_list as $key => $color) 
               {
                  $item_color = new item_color_tbl();
                  $item_color->item_code = $item_code;
                  $item_color->item_color = $color_list[$key];
                  $item_color->status = '1';
                  $item_color->save();
               }
            }
            elseif ($size_option_status) 
            {
                $size_list = $request->size_list_value;
                foreach ($size_list as $key => $size) 
                {
                    $item_size = new item_size_tbl();
                    $item_size->item_code = $item_code;
                    $item_size->item_size = $size_list[$key];
                    $item_size->status = '1';
                    $item_size->save();
                }
            }
        }

        return redirect()->back()->with('success', 'Database update successfully..!');

    }


    public function update_item(Request $request)
    {
        $id = $request->item_id;
        $update_item_name = $request->update_item_name;
        $update_unit_price = $request->update_unit_price;
        $update_unit_quntity = $request->update_unit_quntity;
        $item_image = $request->file('update_item_image');

        $find_item = items::find($id);

        if ($item_image == null) 
        {
            $image_filepath_org = $find_item->item_image;
        }
        else
        {
            $item_img_name = basename($find_item->item_image).rand();
            $item_img_name = pathinfo($item_img_name, PATHINFO_FILENAME);
            $item_path = $find_item->item_image;
            $item_path_name = pathinfo($item_path, PATHINFO_DIRNAME);

            $item_images_val = $item_img_name.'.'.$item_image->getClientOriginalExtension();
            $image_filepath = $item_path_name;
            $image_filepath_org = $item_path_name."/".$item_images_val;
            $item_image->move(public_path($image_filepath),$item_images_val);
        }
        

        $find_item->item_name = $update_item_name;
        $find_item->item_price = $update_unit_price;
        $find_item->item_qty = $update_unit_quntity;
        $find_item->item_image = $image_filepath_org;
        $find_item->update();

        return redirect()->back()->with('success', 'Database update successfully..!');

    }

    public function remove_item(Request $request)
    {
        $id = $request->rem_itm_id;

        $find_item = items::find($id);
        $find_item->item_status = 0;
        $find_item->update();

        return redirect()->back()->with('success', 'Item removed successfully..!');
    }

    
}
