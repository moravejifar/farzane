<x-slot name="title">
    - لاگین
</x-slot>


<div class="main">
   <!-- Sing in  Form -->
   <section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{asset('Auth/images/signin-image.jpg')}}" alt="sing up image"></figure>
                <a href="#" class="signup-image-link">ورود</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">فرم ورود</h2>
                <form method="POST" class="register-form" id="login-form">
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="your_name" id="your_name" placeholder="ایمیل" wire:model="data.email"/>
                    </div>
                    @error('data.email')
                    <small class="text-center d-block text-danger ">{{$message}}</small>
                   @enderror
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="your_pass" id="your_pass" placeholder="کلمه عبور" wire:model="data.password"/>
                    </div>
                    @error('data.password')
                    <small class="text-center d-block text-danger ">{{$message}}</small>
                    @enderror
                    <div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" wire:model="data.remember"/>
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>مرا به خاطر بسپار</label>
                    </div>
                    {{-- @error('data.remember')
                    <small class="text-center d-block text-danger ">{{$message}}</small>
                   @enderror --}}
                   {{-- <div class="form-group row justify-content-center">
                    <button class="btn btn-success rounded_5 px-5 shadow-sm" type="button" wire:click="login">ورود</button>
                  </div> --}}
                  <div class="form-group">
                    <input type="button" name="signup" id="signup" class="form-submit" value="ورود" wire:click="login"/>
                </div>
                    {{-- <div class="form-group form-button"> --}}
                        {{-- <input type="button" name="signin" id="signin" class="form-submit" value="ورود" wire:click="login"/> --}}
                    {{-- </div> --}}
                </form>
                <div class="social-login">
                    <span class="social-label">یا ورود با </span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
