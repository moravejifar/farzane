<div class="col-sm-4 ">

    <section class="panel">
        <header class="panel-heading">
            ایجاد تسهیلات جدید

        </header>
        <div class="panel-body">
            <form class="form-horizontal" role="form" onsubmit="return  false">
                <div class="form-group col-lg-12">
                    <label class="col-lg-8" for="price"> شناسه تسهیلات</label>
                    <input class=" form-control" id="facility_id" name="facility_id" type="text" size="3px"
                        value="شناسه تسهیلات" wire:model="data.facility_id" />
                </div>
                @error('data.facility_id')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror
                <div class="form-group col-lg-12">
                    <label class="col-lg-10 ">نوع تسهیلات</label>
                    <select value="1" name="facilitytype_name" class="form-control"
                        wire:model="data.facilitytype_id" value="">
                        <option value="" selected="">select</option>
                        {{-- <option value="1">1</option> --}}
                        @foreach ($type as $row)
                            <option value="{{ $row->facilitytype_id }}">{{ $row->facility_type_name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('data.facilitytype_id')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror

                <div class="form-group col-lg-12">
                    <label class="col-lg-8" for="price"> نام تسهیلات</label>
                    <input class=" form-control" id="room_number" name="room_number" type="text" size="3px"
                        value="نام تسهیلات" wire:model="data.facility_name" />
                </div>
                @error('data.facility_name')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror

                <div class="form-group col-lg-12">
                    <label class="col-lg-8" for="price"> آدرس تسهیلات</label>
                    <input class=" form-control" id="facility_loc" name="facility_loc" type="text" size="3px"
                        value="آدرس تسهیلات" wire:model="data.facility_loc" />
                </div>
                @error('data.facility_loc')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror

                <div class="form-group col-lg-12">
                    <label class="col-lg-8" for="price"> کپشن تسهیلات</label>
                    <input class=" form-control" id="facility_alt" name="facility_alt" type="text" size="3px"
                        value="کپشن تسهیلات" wire:model="data.facility_alt" />
                </div>
                @error('data.facility_alt')
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
                                @if (isset($facility_image) && is_object($rfacility_image) && method_exists($facility_image, 'temporaryUrl'))
                                    <img src="{{ $facility_image->temporaryUrl() }}" alt="پیش‌نمایش تصویر">
                                @else
                                    <img src="/storage/images/facility_image/1.jpg" alt="تصویر پیش‌فرض">
                                @endif
                            </div>

                            <div class="uploader-actions">

                                <div class="uploader-buttons-column">

                                    <label class="btn-file" for="facility_image_input">
                                        انتخاب تصویر
                                    </label>
                                    <input id="facility_image_input" type="file" wire:model="facility_image"
                                        accept="image/*" style="display:none">

                                    <button type="button" class="uploader-remove"
                                        onclick="if(confirm('آیا از حذف تصویر مطمئن هستید؟')) { @this.set('facility_image', null) }"
                                        title="حذف تصویر">
                                        حذف
                                    </button>
                                </div>

                                <div class="meta-box">
                                    @php
                                        $previewName = null;
                                        $previewPath = null;

                                        if (
                                            isset($facility_image) &&
                                            is_object($facility_image) &&
                                            method_exists($facility_image, 'getClientOriginalName')
                                        ) {
                                            $previewName = $facility_image->getClientOriginalName();
                                            $previewPath = '(موقتی)';
                                        } elseif (isset($facility_image) && $facility_image) {
                                            $previewName = 'فایل انتخاب‌شده';
                                            $previewPath = '(موقتی)';
                                        } else {
                                            $previewName = 'تصویر پیش‌فرض';
                                            $previewPath = '/storage/images/facility_image/1.jpg';
                                        }
                                    @endphp

                                    <div style="font-size:11px;font-weight:600;">نام:
                                        <span style="font-weight:400;">{{ $previewName }}</span>
                                    </div>
                                    <div style="font-size:12px;color:#6c757d;margin-top:4px;">آدرس:
                                        <span style="color:#495057;">{{ $previewPath }}</span>
                                    </div>

                                    <div wire:loading wire:target="facility_image" class="uploader-meta text-info"
                                        style="margin-top:4px;">
                                        در حال آپلود...
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @error('facility_image')
                        <small class="d-block text-danger w-100 text-right col-lg-2">{{ $message }} </small>
                    @enderror
                </div>


                {{-- <div class="form-group col-lg-12">
                        <label for="exampleInputFile" class="control-label col-lg-8">دریافت تصویر</label>
                        <input type="file" id="exampleInputFile3" style="padding-right: 5px;" wire:model="facility_image">
                    </div>
                    @error('facility_image')
                        <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                    @enderror --}}

                <div class="form-group col-lg-12">
                    <label class="col-lg-10 ">امتیاز تسهیلات</label>
                    <select value="1" name="facility_rank" class="form-control" wire:model="data.facility_rank"
                        value="">
                        <option selected="selected">select</option>
                        {{-- <option value="1">1</option> --}}
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                @error('data.facility_rank')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror

                <div class="form-group col-lg-12">

                    {{-- <div class="form-group"> --}}
                    {{-- <div class="col-lg-offset-2 col-lg-10"> --}}
                    <button wire:click="handleCreate()" class="btn btn-danger">ذخیره</button>
                    {{-- </div> --}}
                </div>

            </form>

        </div>

    </section>

</div>
