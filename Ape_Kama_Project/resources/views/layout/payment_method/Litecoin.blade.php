@include('layouts.payment_app')

<center>
    <img src="{{asset('img/bitcoin/litecoin.jpg')}}" style="width: 10%;height: 10%;">
    <br>

    <img src="{{asset('img/bitcoin/qr.png')}}" style="width: 10%;height: 10%;">
<br>

</center>


<div class="row justify-content-center">
    <div class="col-3">
        <input type="text" id="bit_link" value="{{$qr_code}}" class="form-control form-control-sm">
    </div>
        <button class="btn btn-secondary btn-sm" id="copy"><i class="fa fa-copy"></i></button>
       
</div>


<center>
   <a href="{{route('payment_success')}}">
    <button class="btn btn-warning mt-5" style="background-color: orange"><i class="fa fa-bitcoin"></i> Pay wallet</button>
   </a>
</center>



<script>
    $('#copy').click(function () 
    {
        var link = $('#bit_link');
        link.select();
        document.execCommand("copy");
        alert("Copied..!");
    });
</script>