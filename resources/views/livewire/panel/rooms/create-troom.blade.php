<div class="col-sm-4 ">

    <section class="panel">
        <header class="panel-heading">
            ایجاد دسته بندی جدید

        </header>
        <div class="panel-body">
            <form class="form-horizontal" role="form" onsubmit="return false">
                <div class="form-group col-lg-12">
                    <label class="col-lg-7" for="room_name">نوع اتاق</label>
                    <input class="form-control" id="roomtype" name="roomtype" type="text" size="3px"
                        value=" نوع اتاق" wire:model="data.room_name" />
                    {{-- {{$data['room_name']}} --}}
                </div>
                @error('data.room_name')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror

                <div class="form-group col-lg-12">
                    <label class="col-lg-10 ">تعداد مهمان</label>
                    <select value="1" name="max_quest" class="form-control" wire:model="data.max_quest"
                        value="">
                        <option selected="selected">select</option>
                        {{-- <option value="1">1</option> --}}
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </div>
                @error('data.max_quest')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror




                <div class="form-group col-lg-12 ">
                    <label class="col-lg-10 ">تعداد تخت</label>
                    <select name="room_size" class="form-control " wire:model="data.room_size" value="">
                        <option selected="selected">select</option>
                        {{-- <option value="1">1</option> --}}
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </div>
                @error('data.room_size')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror

                <div class="form-group col-lg-12">
                    <label class="col-lg-8" for="price">قیمت اتاق</label>
                    <input class=" form-control" id="price" name="price" type="text" size="3px"
                        value="قیمت اتاق" wire:model="data.room_priceusd" />
                </div>
                @error('data.room_priceusd')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror

                <div class="form-group col-lg-12">
                    <label class="control-label col-lg-8 " for="altimage">کپشن تصویر</label>
                    <input class="form-control" id="altimage" name="altimage" type="text" value="کپشن تصویر"
                        wire:model="data.alt_image" />
                </div>
                {{-- @error('data.alt_image')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                    @enderror --}}

                {{-- <div class="form-group col-lg-12">
                        <label for="exampleInputFile" class="control-label col-lg-8">دریافت تصویر</label>
                        <input type="file" id="exampleInputFile3" style="padding-right: 5px;" wire:model="room_image">
                    </div> --}}

