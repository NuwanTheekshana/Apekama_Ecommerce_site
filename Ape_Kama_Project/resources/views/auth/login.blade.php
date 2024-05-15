@include('layout.app')



<!-- Main Slider --> 
@include('layout.mainSlide')
<!-- Main Slider End -->

<div class="col-lg-8 mb-5" style="background-color: #ffff">
    <div class="login-form ml-3 mr-3">
        
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row mt-5">
            <div class="col-6">
                <label>E-mail</label>
                <input class="form-control" type="text" name="email" placeholder="Email">
            </div>
            <div class="col-6">
                <label>Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="col-12">
                @error('email')
                <p class="mt-2" id="error" style="color: red;font-weight: bold;"><i class="fa fa-info-circle"></i>&nbsp; {{$message}}</p>
                @enderror
                @error('password')
                <p class="mt-2" id="error" style="color: red;font-weight: bold;"><i class="fa fa-info-circle"></i>&nbsp;{{$message}}</p>
                @enderror
            </div>
            <div class="col-md-12">
                <button class="btn" type="submit">Login</button>
            </div>

            
        </div>
    </form>
    </div>
</div>



        </div>
    </div>
</div>


@include('layout.footer')