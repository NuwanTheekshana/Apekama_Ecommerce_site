<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_to_cart;
use App\Models\favourite_tbl;
use DB;
use Auth;

class addtocart_controller extends Controller
{
    public function addtocart_count()
    {
        $user_id = Auth::user()->id;
        $addtocart_count = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->count();
        
        return $addtocart_count;
    }

    public function fav_count()
    {
        $user_id = Auth::user()->id;
        $fav_count = favourite_tbl::where('user_id', $user_id)->where('remove_status', '0')->distinct()->count('item_id');

        return $fav_count;
    }


    public function addtocart(Request $request)
    {
        $id = $request->id;
        $added_by = Auth::user()->id;
        $added_datetime = date('Y-m-d H:i:s');


        // $find_item = DB::select('select * from items where id = '.$id);
        $find_item = DB::table('items')->where('id', $id)->get()->first();
        $item_code = $find_item->item_code;
        $item_name = $find_item->item_name;
        $item_price = $find_item->item_price;
        $itm_tble_item_qty = $find_item->item_qty;
        $main_cate_code = $find_item->main_cate_code;
        $item_image = $find_item->item_image;

        $find_add_to_card_items_count = add_to_cart::where('item_code', $item_code)->where('add_to_cart_status', '1')->where('item_add_user_id', $added_by)->count();

        if ($find_add_to_card_items_count >= 1) 
        {
            $find_qty = add_to_cart::where('item_code', $item_code)->where('add_to_cart_status', '1')->where('item_add_user_id', $added_by)->value('item_qty');
            $id = add_to_cart::where('item_code', $item_code)->where('add_to_cart_status', '1')->where('item_add_user_id', $added_by)->value('id');
            $total_item_qty = add_to_cart::where('item_code', $item_code)->where('add_to_cart_status', '1')->sum('item_qty');
            $item_qty = $find_qty + 1;
            $total_itm_qty = $total_item_qty + 1;

            if ($itm_tble_item_qty < $total_itm_qty) 
            {
                $find_item = DB::update('update items set item_store_status = 0 where id = ?', [$id]);
                $error_qty = "Item out of stock";
                return response()->json(['error_qty'=>$error_qty]);
            }

            $find_add_to_cart_itm = add_to_cart::find($id);
            $find_add_to_cart_itm->item_qty = $item_qty;
            $find_add_to_cart_itm->update();

        }
        else if($find_add_to_card_items_count == 0)
        {
            $item_qty = 1;
            $add_new_cart = new add_to_cart();
            $add_new_cart->item_code = $item_code;
            $add_new_cart->item_name = $item_name;
            $add_new_cart->item_price = $item_price;
            $add_new_cart->item_qty = $item_qty;
            $add_new_cart->main_cate_code = $main_cate_code;
            $add_new_cart->item_image = $item_image;
            $add_new_cart->item_add_date = $added_datetime;
            $add_new_cart->item_add_user_id = $added_by;
            $add_new_cart->save();
        }

        $find_add_to_card_items_count = add_to_cart::where('add_to_cart_status', '1')->where('item_add_user_id', $added_by)->count();

        
        return response()->json(['success'=>$id, 'itm_count' => $find_add_to_card_items_count]);
    }


    public function addtocart_fav(Request $request)
    {
        $id = $request->id;
        $added_by = Auth::user()->id;
        $added_datetime = date('Y-m-d H:i:s');

        $find_fav = favourite_tbl::find($id);
        $item_id = $find_fav->item_id;

        // $find_item = DB::select('select * from items where id = '.$id);
        $find_item = DB::table('items')->where('id', $item_id)->get()->first();
        $item_code = $find_item->item_code;
        $item_name = $find_item->item_name;
        $item_price = $find_item->item_price;
        $itm_tble_item_qty = $find_item->item_qty;
        $main_cate_code = $find_item->main_cate_code;
        $item_image = $find_item->item_image;

        $find_add_to_card_items_count = add_to_cart::where('item_code', $item_code)->where('add_to_cart_status', '1')->where('item_add_user_id', $added_by)->count();

        if ($find_add_to_card_items_count >= 1) 
        {
            $find_qty = add_to_cart::where('item_code', $item_code)->where('add_to_cart_status', '1')->where('item_add_user_id', $added_by)->value('item_qty');
            $id = add_to_cart::where('item_code', $item_code)->where('add_to_cart_status', '1')->where('item_add_user_id', $added_by)->value('id');
            $total_item_qty = add_to_cart::where('item_code', $item_code)->where('add_to_cart_status', '1')->sum('item_qty');
            $item_qty = $find_qty + 1;
            $total_itm_qty = $total_item_qty + 1;

            if ($itm_tble_item_qty < $total_itm_qty) 
            {
                $find_item = DB::update('update items set item_store_status = 0 where id = ?', [$id]);
                $error_qty = "Item out of stock";
                return response()->json(['error_qty'=>$error_qty]);
            }

            $find_add_to_cart_itm = add_to_cart::find($id);
            $find_add_to_cart_itm->item_qty = $item_qty;
            $find_add_to_cart_itm->update();

        }
        else if($find_add_to_card_items_count == 0)
        {
            $item_qty = 1;
            $add_new_cart = new add_to_cart();
            $add_new_cart->item_code = $item_code;
            $add_new_cart->item_name = $item_name;
            $add_new_cart->item_price = $item_price;
            $add_new_cart->item_qty = $item_qty;
            $add_new_cart->main_cate_code = $main_cate_code;
            $add_new_cart->item_image = $item_image;
            $add_new_cart->item_add_date = $added_datetime;
            $add_new_cart->item_add_user_id = $added_by;
            $add_new_cart->save();
        }

        $remove_data = favourite_tbl::find($id);
        $remove_data->remove_status = '1';
        $remove_data->update();

        $fav_count = favourite_tbl::where('remove_status', '0')->where('user_id', $added_by)->count();
        $find_add_to_card_items_count = add_to_cart::where('add_to_cart_status', '1')->where('item_add_user_id', $added_by)->count();

        
        return response()->json(['success'=>$id, 'itm_count' => $find_add_to_card_items_count, 'fav_count' => $fav_count]);
    }

