@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card  mt-5">
        <div class="card-header">Customer Contact info jobs</div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12">
               
                    <table id="find_claims_tbl" class="table table-responsive-sm table-responsive-md table-responsive-lg table-hover table-outline mt-3">
                        <thead>
                            <tr>
                                <th style="text-align: center">Customer Name</th>
                                <th style="text-align: center">Customer Comment</th>
                                <th style="text-align: center">Item Code</th>
                                <th style="text-align: center">Item Name</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($find_job as $jobs)
                                <tr>
                                    <td style="text-align: center">{{$jobs->customer_name}}</td>
                                    <td style="text-align: center">{{$jobs->customer_comment}}</td>
                                    <td style="text-align: center">{{$jobs->item_code}}</td>
                                    <td style="text-align: center">{{$jobs->item_name}}</td>
                                    <td style="text-align: center">{{$jobs->status}}</td>
                                    <td style="text-align: center">
                                       <a href="{{url('complete_cust_comment_job')}}/{{$jobs->id}}">
                                        <button class="btn btn-success"><i class="fa fa-check-circle"></i>&nbsp; Comment Accept</button>
                                    </a>
                                    <a href="{{url('reject_cust_comment_job')}}/{{$jobs->id}}">
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp; Comment Reject</button>
                                    </a>
                                    </td>
                                </tr>
                            @endforeach
        
                        </tbody>
                    </table>
        
        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
