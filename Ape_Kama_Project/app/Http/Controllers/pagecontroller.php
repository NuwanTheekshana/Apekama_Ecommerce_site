<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\add_to_cart;
use App\Models\favourite_tbl;
use Auth;
use DB;

class pagecontroller extends Controller
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

    public function index()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();
        $last_items = DB::table('items')->where('item_status', '1')->where('item_store_status', '1')->latest()->take(10)->get();
        $first_items = DB::table('items')->where('item_status', '1')->where('item_store_status', '1')->take(10)->get();
    

        return view('home')
        ->with('last_items', $last_items)
        ->with('first_items', $first_items)
        ->with('fav_count', $fav_count)
        ->with('addtocart_count', $addtocart_count);
    }

    public function women_category()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $find_women_cat = DB::select("select * from categories where cate_type = 'Women'");
        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();
        
        return view('category.women')->with('find_women_cat', $find_women_cat)->with('addtocart_count', $addtocart_count)->with('fav_count', $fav_count)->with('addtocart', $addtocart);
    }

    public function men_category()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $find_men_cat = DB::select("select * from categories where cate_type = 'Men'");
        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();
      
        return view('category.men')->with('find_men_cat', $find_men_cat)->with('addtocart_count', $addtocart_count)->with('addtocart', $addtocart)->with('fav_count', $fav_count);
    }

    public function kids_category()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $find_kid_cat = DB::select("select * from categories where cate_type = 'Kids & Babies Clothes'");
        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();

        return view('category.kids')->with('find_kid_cat', $find_kid_cat)->with('addtocart_count', $addtocart_count)->with('addtocart', $addtocart)->with('fav_count', $fav_count);
    }

    public function homeLife_category()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $find_home_cat = DB::select("select * from categories where cate_type = 'Home & Life Style'");
        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();

        return view('category.homeLife')->with('find_home_cat', $find_home_cat)->with('addtocart_count', $addtocart_count)->with('addtocart', $addtocart)->with('fav_count', $fav_count);
    }

    public function New_arrivals()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();
        $find_new_arrivals = DB::select("select * from categories where cate_status = '1'");

        return view('category.New_arrivals')
        ->with('find_new_arrivals', $find_new_arrivals)
        ->with('addtocart_count', $addtocart_count)
        ->with('fav_count', $fav_count)
        ->with('addtocart', $addtocart);
    }

    public function best_selling()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();
        $find_best_selling = DB::select("select * from categories where cate_status = '1'");

        return view('category.best_selling')
        ->with('addtocart_count', $addtocart_count)
        ->with('find_best_selling', $find_best_selling)
        ->with('fav_count', $fav_count)
        ->with('addtocart', $addtocart);
    }

    public function women_cat_item($id)
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $find_cat_items = DB::table('categories')->where('id', $id)->value('main_cate_code');
        $find_women_cat_item = DB::table('items')->where('main_cate_code', $find_cat_items)->where('item_status', '1')->paginate(10);
        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();

        return view('items.women_items')->with('find_women_cat_item', $find_women_cat_item)->with('addtocart_count', $addtocart_count)->with('addtocart', $addtocart)->with('fav_count', $fav_count);
        
    }

    public function men_cat_item($id)
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $find_cat_items = DB::table('categories')->where('id', $id)->value('main_cate_code');
        $find_men_cat_item = DB::table('items')->where('main_cate_code', $find_cat_items)->where('item_status', '1')->paginate(10);
        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();

        return view('items.men_item')->with('find_men_cat_item', $find_men_cat_item)->with('addtocart_count', $addtocart_count)->with('addtocart', $addtocart)->with('fav_count', $fav_count);
    }
    

    public function kide_cat_item($id)
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $find_cat_items = DB::table('categories')->where('id', $id)->value('main_cate_code');
        $find_kide_cat_item = DB::table('items')->where('main_cate_code', $find_cat_items)->where('item_status', '1')->paginate(10);
        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();

        return view('items.kide_item')->with('find_kide_cat_item', $find_kide_cat_item)->with('addtocart_count', $addtocart_count)->with('addtocart', $addtocart)->with('fav_count', $fav_count);
    }

    public function home_cat_item($id)
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $find_cat_items = DB::table('categories')->where('id', $id)->value('main_cate_code');
        $find_home_cat_item = DB::table('items')->where('main_cate_code', $find_cat_items)->where('item_status', '1')->paginate(10);
        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();

        return view('items.home_item')->with('find_home_cat_item', $find_home_cat_item)->with('addtocart_count', $addtocart_count)->with('fav_count', $fav_count);
    }

}
