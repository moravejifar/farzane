
@extends('layouts.panel_classic')

@section('content')
<div class="container">
    <h2>گالری تصاویر اتاق: {{ $roomType->room_name }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('panel.room.gallery.update', $roomType->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- تصاویر جدید -->
<div class="mb-4">
    <label class="form-label">انتخاب تصاویر جدید (چندگانه):</label>
    <input type="file" id="newImagesInput" name="new_images[]" multiple class="form-control" accept="image/*">
    <div id="previewContainer" class="row mt-3"></div>
</div>



        <!-- نمایش تصاویر موجود -->
        <h4>تصاویر موجود:</h4>
        <div class="row">
            @foreach($images as $image)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ $image->image_url }}" class="card-img-top" style="height: 150px; object-fit: cover;">
                    <div class="card-body">
                        <input type="text" class="form-control mb-2" name="existing[{{ $image->id }}]" value="{{ $image->caption }}" placeholder="کپشن">
                        <div class="form-check">
                            <input type="radio" name="main_image" value="{{ $image->id }}" class="form-check-input" {{ $image->is_main ? 'checked' : '' }}>
                            <label class="form-check-label">تصویر اصلی</label>
                        </div>
                        <a href="{{ route('panel.room.gallery.destroy', $image->id) }}" class="btn btn-danger btn-sm mt-2"
                           onclick="return confirm('آیا مطمئن هستید؟')">حذف</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">ذخیره تغییرات گالری</button>
        {{-- <a href="{{ route('panel.room.index') }}" class="btn btn-secondary">بازگشت</a> --}}
        <!-- دکمه بازگشت به ویرایش اتاق -->
{{-- <button type="button" class="btn btn-secondary" wire:click="$emit('backToEdit')">
    بازگشت به ویرایش
</button> --}}
<a href="{{ route('roomType') }}" class="btn btn-secondary">بازگشت</a>

    </form>
</div>
@endsection
@section('scripts')
<script>
document.getElementById('newImagesInput').addEventListener('change', function(event) {

    const previewContainer = document.getElementById('previewContainer');
    previewContainer.innerHTML = ""; // پاک کردن پیش‌نمایش‌های قبلی

    const files = event.target.files;

    if(files.length === 0) return;

    [...files].forEach((file, index) => {
        const reader = new FileReader();

        reader.onload = function(e) {

            // ساخت یک کارت bootstrap برای نمایش هر عکس
            const col = document.createElement('div');
            col.classList.add('col-md-4', 'mb-3');

            col.innerHTML = `
                <div class="card shadow-sm">
                    <img src="${e.target.result}" class="card-img-top" style="height: 150px; object-fit: cover;">
                    <div class="card-body">
                        <p class="mb-1"><strong>نام:</strong> ${file.name}</p>
                        <p class="mb-1"><strong>حجم:</strong> ${(file.size / 1024).toFixed(1)} KB</p>

                        <input type="text" name="new_captions[]" class="form-control mt-2"
                            placeholder="کپشن تصویر">

                    </div>
                </div>
            `;

            previewContainer.appendChild(col);
        };

        reader.readAsDataURL(file);
    });
});
</script>
<script>
document.getElementById('newImagesInput').addEventListener('change', function(event) {

    const previewContainer = document.getElementById('previewContainer');
    // هر بار تغییر فایل، قبلی‌ها پاک می‌شوند
    previewContainer.innerHTML = "";

    const files = event.target.files;

    [...files].forEach((file, index) => {
        const reader = new FileReader();

        reader.onload = function(e) {

            const col = document.createElement('div');
            col.classList.add('col-lg-12', 'room-image-uploader');

            col.innerHTML = `
                <div class="uploader-row">

                    <div class="avatar-preview">
                        <img src="${e.target.result}" alt="پیش‌نمایش">
                    </div>

                    <div class="uploader-actions">

                        <div class="uploader-buttons-column">
                            <label class="btn-file">
                                انتخاب تصویر
                                <input type="file" style="display:none">
                            </label>

                            <button type="button" class="uploader-remove" onclick="this.closest('.room-image-uploader').remove()">
                                حذف
                            </button>
                        </div>

                        <div class="meta-box">
                            <div><strong>نام:</strong> ${file.name}</div>
                            <div style="color:#777;"><strong>حجم:</strong> ${(file.size/1024).toFixed(1)} KB</div>
                            <div style="color:#777;"><strong>آدرس:</strong> (موقتی)</div>

                            <input type="text" class="form-control mt-2" name="captions[]" placeholder="کپشن تصویر">
                        </div>

                    </div>

                </div>
            `;

            previewContainer.appendChild(col);
        };

        reader.readAsDataURL(file);
    });
});
</script>

@endsection

