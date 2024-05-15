<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\add_to_cart;
use App\Models\order_tbl;
use App\Models\order_item_tbl;
use App\Models\favourite_tbl;
use DB;
use Auth;
use Hash;
use Mail;

class checkout_controller extends Controller
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


    public function create_order($data, $data2)
    {
        order_tbl::insert($data);
        order_item_tbl::insert($data2);
    }

    public function placeorder(Request $request)
    {
        $shipto = $request->shipto;
        $datetimesum = date('Y') + date('m') + date('d') + date('H') + date('i') + date('s');
        $datetime = date('Y-m-d H:i:s');
        $item_token = $datetimesum + rand(100,1000000);
        $find_order_no_last = order_tbl::select('order_no')->count();
        $value = $find_order_no_last + 1;
        $order_no = str_pad($value, 5, '0', STR_PAD_LEFT);
        $add_to_cart_items = DB::select('select * from add_to_carts where add_to_cart_status= 1 && item_add_user_id ='.Auth::user()->id);
        $item_total_price = add_to_cart::where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->sum(DB::raw('item_qty * item_price'));
      
        // add to cart items
        foreach ($add_to_cart_items as $key => $value) 
        {
            $data2[] = array(
                'item_token' => $item_token,
                'item_code' => $add_to_cart_items[$key]->item_code,
                'item_name' => $add_to_cart_items[$key]->item_name,
                'item_price' => $add_to_cart_items[$key]->item_price,
                'item_qty' => $add_to_cart_items[$key]->item_qty,
                'main_cate_code' => $add_to_cart_items[$key]->main_cate_code,
                'item_image' => $add_to_cart_items[$key]->item_image,
            );
        }

        // differnt ship address
        if ($shipto)
        {
            $data[] = array(
                'order_no' => $order_no,
                'item_token' => $item_token,
                'cust_name' => $request->fname_dif." ".$request->lname_dif,
                'email' => $request->email_dif,
                'mob_no' => $request->mob_no_dif,
                'address_type' => "Non_customer_address",
                'address' => $request->address_dif,
                'city' => $request->city_dif,
                'state' => $request->state_dif,
                'zip_code' => $request->zip_dif,
                'payment_type' => $request->payment,
                'order_status' => "Initiate",
                'order_date' => $datetime
            );
        }
        else
        {
            $data[] = array(
                'order_no' => $order_no,
                'item_token' => $item_token,
                'cust_name' => $request->fname." ".$request->lname,
                'email' => $request->email,
                'mob_no' => $request->mob_no,
                'address_type' => "customer_address",
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'payment_type' => $request->payment,
                'order_status' => "Initiate",
                'order_date' => $datetime
            );
        }

        // insert order
            $this->create_order($data, $data2);
            $qr_code = Hash::make($item_token);

            $email = $request->email;
            $data = array(
                'cust_name' => $request->fname." ".$request->lname,
            );
    
            Mail::send('Mail.payment_success_mail', $data,
            function($message)use($data, $email) {
            $message->to($email, 'ApeKama Online Store')
            ->from('apekama.online@gmail.com' , 'ApeKama Online Store')
            ->subject('ApeKama Online Store');
            });
    


        // update add to cart
            $update_add_to_cart = DB::update('update add_to_carts set add_to_cart_status = 0 where add_to_cart_status = 1 && item_add_user_id='.Auth::user()->id); 

        if ($request->payment == "Bitcoin") {
            return view('layout.payment_method.bitcoin')->with('customer_Name', $request->fname." ".$request->lname)->with('total_price', $item_total_price)->with('qr_code', $qr_code);
        }
        if ($request->payment == "Litecoin") {
            return view('layout.payment_method.Litecoin')->with('customer_Name', $request->fname." ".$request->lname)->with('total_price', $item_total_price)->with('qr_code', $qr_code);
        }
        if ($request->payment == "Online Payment") {
            return view('layout.payment_method.online_payment')->with('customer_Name', $request->fname." ".$request->lname)->with('total_price', $item_total_price);
        }
        else{
            return redirect('payment_success')->with('success', 'Thank you..! Your Order has been Proccessed.');
        }
    }

    public function placeorder_buy(Request $request)
    {

        $shipto = $request->shipto;
        $datetimesum = date('Y') + date('m') + date('d') + date('H') + date('i') + date('s');
        $datetime = date('Y-m-d H:i:s');
        $item_token = $datetimesum + rand(100,1000000);
        $find_order_no_last = order_tbl::select('order_no')->count();
        $value = $find_order_no_last + 1;
        $order_no = str_pad($value, 5, '0', STR_PAD_LEFT);
        $add_to_cart_items = DB::select('select * from add_to_carts where add_to_cart_status= 1 && item_add_user_id ='.Auth::user()->id);
        $item_total_price = add_to_cart::where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->sum(DB::raw('item_qty * item_price'));

        $id = $request->id;
        $item_name = $request->item_name;
        $item_code = $request->item_code;
        $item_price = $request->item_price;
        $item_qty = $request->item_qty;
        $main_cate_code = DB::table('items')->where('id', $id)->value('main_cate_code');
        $item_image = DB::table('items')->where('id', $id)->value('item_image');



        $data2[] = array(
            'item_token' => $item_token,
            'item_code' => $item_code,
            'item_name' => $item_name,
            'item_price' => $item_price,
            'item_qty' => $item_qty,
            'main_cate_code' => $main_cate_code,
            'item_image' => $item_image,
        );

        // differnt ship address
        if ($shipto)
        {
            $data[] = array(
                'order_no' => $order_no,
                'item_token' => $item_token,
                'cust_name' => $request->fname_dif." ".$request->lname_dif,
                'email' => $request->email_dif,
                'mob_no' => $request->mob_no_dif,
                'address_type' => "Non_customer_address",
                'address' => $request->address_dif,
                'city' => $request->city_dif,
                'state' => $request->state_dif,
                'zip_code' => $request->zip_dif,
                'payment_type' => $request->payment,
                'order_status' => "Initiate",
                'order_date' => $datetime
            );
        }
        else
        {
            $data[] = array(
                'order_no' => $order_no,
                'item_token' => $item_token,
                'cust_name' => $request->fname." ".$request->lname,
                'email' => $request->email,
                'mob_no' => $request->mob_no,
                'address_type' => "customer_address",
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
                'payment_type' => $request->payment,
                'order_status' => "Initiate",
                'order_date' => $datetime
            );
        }

        // insert order
        $this->create_order($data, $data2);
        $qr_code = Hash::make($item_token);

        $email = $request->email;
        $data = array(
            'cust_name' => $request->fname." ".$request->lname,
            'item_price' => $item_price,
        );
        
        Mail::send('Mail.payment_success_mail', $data,
        function($message)use($data, $email) {
        $message->to($email, 'ApeKama Online Store')
        ->from('apekama.online@gmail.com' , 'ApeKama Online Store')
        ->subject('ApeKama Online Store');
        });


        if ($request->payment == "Bitcoin") {
            return view('layout.payment_method.bitcoin')->with('customer_Name', $request->fname." ".$request->lname)->with('total_price', $item_total_price)->with('qr_code', $qr_code);
        }
        if ($request->payment == "Litecoin") {
            return view('layout.payment_method.Litecoin')->with('customer_Name', $request->fname." ".$request->lname)->with('total_price', $item_total_price)->with('qr_code', $qr_code);
        }
        if ($request->payment == "Online Payment") {
            return view('layout.payment_method.online_payment')->with('customer_Name', $request->fname." ".$request->lname)->with('total_price', $item_total_price);
        }
        else{
            return redirect('payment_success')->with('success', 'Thank you..! Your Order has been Proccessed.');
        }

    }

    public function payment_success()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();

        $addtocart = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->get();
        $total_price = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->sum(DB::raw('item_qty * item_price'));
        $total_qty = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->sum('item_qty');

      
        return view('layout.payment_success')
        ->with('addtocart_count', $addtocart_count)
        ->with('sub_total_price', $total_price)
        ->with('total_price', $total_price)
        ->with('fav_count', $fav_count)
        ->with('addtocart', $addtocart);
    }

    public function buynow(Request $request)
    {
        // dd($request->all());
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();
        $total_qty = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->sum('item_qty');

        $id = $request->id;
        $item_qty = $request->quntity;
        $item_price = $request->item_price;

        $total_price = $item_price * $item_qty;
        $item_name = $request->item_name;
        $item_price = $request->item_price;
        $item_code = $request->item_code;
        $item_qty = $request->quntity;

        return view('layout.checkout_buy')
        ->with('addtocart_count', $addtocart_count)
        ->with('fav_count', $fav_count)
        ->with('sub_total_price', $total_price)
        ->with('total_price', $total_price)
        ->with('item_name', $item_name)
        ->with('item_qty', $item_qty)
        ->with('item_code', $item_code)
        ->with('id', $id)
        ->with('item_price', $item_price);
    }


}
