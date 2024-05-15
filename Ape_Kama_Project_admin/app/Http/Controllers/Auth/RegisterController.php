<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:50'],
            'lname' => ['required', 'string', 'max:50'],
            'nic' => ['required', 'string', 'max:13', 'unique:users'],
            'cust_type' => ['required'],
            'DOB' => ['required'],
            'mobile_no' => ['required', 'numeric', 'min:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'addr_line1' => ['required', 'string', 'max:50'],
            'addr_line2' => ['string', 'max:50'],
            'city' => ['required', 'string', 'max:50'],
            'str_province_regi' => ['required', 'string', 'max:50'],
            'zip_code' => ['required', 'string', 'max:50'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $fullname = $data['fname']." ".$data['lname'];
        $addr_line2 = $data['addr_line2'];

        if ($addr_line2 == null) 
        {
            $addr_line2 = "";
        }

        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'fullname' => $fullname,
            'nic' => $data['nic'],
            'cust_type' => $data['cust_type'],
            'DOB' => $data['DOB'],
            'mobile_no' => $data['mobile_no'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address1' => $data['addr_line1'],
            'address2' => $addr_line2,
            'city' => $data['city'],
            'state' => $data['str_province_regi'],
            'zip_code' => $data['zip_code'],
        ]);
    }
}
