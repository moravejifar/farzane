<div class="col-sm-4 ">

    <section class="panel">
        <header class="panel-heading">
            ایجاد دسته بندی جدید

        </header>
        <div class="panel-body">
            <form class="form-horizontal" role="form" wire:submit.prevent="handleCreate">
                <div class="form-group col-lg-12">
                    <label class="col-lg-7" for="room_name">نوع اتاق</label>
                    <input class="form-control" id="roomtype" name="roomtype" type="text" size="3px"
                        wire:model="data.room_name" />
                    {{-- {{$data['room_name']}} --}}

                </div>

                @error('data.room_name')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror

                <div class="form-group col-lg-12">
                    <label class="col-lg-10 ">تعداد مهمان</label>
                    <select  name="max_quest" class="form-control" wire:model="data.max_quest">
                        <option value="">لطفاً انتخاب کنید</option>
                        <option >1</option>
                        <option >2</option>
                        <option >3</option>
                        <option >4</option>
                        <option >5</option>
                        <option >6</option>
                    </select>
                </div>
                @error('data.max_quest')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror




                <div class="form-group col-lg-12 ">
                    <label class="col-lg-10 ">تعداد تخت</label>
                    <select name="room_size" class="form-control " wire:model="data.room_size" value="">
                        <option selected="selected"> لطفاً انتخاب کنید</option>

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
                    <input class="form-control" id="roomprice" name="roomprice" type="text" size="3px"
                        wire:model="data.room_priceusd" />
                </div>
                @error('data.room_priceusd')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror

                <div class="form-group col-lg-12">
                    <label class="control-label col-lg-8 " for="altimage">کپشن تصویر</label>
                    <input class="form-control" id="altimage" name="altimage" type="text"
                        wire:model="data.alt_image" />
                </div>



                <div class="form-group col-lg-12">
                    <label class="control-label col-lg-8 " for="exampleInputFile">دریافت تصویراصلی</label>

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
                    <button type="button" class="btn btn-info btn-block" wire:click="openGalleryModal({{$selected_id}})">
                        <i class="fa fa-picture-o"></i> مدیریت آلبوم اتاق
                    </button>
                </div> --}}
                <button
    type="button"
    class="btn btn-info btn-block"
    wire:click="openGalleryModal({{ $row->id }})">

    <i class="fa fa-picture-o"></i> مدیریت آلبوم اتاق
</button>

{{-- <button wire:click="testButton">تست</button> --}}

{{-- <button wire:click="openGalleryModal">مدیریت آلبوم</button> --}}



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
                    {{-- <button wire:click="handleCreate()" class="btn btn-danger">ذخیره</button> --}}
                    <button type="submit" class="btn btn-danger">ذخیره</button>
                    {{-- </div> --}}
                </div>


            </form>

        </div>

    </section>

</div>
