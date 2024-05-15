@include('layout.app')
        

<div class="header">

    <div class="row">
<div class="mb-5 col-lg-12" style="display: inline-block; float: right;">


    <div class="row">
        <div class="col d-flex justify-content-center">
           <div class="card card-block" style="background-color: transparent;border-color: transparent">
                <div class="card-body">
                        <h1 style="font-weight: bold;text-transform: uppercase;">
                            Your order has been received
                            <br>
                            Thank you for your purchase.!
                        </h1>

                       <center>
                        <a href="{{url('/')}}" class="btn">Go to Home</a>
                       </center>
                </div>
           </div>
        </div>
        
     </div>
        

  
    
    
</div>

        </div>
    </div>
</div>


@include('layout.footer')