{{-- <div class="row">
    <div class="col-lg-12">
       <section class="panel"> --}}
<div class="col-sm-4">

    <section class="panel">
        <header class="panel-heading">
            ایجاد دسته بندی جدید
        </header>
        <div class="panel-body">
            <form class="form-horizontal" role="form" onsubmit="return  false">
                <div class="form-group col-lg-12">
                    <label class="col-lg-7" for="room_name">نوع اتاق</label>
                    <input class="form-control" id="roomtype" name="roomtype" type="text" size="3px"
                        value=" نوع اتاق" wire:model="data.room_name" />
                    {{-- {{$data['room_name']}} --}}
                </div>
                @error('room_name')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror
                <div class="form-group col-lg-12">
                    <label class="col-lg-10 ">تعداد مهمان</label>
                    <select value="1" name="max_quest" class="form-control" wire:model="data.max_quest"
                        value="">
                        <option selected="selected">select</option>
                        {{-- <option value="1">1</option> --}}
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
                @error('data.alt_image')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror


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
                {{-- <div class="form-group col-lg-12">
                    <label class="control-label col-lg-8 " for="exampleInputFile">دریافت البوم تصاویر</label>
                    <button type="button" class="btn btn-info btn-block" wire:click="openGalleryModal">
                        <i class="fa fa-picture-o"></i> مدیریت آلبوم اتاق
                    </button>
                </div> --}}
                {{-- <div class="form-group col-lg-12">
                    <label class="control-label col-lg-8 " for="exampleInputFile">دریافت البوم تصاویر</label>
                    <button type="button" class="btn btn-info btn-block"
                        wire:click="wire:click="openGalleryModal({{ $selected_id }})"">
                        <i class="fa fa-picture-o"></i> مدیریت آلبوم اتاق
                    </button>

                </div> --}}
                {{-- <button type="button" class="btn btn-info btn-block"
                    wire:click="openGalleryModal({{ $this->selected_id }})">
                    <i class="fa fa-picture-o"></i> مدیریت آلبوم اتاق
                </button> --}}
                <a href="{{ route('panel.room.gallery', $row->id) }}" class="btn btn-primary btn-xs">
                    مدیریت آلبوم
                </a>
                {{-- <button type="button" wire:click="openGalleryModal({{ $selected_id }})" class="btn btn-info">
    مدیریت گالری
</button> --}}

                {{-- <button wire:click="testButton">تست</button> --}}
                {{-- <button wire:click="openGalleryModal">مدیریت آلبوم</button> --}}


                <div class="form-group col-lg-12">
                    <label class="col-lg-10 " for="description">توضیحات</label>
                    <textarea class="form-control col-lg-12 " id="ccomment" name="comment" value="توضیحات" rows="2"
                        wire:model="data.description"></textarea>
                    <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea> -->
                </div>
                @error('data.description')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror

                {{-- <div class="form-group col-lg-12">

                    <button wire:click="handleUpdate()" class="btn btn-danger">ویرایش</button>
                </div> --}}
                {{-- <div class="form-group col-lg-12"> --}}
                {{-- اگر در حال ویرایش هستیم، handleUpdate را فراخوانی کن؛ در غیر این صورت handleCreate را --}}
                {{-- <button wire:click="{{ $isUpdating ? 'handleUpdate' : 'handleCreate' }}" --}}
                {{-- class="btn {{ $isUpdating ? 'btn-success' : 'btn-primary' }}"> --}}
                {{-- متن دکمه را بر اساس وضعیت تغییر بده --}}
                {{-- {{ $isUpdating ? 'ثبت ویرایش نهایی' : 'ایجاد دسته بندی جدید' }} --}}
                {{-- </button> --}}
                @if ($isUpdating)
                    <button wire:click="handleUpdate" class="btn btn-success">
                        ثبت ویرایش نهایی
                    </button>
                @else
                    <button wire:click="handleCreate" class="btn btn-primary">
                        ایجاد دسته بندی جدید
                    </button>
                @endif


                {{-- اضافه کردن دکمه لغو در حالت ویرایش --}}
                @if ($isUpdating)
                    <button wire:click="resetInputAndCancelUpdate" class="btn btn-danger">
                        لغو ویرایش
                    </button>
                @endif
        </div>
        {{-- <button type="button" class="btn btn-success btn-xs"
        wire:click="simpleTest({{ $row->id }})">
    <i class="icon-check"></i> تست ساده
</button> --}}

        </form>
</div>
</section>
</div>
