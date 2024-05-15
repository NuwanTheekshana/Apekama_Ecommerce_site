<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class user_controller extends Controller
{
    public function find_users()
    {
        $user_data = User::where('cust_status', '1')->get();
        return view('users.find_user')->with('user_data', $user_data);
    }

    public function update_user(Request $request)
    {
        // request data
        $id = $request->user_id;
        $f_name = $request->f_name;
        $l_name = $request->l_name;
        $full_name = $f_name." ".$l_name;
        $email = $request->email;
        $con_num = $request->con_num;
        $dob = $request->dob;
        $address1 = $request->address1;
        $address2 = $request->address2;
        $city = $request->city;
        $state = $request->state;
        $zip_code = $request->zip_code;
        $user_permission = $request->user_permission;

        // data validation 

        $this->validate($request, [
            'f_name' => 'required|string|max:30',
            'l_name' => 'required|string|max:30',
            'email' => 'required|email',
            'con_num' => 'required|numeric',
            'dob' => 'required',
            'address1' => 'required|string|max:30',
            'address2' => 'required|string|max:30',
            'city' => 'required|string|max:30',
            'state' => 'required|string|max:30',
            'zip_code' => 'required',
            'user_permission' => 'required|string|max:30',
        ]);


        // check duplicate emails 
        $find_user_email_count = User::where('id', $id)->value('email');

        if ($find_user_email_count != $email) {
            $this->validate($request, [
                'email' => 'required|string|unique:users',
            ]);
        }

        // update user details 

        $update_user = User::find($id);
        $update_user->fname = $f_name;
        $update_user->lname = $l_name;
        $update_user->fullname = $full_name;
        $update_user->email = $email;
        $update_user->mobile_no = $con_num;
        $update_user->DOB = $dob;
        $update_user->address1 = $address1;
        $update_user->address2 = $address2;
        $update_user->city = $city;
        $update_user->state = $state;
        $update_user->zip_code = $zip_code;
        $update_user->cust_type = $user_permission;
        $update_user->update();

        return redirect()->back()->with('success', 'User details update successfully..!');


    }

    public function change_password(Request $request)
    {
        // request data
        $id = $request->pass_user_id;
        $password = $request->password;
        $new_pass = $request->new_pass;
        $confirm_pass = $request->confirm_pass;

        // validation
        $errors=[ 
            'password.required'=> 'Current password is Required.',
            'new_pass.required'=> 'New Password is Required.',
            'confirm_pass.required'=> 'Confirm Password is Required.',
            ];

        $this->validate($request, [
        'password' => 'required',
        'new_pass' => 'required',
        'confirm_pass' => 'required',
        ],$errors);


        // attempt validation
        if (Auth::attempt(['id' => $id, 'password' => $password]))
        {}
        else
        {
            return response()->json(['errors'=>'Current password invalid..!', 'password' => $id]);
        }

        if ($new_pass != $confirm_pass) 
        {
            return response()->json(['errors'=>'Two Password Combination..!']);
        }

        // update password
        $password = Hash::make($new_pass);
        $find_user = User::find($id);
        $find_user->password = $password;
        $find_user->update();
        

        return redirect()->back()->with('success', 'Password change successfully..!');

    }

    public function userremove(Request $request)
    {
        $id = $request->user_id;

        $find_user = User::find($id);
        $find_user->remove_status = 1;
        $find_user->update();

        return redirect()->back()->with('success', 'User removed successfully..!');
    }
}
