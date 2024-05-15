<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class contract_info_controller extends Controller
{
    public function contact_info_jobs()
    {
        $find_jobs = DB::table('customer_contact_info_tbls')
                    ->where('remove_status', '0')
                    ->where('status', 'Pending')
                    ->get();

        return view('jobs.contact_info_jobs')->with('find_job', $find_jobs);
    }

    public function complere_job($id)
    {
        DB::update('update customer_contact_info_tbls set status = "Complete" where id = ?', [$id]);

        return redirect()->back()->with('success', 'Job complete successfully..!');
    }

    public function item_comments_job()
    {
        $find_jobs = DB::table('customer_item_comment_tbls')
                     ->select('customer_item_comment_tbls.id as comment_id', 'customer_item_comment_tbls.*', 'items.*')
                     ->join('items', 'items.id', '=', 'customer_item_comment_tbls.id')
                     ->where('remove_status', '0')
                     ->where('status', 'Pending')
                     ->get();


        return view('jobs.contact_info_jobs')->with('find_job', $find_jobs);
    }

    public function reject_cust_comment_job($id)
    {
        DB::update('update customer_item_comment_tbls set status = "Reject" where id = ?', [$id]);
        return redirect()->back()->with('success', 'Job reject successfully..!');
    }

    public function complete_cust_comment_job($id)
    {
        DB::update('update customer_item_comment_tbls set status = "Complete" where id = ?', [$id]);
        return redirect()->back()->with('success', 'Job complete successfully..!');
    }
}
