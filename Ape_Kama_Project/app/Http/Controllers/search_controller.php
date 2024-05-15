<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_to_cart;
use App\Models\favourite_tbl;
use DB;
use Auth;

class search_controller extends Controller
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


    public function search_form(Request $request)
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $search_input = $request->search_input;
        $quary = DB::table('items')->where('item_status', '1')->where('item_store_status', '1');
        if ($search_input != null) 
        {
            $quary->where('item_name', 'rlike', $search_input);
        }

        $data = $quary->orderBy('id','desc')->get();


        return view('search.search_result')
        ->with('find_data', $data)
        ->with('fav_count', $fav_count)
        ->with('addtocart_count', $addtocart_count);

    }

    public function search_form_gust(Request $request)
    {
        $search_input = $request->search_input;
        $quary = DB::table('items')->where('item_status', '1')->where('item_store_status', '1');
        if ($search_input != null) 
        {
            $quary->where('item_name', 'rlike', $search_input);
        }
        $data = $quary->orderBy('id','desc')->get();

        return view('search.search_result')
        ->with('find_data', $data);
    }
}
