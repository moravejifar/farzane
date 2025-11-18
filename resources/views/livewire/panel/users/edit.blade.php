<div class="row">
    <div class="col-lg-8">
        <section class="panel">
            <header class="panel-heading">
                <div class="tab__box">
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="tab__box">
                                        <div class="tab__items">
                                            <a class="tab__item is-active" href="{{ route('panel') }}">پیشخوان</a>|
                                            <a class="tab__item is-active" href="{{ route('users') }}">همه کاربران</a>|
                                            <a class="tab__item" href="">ویرایش کاربر</a>
                                        </div>
                                    </div>

                                </header>
                                <div class="panel-body">
                                    <div class="form">
                                        <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="#">

                                            <div class="form-group ">
                                                <label for="id" class="control-label col-lg-2">شناسه کاربر</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="id" name="id" type="text" wire:model="data.id" />

                                                </div>
                                            </div>

                                            @error('data.id')
                                            <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                                            @enderror

                                            <div class="form-group ">
                                                <label for="firstname" class="control-label col-lg-2">نام</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="firstname" name="firstname" type="text" wire:model="data.name" />
                                                </div>
                                            </div>
                                            @error('data.name')
                                                <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                                            @enderror

                                            <div class="form-group ">
                                                <label for="lastname" class="control-label col-lg-2">نام خانوادگی</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="lastname" name="lastname" type="text" wire:model="data.lastname" />
                                                </div>
                                            </div>
                                            @error('data.lastname')
                                                <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                                            @enderror

                                            <div class="form-group ">
                                                <label class="control-label col-lg-2" for="inputSuccess">نقش کاربر</label>
                                                <div class="col-lg-10">
                                                    <select name="role" class="form-control m-bot15" wire:model="data.role" value="کاربر عادی">
                                                        <option selected="selected">کاربر عادی</option>
                                                        <option value="کاربر عادی">کاربر عادی</option>
                                                        <option value="مشتری">مشتری</option>
                                                        <option value="ادمین سایت">ادمین سایت</option>
                                                        <option value="نویسنده">نویسنده</option>
                                                        <option value="مدیریت سایت">مدیریت سایت</option>
                                                    </select>
                                                </div>
                                            </div>
                                            @error('data.role')
                                                <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                                            @enderror

                                            <div class="form-group ">
                                                <label for="gender" class="control-label col-lg-2">جنسیت</label>
                                                <div class="col-lg-10">

                                                    <div class="radio checkbox-inline ">
                                                        <label>
                                                            <input type="radio" name="gender" id="woman" value="1" wire:model="data.gender" />
                                                            زن

                                                        </label>
                                                    </div>
                                                    <span>
                                                        <div class="radio checkbox-inline">
                                                            <label>
                                                                <input type="radio" name="gender" id="man" value="0" wire:model="data.gender" />
                                                                مرد

                                                            </label>

                                                        </div>
                                                    </span>

                                                </div>

                                            </div>
                                            @error('data.gender')
                                            <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                                            @enderror

                                            <div class="form-group ">
                                                <label for="email" class="control-label col-lg-2">ایمیل</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="email" name="email" type="email" wire:model="data.email" />
                                                </div>
                                            </div>
                                            @error('data.email')
                                                <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                                            @enderror


                                            <div class="form-group">

                                                <label for="exampleInputFile" class="control-label col-lg-2" >دریافت تصویر</label>
                                                <input type="file" id="exampleInputFile3" style="padding-right: 18px;"  wire:model="user_image"  />

                                                {{-- If the uploaded value is a Livewire temporary upload show temporaryUrl(),
                                                     otherwise if there's an existing stored path show that. --}}
                                                @if (isset($user_image) && is_object($user_image) && method_exists($user_image, 'temporaryUrl'))
                                                    <img src="{{ $user_image->temporaryUrl() }}" class="img img-circle d-block mb-2" width="50" height="50">
                                                @elseif(isset($existing_image) && is_string($existing_image) && ! empty($existing_image))
                                                    <img src="{{ $existing_image }}" class="img img-circle d-block mb-2" width="50" height="50">
                                                @endif

                                            </div>
                                            @error('user_image')
                                                <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                                            @enderror

                                            <div class="form-group ">
                                                <label for="news" class="control-label col-lg-2 col-sm-3">دریافت خبرنامه</label>
                                                <div class="col-lg-10 col-sm-9">

                                                    <input type="checkbox" style="width: 20px" class="checkbox form-control" id="news"
                                                        name="news" wire:model="data.news" />
                                                </div>
                                            </div>
                                            @error('data.news')
                                                <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                                            @enderror

                                            <div class="form-group ">
                                                <label for="agree" class="control-label col-lg-2 col-sm-3">موافقت با قوانین</label>
                                                <div class="col-lg-10 col-sm-9">
                                                    <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree"
                                                        name="agree" wire:model="data.policy" />
                                                </div>
                                            </div>
                                            @error('data.policy')
                                                <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                                            @enderror

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-danger" name="signup" id="signup" type="button" wire:click="handleUpdate({{ $editUser->id }})">ویرایش کاربر</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </section>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>
