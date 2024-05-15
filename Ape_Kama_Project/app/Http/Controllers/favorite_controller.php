<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cust_user;
use App\Models\favourite_tbl;
use App\Models\User;
use Auth;
use DB;

class favorite_controller extends Controller
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



    public function favourite_page()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();
        $user_id = Auth::user()->id;

        $fav_get_data = favourite_tbl::where('user_id', $user_id)->where('remove_status', '0')->distinct()->get();
        $fav_get_data = DB::table('favourite_tbls')
                        ->select('favourite_tbls.id as fav_id', 'favourite_tbls.*', 'items.*')
                        ->join('items', 'items.id', '=', 'favourite_tbls.item_id')
                        ->where('favourite_tbls.user_id', $user_id)
                        ->where('favourite_tbls.remove_status', '0')
                        ->get();

        return view('layout.favourite')
        ->with('fav_count', $fav_count)
        ->with('fav_get_data', $fav_get_data)
        ->with('addtocart_count', $addtocart_count);
    }


    public function favorite_add(Request $request)
    {
        $id = $request->id;
        $user_id = Auth::user()->id;
        $username = Auth::user()->fullname;

        $find_item_dup = favourite_tbl::where('item_id', $id)->where('user_id', $user_id)->where('remove_status', '0')->count();

        if ($find_item_dup == 0) 
        {
            $data[] = array(
                'item_id' => $id,
                'user_id' => $user_id,
                'user_name' => $username,
            );
            favourite_tbl::insert($data);
        }
        else
        {
            $fav_count = favourite_tbl::where('user_id', $user_id)->where('remove_status', '0')->distinct()->count('item_id');
            return response()->json(['error'=>'Already added', 'fav_count'=>$fav_count]);
        }

        $fav_count = favourite_tbl::where('user_id', $user_id)->where('remove_status', '0')->distinct()->count('item_id');

        return response()->json(['success'=>'done', 'fav_count'=>$fav_count]);
    }

    public function favorite_remove(Request $request)
    {
        $id = $request->id;
        $user_id = Auth::user()->id;

        $remove_data = favourite_tbl::find($id);
        $remove_data->remove_status = '1';
        $remove_data->update();

        $fav_count = favourite_tbl::where('remove_status', '0')->where('user_id', $user_id)->count();

        return response()->json(['success'=>'Remove favourite item successfully..!', 'fav_count'=>$fav_count]);
    }
}
