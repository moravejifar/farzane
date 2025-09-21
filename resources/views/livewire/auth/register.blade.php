<x-slot name="title">
    - ثبت نام
  </x-slot>


 <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">فرم ثبت نام</h2>
                        {{-- <form method="POST" class="register-form" id="register-form"> --}}
                        <form  class="register-form" id="register-form">

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="نام" wire:model="data.name"/>
                            </div>
                            @error('data.name')
                            <small class="d-block text-danger w-100 text-center">{{$message}} </small>
                           @enderror

                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="ایمیل" wire:model="data.email" />
                            </div>
                            @error('data.email')
                                <small class="d-block text-danger w-100 text-center">{{$message}} </small>
                            @enderror

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="کلمه ی عبور" wire:model="data.password" />
                            </div>
                            @error('data.password')
                            <small class="d-block text-danger w-100 text-center">{{$message}} </small>
                            @enderror

                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="تکرار کلمه ی عبور" wire:model="data.password_confirmation" />
                            </div>
                            @error('data.password_confirmation')
                            <small class="d-block text-danger w-100 text-center">{{$message}} </small>
                            @enderror

                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" wire:model="data.policy"/>
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>قوانین را مطالعه کرده ام.
                                    <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            @error('data.policy')
                            <small class="d-block text-danger w-100 text-center">{{$message}} </small>
                            @enderror
                            {{-- <div class="form-group form-button"> --}}
                            <div class="form-group">
                                <input type="button" name="signup" id="signup" class="form-submit" value="ثبت نام" wire:click="handleRegister"/>
                                {{-- <button type="button"  class="btn btn-success rounded_5 shadow-sm"  wire:click="handleRegister"/> ثبت نام </button> --}}
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{asset('Auth/images/signup-image.jpg')}}" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">من عضو هستم. </a>
                    </div>
                </div>
            </div>
        </section>

</div>
