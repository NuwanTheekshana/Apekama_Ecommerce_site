<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_to_cart;
use App\Models\favourite_tbl;
use App\Models\customer_contact_info_tbl;
use DB;
use Auth;
use Mail;

class about_controller extends Controller
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


    public function contact()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();
        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();
        
        return view('about.contact')
        ->with('addtocart_count', $addtocart_count)
        ->with('fav_count', $fav_count)
        ->with('addtocart', $addtocart);
    }

    public function about_us()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();
        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();
        
        return view('about.about_us')
        ->with('addtocart_count', $addtocart_count)
        ->with('fav_count', $fav_count)
        ->with('addtocart', $addtocart);
    }

    public function privacy_policy()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();
        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();
        
        return view('about.privacy_policy')
        ->with('addtocart_count', $addtocart_count)
        ->with('fav_count', $fav_count)
        ->with('addtocart', $addtocart);
    }

    public function terms_conditions()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();
        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();
        
        return view('about.terms_conditions')
        ->with('addtocart_count', $addtocart_count)
        ->with('fav_count', $fav_count)
        ->with('addtocart', $addtocart);
    }

    public function payment_method()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();
        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();
        
        return view('about.payment_method')
        ->with('addtocart_count', $addtocart_count)
        ->with('fav_count', $fav_count)
        ->with('addtocart', $addtocart);
    }

    public function Shipping_Policy()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();
        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();
        
        return view('about.Shipping_Policy')
        ->with('addtocart_count', $addtocart_count)
        ->with('fav_count', $fav_count)
        ->with('addtocart', $addtocart);
    }

    public function customer_message_info(Request $request)
    {
        $cust_name = $request->cust_name;
        $cust_email = $request->cust_email;
        $cust_subject = $request->cust_subject;
        $cust_message = $request->cust_message;
        $user_id = Auth::user()->id;


        $data[] = array(
            'customer_id' => $user_id,
            'customer_name' => $cust_name,
            'customer_email' => $cust_email,
            'subject' => $cust_subject,
            'customer_message' => $cust_message,
        );

        customer_contact_info_tbl::insert($data);


        $data = array(
            'cust_name' => $cust_name,
        );

        Mail::send('Mail.contact_info', $data,
        function($message)use($data, $cust_email) {
        $message->to($cust_email, 'ApeKama Online Store')
        ->from('apekama.online@gmail.com' , 'ApeKama Online Store')
        ->subject('ApeKama Online Store');
        });


        return redirect()->back()->with('success', 'Your request successfully submited..!');

    }
}
