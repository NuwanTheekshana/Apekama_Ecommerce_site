@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
       
            <table id="find_claims_tbl" class="table table-responsive-sm table-responsive-md table-responsive-lg table-hover table-outline mt-3">
                <thead>
                    <tr>
                        <th style="text-align: center">Customer Name</th>
                        <th style="text-align: center">Customer Email</th>
                        <th style="text-align: center">Subject</th>
                        <th style="text-align: center">Customer Message</th>
                        <th style="text-align: center">Status</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($find_job as $jobs)
                        <tr>
                            <td style="text-align: center">{{$jobs->customer_name}}</td>
                            <td style="text-align: center">{{$jobs->customer_email}}</td>
                            <td style="text-align: center">{{$jobs->subject}}</td>
                            <td style="text-align: center">{{$jobs->customer_message}}</td>
                            <td style="text-align: center">{{$jobs->status}}</td>
                            <td style="text-align: center">
                                <button class="btn btn-success"><i class="fa fa-check-circle"></i>&nbsp; Job Complete</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>
</div>
@endsection
