@include('layout.app')
        

<div class="header">

    <div class="row">
<div class="mb-5 col-lg-12" style="display: inline-block; float: right;">


    <div class="row">
      
        <!-- Contact Start -->
        <div class="contact">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <h2>Our Office</h2>
                            <h3><i class="fa fa-map-marker"></i>No : 30, Kohuwala, Nugegoda</h3>
                            <h3><i class="fa fa-envelope"></i>apekama.online@gmail.com</h3>
                            <h3><i class="fa fa-phone"></i>011-245-6789</h3>
                            <div class="social">
                                <a href="https://www.facebook.com/Code-Defenders-101850151743086/?ref=pages_you_manage"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info">
                            <h2>Our Store</h2>
                            <h3><i class="fa fa-map-marker"></i>No : 250, Kohuwala, Nugegoda</h3>
                            <h3><i class="fa fa-envelope"></i>apekama.online@gmail.com</h3>
                            <h3><i class="fa fa-phone"></i>011-245-6789</h3>
                            <div class="social">
                                <a href="https://www.facebook.com/Code-Defenders-101850151743086/?ref=pages_you_manage"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-form">
                            <form action="{{route('customer_message_info')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="cust_name" placeholder="Your Name" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="cust_email" placeholder="Your Email" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cust_subject" placeholder="Subject" required/>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" name="cust_message" placeholder="Message" required></textarea>
                                </div>

                                @if(session('success'))
                                   
                                    <p class="mt-2" id="success" style="color: green"><b><i class="fa fa-info-circle"></i> {{session('success')}}</b></p>
                                @endif
                                

                                <div><button class="btn" type="submit">Send Message</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="contact-map">
                            <iframe src="https://www.google.com/maps/d/embed?mid=1vU-AB3pgT47EYuBXL2r91XEI255pn9UZ" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->




     </div>
        

  
    
    
</div>

        </div>
    </div>
</div>


@include('layout.footer')