<div class="row">
    <div class="col-lg-10">
        <section class="panel">
            <header class="panel-heading">
                <div class="tab__box">
                    <div class="tab__items">
                        <a class="tab__item is-active" href="{{ route('panel') }}">پیشخوان</a>|
                        <a class="tab__item is-active" href="{{ route('users') }}">همه کاربران</a>|
                        <a class="tab__item" href="{{ route('create') }}">افزودن کاربر جدید</a>
                    </div>
                </div>

            </header>
            <div class="panel-body">
                <div class="form">
                    <form class="cmxform form-horizontal tasi-form" id="signupForm" method="get" action="#">

                        <div class="form-group ">
                            <label for="firstname" class="control-label col-lg-2">نام</label>
                            <div class="col-lg-10">
                                <input class=" form-control" id="firstname" name="firstname" type="text"
                                    wire:model="data.name" />
                            </div>
                            @error('data.name')
                                <small class="d-block text-danger w-100 text-right col-lg-2">{{ $message }} </small>
                            @enderror
                        </div>


                        <div class="form-group ">
                            <label for="lastname" class="control-label col-lg-2">نام خانوادگی</label>
                            <div class="col-lg-10">
                                <input class=" form-control" id="lastname" name="lastname" type="text"
                                    wire:model="data.lastname" />
                            </div>
                            @error('data.lastname')
                                <small class="d-block text-danger w-100 text-right col-lg-2">{{ $message }} </small>
                            @enderror
                        </div>


                        <div class="form-group ">
                            <label class="control-label col-lg-2" for="inputSuccess">نقش کاربر</label>
                            <div class="col-lg-10">
                                <select name="role" class="form-control m-bot15" wire:model="data.role"
                                    value="کاربر عادی">
                                    <option value="کاربر عادی">
                                        کاربر عادی</option>
                                    <option value="مشتری">
                                        مشتری</option>
                                    <option value="ادمین سایت">
                                        ادمین سایت</option>
                                    <option value="نویسنده">
                                        نویسنده</option>
                                    <option value="مدیریت سایت">
                                        مدیریت سایت </option>

                                </select>
                            </div>
                            @error('data.role')
                                <small class="d-block text-danger w-100 text-right col-lg-2">{{ $message }} </small>
                            @enderror
                        </div>


                        <div class="form-group ">
                            <label for="gender" class="control-label col-lg-2">جنسیت</label>
                            <div class="col-lg-10">

                                <div class="radio checkbox-inline ">
                                    <label>
                                        <input type="radio" name="gender" id="woman" value="1"
                                            wire:model="data.gender">
                                        زن

                                    </label>
                                </div>
                                <span>
                                    <div class="radio checkbox-inline">
                                        <label>
                                            <input type="radio" name="gender" id="man" value="0"
                                                wire:model="data.gender">
                                            مرد

                                        </label>
                                    </div>
                                </span>

                            </div>
                            @error('data.gender')
                                <small class="d-block text-danger w-100 text-right col-lg-2">{{ $message }} </small>
                            @enderror
                        </div>


                        <div class="form-group ">
                            <label for="password" class="control-label col-lg-2">پسورد</label>
                            <div class="col-lg-10">
                                <input class="form-control" id="password" name="password" type="password"
                                    wire:model="data.password" />
                            </div>
                            @error('data.password')
                                <small class="d-block text-danger w-100 text-right col-lg-2">{{ $message }} </small>
                            @enderror
                        </div>


                        <div class="form-group ">
                            <label for="password_confirmation" class="control-label col-lg-2">تایید پسورد</label>
                            <div class="col-lg-10">
                                <input class="form-control " id="password_confirmation" name="password_confirmation"
                                    type="password" wire:model="data.password_confirmation" />
                            </div>
                            @error('data.password_confirmation')
                                <small class="d-block text-danger w-100 text-right col-lg-5 ">{{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label for="email" class="control-label col-lg-2">ایمیل</label>
                            <div class="col-lg-10">
                                <input class="form-control " id="email" name="email" type="email"
                                    wire:model="data.email" />
                            </div>
                            @error('data.email')
                                <small class="d-block text-danger w-100 text-right col-lg-2 ">{{ $message }} </small>
                            @enderror
                        </div>

                        {{-- <style>
                            /* متغیرهای اندازه برای دکمه‌ها و کادر (برای هماهنگی آسان) */
                            :root {
                                --uploader-btn-min-height: 36px;
                                --uploader-btn-min-width: 120px;
                                --meta-box-min-height: 72px;
                            }

                            /* 1. استایل کادر اصلی (uploader-row) */
                            .uploader-row {
                                display: flex;
                                align-items: center;
                                /* هم‌ترازی عمودی آیتم‌ها در وسط ردیف */
                                gap: 14px;
                                border: 1px solid #dcdcdc;
                                border-radius: 8px;
                                padding: 15px;
                                background-color: #fcfcfc;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.04);
                                flex-wrap: wrap;
                                /* اگر فضا کم است، آیتم‌ها به خط بعدی می‌روند */
                                direction: rtl;
                                /* تنظیم جهت RTL برای کل کانتینر */
                            }

                            /* 2. پیش نمایش آواتار */
                            .avatar-preview {
                                width: 72px;
                                height: 72px;
                                border-radius: 50%;
                                overflow: hidden;
                                background: #f7f7f7;
                                border: 1px solid #e6e6e6;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                flex-shrink: 0;
                                /* آواتار نباید کوچک شود */
                                flex-basis: 72px;
                                /* تعریف صریح عرض */
                            }

                            .avatar-preview img {
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                                display: block;
                            }

                            /* 3. uploader-actions: والد دکمه‌ها و کادر اطلاعات. */
                            .uploader-actions {
                                display: flex !important;
                                flex-direction: row;
                                align-items: flex-start !important;
                                /* دکمه‌ها و کادر اطلاعات از بالا شروع می‌شوند */
                                gap: 12px;
                                flex-wrap: wrap;

                                /* 👇 مهمترین تغییر برای قرارگیری در کنار آواتار: */
                                flex: 1 1 500px !important;
                                /* اجازه رشد کامل (1)، جلوگیری از کوچک شدن (1)، و پایه 500px که اگر عرض والد کم باشد به 500px هم می‌رسد */
                                /* این به آن اجازه می‌دهد تمام فضای باقی‌مانده را پر کند (1) و آواتار را به خط بعدی نیندازد */

                                direction: rtl;
                                /* جهت‌دهی صحیح */
                                text-align: right;
                            }

                            /* 4. ستون دکمه‌ها: برای چینش عمودی انتخاب و حذف */
                            .uploader-buttons-column {
                                display: flex !important;
                                flex-direction: column !important;
                                align-items: center;
                                gap: 6px;
                                flex-shrink: 0;
                                /* دکمه‌ها ثابت بمانند */
                                flex-basis: var(--uploader-btn-min-width);
                                /* تعریف صریح عرض برای دکمه‌ها */
                            }

                            /* 5. استایل meta-box: کادر اطلاعات */
                            .meta-box {
                                border: 1px solid #dcdcdc;
                                padding: 8px 10px;
                                border-radius: 6px;
                                background: #fff;
                                min-height: var(--meta-box-min-height);
                                display: flex;
                                flex-direction: column;
                                align-items: flex-start;
                                justify-content: center;
                                gap: 4px;

                                /* 👇 تضمین گسترش کادر اطلاعات در فضای باقی‌مانده: */
                                flex: 1 1 300px !important;
                                /* رشد 1: تمام فضای باقی‌مانده از دکمه‌ها را پر کند.
                                 پایه 300px: در صورت کمبود فضا حداقل 300px را داشته باشد. */
                                min-width: 300px !important;
                            }

                            /* 6 و 7. استایل دکمه‌ها (بدون تغییر عمده) */
                            .uploader-actions .btn-file {
                                display: inline-flex;
                                align-items: center;
                                gap: 6px;
                                padding: 5px 10px;
                                border-radius: 6px;
                                background: #6a9ace;
                                color: #fff;
                                cursor: pointer;
                                font-size: 13px;
                                border: none;
                                min-height: var(--uploader-btn-min-height);
                                min-width: var(--uploader-btn-min-width);
                            }

                            .uploader-remove {
                                display: flex;
                                align-items: center;
                                gap: 4px;
                                padding: 5px 10px;
                                border-radius: 6px;
                                background: #e45d6b;
                                color: #fff;
                                border: none;
                                cursor: pointer;
                                min-width: var(--uploader-btn-min-width);
                            }

                            /* 8. استایل‌های جزئی */
                            .uploader-remove:hover {
                                background: #d9534f;
                            }

                            .uploader-meta {
                                font-size: 12px;
                                color: #6c757d;
                                margin: 0;
                                /* max-width را حذف یا افزایش دادم تا مانع گسترش meta-box نشود. */
                                overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap
                            }

                            .uploader-remove svg {
                                width: 14px;
                                height: 14px;
                                display: block
                            }
                        </style> --}}

                        <div class="form-group">
                            <label for="exampleInputFile" class="control-label col-lg-2">دریافت تصویر</label>
                            <div class="col-lg-10">
                                <div class="uploader-row">
                                    <div class="avatar-preview" aria-hidden="true">
                                        @if (isset($user_image) && is_object($user_image) && method_exists($user_image, 'temporaryUrl'))
                                            <img src="{{ $user_image->temporaryUrl() }}" alt="پیش‌نمایش تصویر">
                                        @else
                                            <img src="/storage/images/user_image/1.jpg" alt="تصویر پیش‌فرض">
                                        @endif
                                    </div>

                                    <div class="uploader-actions">

                                        <div class="uploader-buttons-column">

                                            <label class="btn-file" for="user_image_input">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    style="vertical-align:middle;margin-left:6px">
                                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                    <polyline points="7 10 12 5 17 10"></polyline>
                                                    <line x1="12" y1="5" x2="12"
                                                        y2="19"></line>
                                                </svg>
                                                انتخاب تصویر
                                            </label>
                                            <input id="user_image_input" type="file" wire:model="user_image"
                                                accept="image/*" style="display:none">

                                            <button type="button" class="uploader-remove"
                                                onclick="if(confirm('آیا از حذف تصویر مطمئن هستید؟')) { @this.set('user_image', null) }"
                                                title="حذف تصویر">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" width="14"
                                                    height="14">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"></path>
                                                    <path d="M10 11v6"></path>
                                                    <path d="M14 11v6"></path>
                                                </svg>
                                                حذف
                                            </button>
                                        </div>

                                        <div class="meta-box">
                                            @php
                                                $previewName = null;
                                                $previewPath = null;

                                                // logic remains the same
                                                if (
                                                    isset($user_image) &&
                                                    is_object($user_image) &&
                                                    method_exists($user_image, 'getClientOriginalName')
                                                ) {
                                                    $previewName = $user_image->getClientOriginalName();
                                                    $previewPath = '(موقتی)';
                                                } elseif (isset($user_image) && $user_image) {
                                                    $previewName = 'فایل انتخاب‌شده';
                                                    $previewPath = '(موقتی)';
                                                } else {
                                                    $previewName = 'تصویر پیش‌فرض';
                                                    $previewPath = '/storage/images/user_image/1.jpg';
                                                }
                                            @endphp

                                            <div style="font-size:13px;font-weight:600;">نام:
                                                <span style="font-weight:400;">{{ $previewName }}</span>
                                            </div>
                                            <div style="font-size:12px;color:#6c757d;margin-top:4px;">آدرس:
                                                <span style="color:#495057;">{{ $previewPath }}</span>
                                            </div>

                                            <div wire:loading wire:target="user_image" class="uploader-meta text-info"
                                                style="margin-top:4px;">
                                                در حال آپلود...
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @error('user_image')
                                <small class="d-block text-danger w-100 text-right col-lg-2">{{ $message }} </small>
                            @enderror
                        </div>


                        <div class="form-group ">
                            <label for="news" class="control-label col-lg-2 col-sm-3">دریافت خبرنامه</label>
                            <div class="col-lg-10 col-sm-9">
                                <input type="checkbox" style="width: 20px" class="checkbox form-control"
                                    id="news" name="news" wire:model="data.news" />
                            </div>
                            @error('data.news')
                                <small class="d-block text-danger w-100 text-right clo-lg-2">{{ $message }} </small>
                            @enderror
                        </div>


                        <div class="form-group ">
                            <label for="agree" class="control-label col-lg-2 col-sm-3">موافقت با قوانین</label>
                            <div class="col-lg-10 col-sm-9">
                                <input type="checkbox" style="width: 20px" class="checkbox form-control"
                                    id="agree" name="agree" wire:model="data.policy" />
                            </div>
                            @error('data.policy')
                                <small class="d-block text-danger w-100 text-right col-lg-2">{{ $message }} </small>
                            @enderror
                        </div>



                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-danger" name="signup" id="signup" type="button"
                                    wire:click="Created">ذخیره</button>
                                <button class="btn btn-danger" name="signup" id="signup" type="button"
                                    wire:click="newuser">کاربر جدید</button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </section>
    </div>
</div>