    public function addtocartpage()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();
        $total_price = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->sum('item_price');
        $total_qty = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->sum('item_qty');

        
        $total_amount = $total_price * $total_qty;
        // dd($total_amount);127200.0
        
        return view('layout.addcart')
        ->with('addtocart_count', $addtocart_count)
        ->with('fav_count', $fav_count)
        ->with('addtocart', $addtocart);
    }

    public function checkout()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();
        $total_price = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->sum(DB::raw('item_qty * item_price'));
        $total_qty = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->sum('item_qty');

        
        return view('layout.checkout')
        ->with('addtocart_count', $addtocart_count)
        ->with('sub_total_price', $total_price)
        ->with('total_price', $total_price)
        ->with('fav_count', $fav_count)
        ->with('addtocart', $addtocart);
    }

    public function product_details($id)
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();
        $total_price = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->sum(DB::raw('item_qty * item_price'));
        $total_qty = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->sum('item_qty');

        // item
        $item_details = DB::table('items')->where('id', $id)->get();
        $item_code_val = DB::table('items')->where('id', $id)->value('item_code');

        $item_color = DB::table('item_color_tbls')->where('item_code', $item_code_val)->where('status', '1')->pluck('item_color')->toarray();
        $item_size = DB::table('item_size_tbls')->where('item_code', $item_code_val)->where('status', '1')->pluck('item_size')->toarray();


        //images
        $main_img_path = DB::table('items')->where('id', $id)->pluck('item_image')->toarray();
        $item_code = DB::table('items')->where('id', $id)->value('item_code');
        $extra_img_path = DB::table('extra_image_tbls')->where('item_code', $item_code)->pluck('item_ex_image_path')->toarray();
        $join_all_img = array_unique(array_merge($main_img_path , $extra_img_path ));

        $find_cust_comment = DB::table('customer_item_comment_tbls')->where('remove_status', '0')->where('status', 'Complete')->get();

        return view('layout.product_details')
        ->with('id', $id)
        ->with('find_cust_comment', $find_cust_comment)
        ->with('addtocart_count', $addtocart_count)
        ->with('sub_total_price', $total_price)
        ->with('total_price', $total_price)
        ->with('all_img', $join_all_img)
        ->with('item_details', $item_details[0])
        ->with('item_color', $item_color)
        ->with('item_size', $item_size)
        ->with('fav_count', $fav_count)
        ->with('addtocart', $addtocart);
    }

    public function addtocart_itm_remove(Request $request)
    {
        $id = $request->id;

        $find_data = add_to_cart::find($id);
        $find_data->add_to_cart_status = 0;
        $find_data->update();

        return response()->json(['success'=> 'Item removed successfully..!']);
    }

    public function update_cart(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;

        foreach ($id as $i => $value) {
            $update_qty = add_to_cart::find($id[$i]);
            $update_qty->item_qty = $qty[$i];
            $update_qty->update();
        }
       
        return response()->json(['success'=> 'Cart update successfully..!']);
    }

    public function check_itm_qty(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;

        $find_update_cart_id = add_to_cart::find($id);
        $find_itm_code = $find_update_cart_id->item_code;

        // add-to-cart added quntity
        $total_added_quntity = add_to_cart::where('item_code', $find_itm_code)->sum('item_qty');
        $find_item_qty = DB::table('items')->where('item_code', $find_itm_code)->value('item_qty');

        $itm_previous_added_qty = add_to_cart::where('item_code', $find_itm_code)->where('id', $id)->value('item_qty');
        $item_balance_qty = $qty - $itm_previous_added_qty;
        $total_added_quntity = $total_added_quntity + $item_balance_qty;

        $avalible_qty = $find_item_qty - $total_added_quntity;

        $status = ($avalible_qty <= 0)?"0":"1";


        return response()->json(['status'=>$status, 
        'added' => $total_added_quntity, 
        'find_item_qty' => $find_item_qty, 
        'avalible_qty' => $avalible_qty]);
    }
}
