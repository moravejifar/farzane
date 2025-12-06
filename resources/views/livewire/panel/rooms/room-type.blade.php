<div>
    <x-slot name="title">
        - دسته بندی
    </x-slot>

    <!--main content start-->
    <div class="col-sm-8">
        <section class="panel">
            <header class="panel-heading">
                جدول دسته بندی
            </header>
            <table class="table table-striped" style="width: 25cm; line-height:50px;">
                <thead>
                    <tr>
                        <th class="col-lg-1" style="padding-right: 40px">شناسه </th>
                        <th class="col-lg-1"> نوع اتاق</th>
                        <th class="col-lg-1">تعداد مهمان</th>
                        <th class="col-lg-1">تعداد تخت</th>
                        <th class="col-lg-1">قیمت اتاق</th>
                        {{-- <th>توضیحات</th> --}}
                        <th class="col-lg-2">کپشن تصویر</th>
                        {{-- <th class="col-lg-2">تصویر</th> --}}
                        <th class="col-lg-1">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($update as $row)
                        <tr>
                            {{-- <td> --}}

                            {{-- {{ $item->main_image_id ?? 'ندارد' }} --}}
                            {{-- </td> --}}
                            <td><img src="{{ $row->room_image }}" class="img img-circle d-block mb-2" width="40px"
                                    height="40px"> {{ $row->id }}</td>
                            <td style="padding-right: 10px"> {{ $row->room_name }}</td>
                            <td>{{ $row->max_quest }}</td>
                            <td>{{ $row->room_size }}</td>
                            <td>{{ $row->room_priceusd }}</td>
                            {{-- <td>{{$row->description}}</td> --}}
                            <td>{{ $row->alt_image }}</td>
                            {{-- <td> </td> --}}

                            <td>
                                {{-- <button type="button" class="btn btn-primary btn-xs"><i class="icon-pencil"
                                        wire:click="handleEdit({{ $row->id }})"></i></button> --}}
                                <button type="button" class="btn btn-primary btn-xs"
                                    wire:click="handleEdit({{ $row->id }})">
                                    <i class="icon-pencil"></i>
                                </button>

                                <button type="button" class="btn btn-danger btn-xs"><i class="icon-trash "
                                        wire:click="destroy({{ $row->id }})"></i></button>
                                {{-- <button class="btn btn-danger btn-xs"><i class="icon-trash " wire:click="deleteUser({{$newUser->id}})"></i></button> --}}
                                {{-- {{$row->id}} --}}
                                {{-- {{$row->room_priceusd}} --}}
                            </td>
                        </tr>

                        {{-- {{$row->alt_image}} --}}
                    @endforeach
                </tbody>
            </table>
        </section>

    </div>

    @if ($isUpdating)
        @include('livewire.panel.rooms.update-troom')
    @else
        @include('livewire.panel.rooms.create-troom')
        {{-- @include('livewire.panel.rooms.room-image-manager') --}}
    @endif




    <div x-data="{ open: @entangle('showGalleryModal') }">

        <!-- پس‌زمینه مودال -->
        <div x-show="open" x-transition.opacity class="livewire-modal-backdrop"
            style="position:fixed; top:0; left:0; width:100%; height:100%;
               background-color:rgba(0,0,0,0.7); z-index:9999;
               overflow-y:auto; display:flex; align-items:center; justify-content:center;">

            <div class="modal-dialog modal-lg" role="document" style="margin: 0;">

                {{-- فرم اصلی مودال --}}
                <form wire:submit.prevent="saveGalleryChanges">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">
                                آلبوم تصاویر اتاق: {{ $data['room_name'] ?? '' }}
                            </h5>

                            <button type="button" class="close" aria-label="Close" @click="open = false">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">

                            {{-- پیام‌ها --}}
                            @if (session()->has('success_message'))
                                <div class="alert alert-success text-center">{{ session('success_message') }}</div>
                            @endif

                            @if (session()->has('error'))
                                <div class="alert alert-danger text-center">{{ session('error') }}</div>
                            @endif

                            {{-- انتخاب تصاویر جدید --}}
                            <div class="mb-4">
                                <label class="form-label">انتخاب تصاویر جدید (چندگانه):</label>
                                <input type="file" class="form-control" wire:model="newImageFiles" multiple>

                                @error('newImageFiles.*')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                @if ($newImageFiles)
                                    <h6 class="mt-3">کپشن تصاویر جدید:</h6>
                                    @foreach ($newImageFiles as $file)
                                        <div class="d-flex align-items-center mb-2 border-bottom pb-2">
                                            <span
                                                class="text-muted small me-3">{{ $file->getClientOriginalName() }}:</span>

                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="کپشن تصویر"
                                                wire:model.live="tempCaptions.{{ $file->getClientOriginalName() }}">
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            {{-- نمایش تصاویر موجود --}}
                            @if ($roomTypeId && $currentImages && count($currentImages) > 0)
                                <h5 class="mt-4">تصاویر موجود در گالری:</h5>
                                <div class="row">

                                    @foreach ($currentImages as $index => $image)
                                        <div class="col-md-4 mb-4">
                                            <div class="card h-100">

                                                {{-- تصویر --}}
                                                @if (!empty($image['image_url']))
                                                    <img src="{{ $image['image_url'] }}" class="card-img-top"
                                                        alt="تصویر گالری" style="height: 150px; object-fit: cover;">
                                                @else
                                                    <div class="card-img-top d-flex align-items-center justify-content-center bg-light"
                                                        style="height: 150px;">
                                                        <span class="text-muted">تصویری موجود نیست</span>
                                                    </div>
                                                @endif

                                                <div class="card-body p-2">

                                                    {{-- کپشن --}}
                                                    <input type="text" class="form-control form-control-sm mb-2"
                                                        placeholder="کپشن"
                                                        wire:model.lazy="currentImages.{{ $index }}.caption">

                                                    <div class="d-flex justify-content-between align-items-center">

                                                        {{-- تصویر اصلی --}}
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="mainImage" value="{{ $image['id'] }}"
                                                                wire:model.live="mainImageId">
                                                            <label class="form-check-label small">تصویر اصلی</label>
                                                        </div>

                                                        {{-- حذف --}}
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            wire:click="deleteImage({{ $image['id'] }})"
                                                            wire:confirm="آیا مطمئن هستید؟ این عمل غیرقابل بازگشت است!">
                                                            حذف
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            @else
                                <div class="alert alert-info text-center mt-3">
                                    <i class="fa fa-info-circle"></i>
                                    هیچ تصویری در گالری موجود نیست.
                                </div>
                            @endif

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="open = false">
                                بستن
                            </button>

                            <button type="submit" class="btn btn-primary">
                                ذخیره تغییرات گالری
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>

    </div>



</div>



{{-- <script>
    window.addEventListener('openGalleryModal', event => {
        var myModal = new bootstrap.Modal(document.getElementById('galleryModal'));
        myModal.show();
    });
</script> --}}

{{-- </div> --}}

{{-- <div class="col-sm-4"> --}}


{{-- </div> --}}
<!--main content end-->