{{-- <style>
    /* متغیر برای همسان‌سازی ارتفاع اصلی */
    :root {
        --main-height: 45px;
        --gap-small: 3px;
    }

    /* کانتینر کلی فرم آپلود */
    .room-image-uploader {
        width: 100% !important;
        margin-top: 12px;
        box-sizing: border-box;
    }

    /* پوشش‌دهنده محتوا */
    .uploader-content-wrapper {
        width: 100%;
    }

    /* ردیف آپلودر */
    .room-image-uploader .uploader-row {
        display: flex;
        align-items: center; /* این حفظ می‌شود تا آیتم‌ها در مرکز عمودی باشند */
        gap: 6px;
        padding: 4px 5px;
        border: 1px solid #ddd;
        border-radius: 6px;
        background-color: #fafafa;
        box-sizing: border-box;
        flex-wrap: nowrap !important;
        direction: rtl;
        width: 100% !important;
        flex: 0 0 auto;
        min-width: 0;
    }

    /* تصویر پیش‌نمایش (بدون تغییر) */
    .room-image-uploader .avatar-preview {
        width: var(--main-height); height: var(--main-height); flex-shrink: 0;
        border-radius: 6px; border: 1px solid #ccc; background: #fff;
        display: flex; align-items: center; justify-content: center; overflow: hidden;
    }
    .room-image-uploader .avatar-preview img {
        width: 100%; height: 100%; object-fit: cover;
    }

    /* 👇 بخش دکمه‌ها و meta-box (والد) */
    .room-image-uploader .uploader-actions {
        display: flex;
        align-items: center;
        /* 👇 تغییر: فاصله را کم می‌کنیم و دکمه‌ها را فشرده نگه می‌داریم */
        gap: 3px;
        flex-wrap: nowrap;
        flex: 1 1 100% !important;
        min-width: 0;
    }

    /* 👇 ستون دکمه‌ها سمت راست: جلوگیری از کشیده شدن دکمه‌ها */
    .room-image-uploader .uploader-buttons-column {
        display: flex;
        flex-direction: column;
        gap: var(--gap-small);
        /* 👇 تغییر کلیدی: جلوگیری از رشد و حفظ اندازه اصلی */
        flex: 0 0 auto;
        flex-shrink: 0;
        min-height: var(--main-height);
        justify-content: center;
    }

    /* دکمه‌ها: تضمین عرض ثابت */
    .room-image-uploader .btn-file,
    .room-image-uploader .uploader-remove {
        font-size: 10px; padding: 12px 3px;
        min-width: 60px; /* حداقل عرض حفظ می‌شود */
        width: 100%; /* دکمه‌ها عرض والد خود را پر می‌کنند */
        height: 25px;
        border-radius: 4px; border: none; color: #fff; cursor: pointer;
        display: inline-flex; align-items: center; justify-content: center;
        flex-grow: 0; /* دکمه‌ها نباید رشد کنند */
    }
    /* ... استایل‌های رنگی دکمه‌ها بدون تغییر ... */

    /* 👇 کادر اطلاعات: تضمین رشد و پر کردن تمام فضای باقی‌مانده */
    .room-image-uploader .meta-box {
        /* 👇 تغییر کلیدی: رشد کامل (بیشترین اولویت) */
        flex: 5 1 80px !important;
        min-width: 80px !important;
        max-width: none; /* حذف max-width برای امکان کشیدگی */

        height: var(--main-height);
        padding: 2px 4px;
        font-size: 9px;
        line-height: 1.1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 1px;

        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;

        border: 1px solid #dcdcdc;
        border-radius: 6px;
        background: #fff;
        box-sizing: border-box;
    }

    /* تنظیمات خطوط متن داخل کادر کوچک (بدون تغییر) */
    .room-image-uploader .meta-box > div {
        overflow: hidden; white-space: nowrap; text-overflow: ellipsis;
        width: 100%; font-size: 10px !important; line-height: 1.2 !important;
    }

    /* ... سایر استایل‌ها بدون تغییر ... */
</style> --}}



                <div class="form-group col-lg-12">
                    <label class="control-label col-lg-8 " for="exampleInputFile">دریافت تصویر</label>

                </div>

                <div class="form-group room-image-uploader">
                    {{-- <label for="exampleInputFile" class="control-label col-lg-2">دریافت تصویر</label> --}}
                    <div class="col-lg-12">
                        <div class="uploader-row">
                            <div class="avatar-preview" aria-hidden="true">
                                @if (isset($room_image) && is_object($room_image) && method_exists($room_image, 'temporaryUrl'))
                                    <img src="{{ $room_image->temporaryUrl() }}" alt="پیش‌نمایش تصویر">
                                @else
                                    <img src="/storage/images/room_image/1.jpg" alt="تصویر پیش‌فرض">
                                @endif
                            </div>

                            <div class="uploader-actions">

                                <div class="uploader-buttons-column">

                                    <label class="btn-file" for="room_image_input">
                                        انتخاب تصویر
                                    </label>
                                    <input id="room_image_input" type="file" wire:model="room_image" accept="image/*"
                                        style="display:none">

                                    <button type="button" class="uploader-remove"
                                        onclick="if(confirm('آیا از حذف تصویر مطمئن هستید؟')) { @this.set('room_image', null) }"
                                        title="حذف تصویر">
                                        حذف
                                    </button>
                                </div>

                                <div class="meta-box">
                                    @php
                                        $previewName = null;
                                        $previewPath = null;

                                        if (
                                            isset($room_image) &&
                                            is_object($room_image) &&
                                            method_exists($room_image, 'getClientOriginalName')
                                        ) {
                                            $previewName = $room_image->getClientOriginalName();
                                            $previewPath = '(موقتی)';
                                        } elseif (isset($room_image) && $room_image) {
                                            $previewName = 'فایل انتخاب‌شده';
                                            $previewPath = '(موقتی)';
                                        } else {
                                            $previewName = 'تصویر پیش‌فرض';
                                            $previewPath = '/storage/images/room_image/1.jpg';
                                        }
                                    @endphp

                                    <div style="font-size:11px;font-weight:600;">نام:
                                        <span style="font-weight:400;">{{ $previewName }}</span>
                                    </div>
                                    <div style="font-size:12px;color:#6c757d;margin-top:4px;">آدرس:
                                        <span style="color:#495057;">{{ $previewPath }}</span>
                                    </div>

                                    <div wire:loading wire:target="room_image" class="uploader-meta text-info"
                                        style="margin-top:4px;">
                                        در حال آپلود...
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @error('room_image')
                        <small class="d-block text-danger w-100 text-right col-lg-2">{{ $message }} </small>
                    @enderror
                </div>





                {{-- @error('room_image')
                        <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                    @enderror --}}

                <div class="form-group col-lg-12">
                    <label class="col-lg-10 " for="description">توضیحات</label>
                    <textarea class="form-control col-lg-12 " id="ccomment" name="comment" value="توضیحات" rows="2"
                        wire:model="data.description"></textarea>
                    <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea> -->
                </div>
                @error('data.description')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror

                <div class="form-group col-lg-12 ">
                    {{-- <div class="col-lg-offset-2 col-lg-10"> --}}
                    <button wire:click="handleCreate()" class="btn btn-danger">ذخیره</button>
                    {{-- </div> --}}
                </div>


            </form>

        </div>

    </section>

</div>
