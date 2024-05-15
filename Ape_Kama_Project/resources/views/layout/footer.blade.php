<!-- Footer Start -->
<div class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h2>Get in Touch</h2>
                    <div class="contact-info">
                        <p><i class="fa fa-map-marker"></i>No : 30, Kohuwala, Nugegoda</p>
                        <p><i class="fa fa-envelope"></i>apekama@gmail.com</p>
                        <p><i class="fa fa-phone"></i>011-245-6789</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h2>Follow Us</h2>
                    <div class="contact-info">
                        <div class="social">
                            <a href="https://www.facebook.com/Code-Defenders-101850151743086/?ref=pages_you_manage"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h2>Company Info</h2>
                    <ul>
                        <li><a href="{{url('/about_us')}}">About Us</a></li>
                        <li><a href="{{url('/privacy_policy')}}">Privacy Policy</a></li>
                        <li><a href="{{url('/terms_conditions')}}">Terms & Condition</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h2>Purchase Info</h2>
                    <ul>
                        <li><a href="{{url('/payment_method')}}">Pyament Policy</a></li>
                        <li><a href="{{url('/Shipping_Policy')}}">Shipping Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
 
    </div>
</div>
<!-- Footer End -->

<!-- Footer Bottom Start -->

<!-- Footer Bottom End -->      
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up" style="color: #857327;"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>

        @guest

        <script>
            $('#add_to_card_btn').click(function () 
            {
                window.location = "{{url('/login')}}"
            });
        </script>
        
        @else
        
        
        <script>
            function add_to_card_btn(id) 
            {
                $.ajax({
                type:'post',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                url:'{{url("/addtocart")}}',
                data:{id:id},
                success:function(data){
                    console.log(data.itm_count);
                    if (data.error_qty) 
                    {
                        alert(data.error_qty);
        
                        return false;
                    }
                    else
                    {
                        var x = "("+data.itm_count+")";
                        $('#itm_count').text(x);
                    }
        
                }
                });
            }


            function add_to_card_btn_fav(id) 
            {
                $.ajax({
                type:'post',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                url:'{{url("/addtocart_fav")}}',
                data:{id:id},
                success:function(data){
                    console.log(data.itm_count);
                    if (data.error_qty) 
                    {
                        alert(data.error_qty);
        
                        return false;
                    }
                    else
                    {
                        var x = "("+data.itm_count+")";
                        var y = "("+data.fav_count+")";
                        $('#itm_count').text(x);
                        $('#fav_count').text(y);
                        $("#itm_fav_tbl_div").load(location.href+" #itm_fav_tbl_div>*","");
                    }
        
                }
                });
            }
           
        </script>

<script>
    function favorite(id) {
        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            url:'{{url('favorite_add')}}',
            data:{id:id},
            success:function(data){
                var x = "("+data.fav_count+")";
                console.log(x);
                $('#fav_count').text(x);
            }
        });
    }
</script>

        
        <script>
            function fav_remove(id) {
            $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            url:'{{url('favorite_remove')}}',
            data:{id:id},
            success:function(data){
                var x = "("+data.fav_count+")";
                console.log(x);
                $('#fav_count').text(x);
                $("#itm_fav_tbl_div").load(location.href+" #itm_fav_tbl_div>*","");
            }
        });
            }
        </script>
        
        
        @endguest
    </body>


    <script src="{{asset('js/easing.min.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</html>
