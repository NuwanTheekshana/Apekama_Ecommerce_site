<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_to_cart;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $addtocart_count = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->count();
        // return view('home')->with('addtocart_count', $addtocart_count);
    }

    public function welcome()
    {
        $addtocart_count = 0;
        $fav_count = 0;
        $last_items = DB::table('items')->where('item_status', '1')->where('item_store_status', '1')->latest()->take(10)->get();
        $first_items = DB::table('items')->where('item_status', '1')->where('item_store_status', '1')->take(10)->get();
    
        return view('pages.welcome')
        ->with('last_items', $last_items)
        ->with('first_items', $first_items)
        ->with('addtocart_count', $addtocart_count)
        ->with('fav_count', $fav_count);
    }
}
