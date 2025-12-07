@extends('layouts.panel_classic')

@section('content')
    <div class="container">
        <h2>گالری تصاویر اتاق: {{ $roomType->room_name }}</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
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
                @foreach ($images as $image)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ $image->image_url }}" class="card-img-top"
                                style="height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <input type="text" class="form-control mb-2" name="existing[{{ $image->id }}]"
                                    value="{{ $image->caption }}" placeholder="کپشن">
                                <div class="form-check">
                                    <input type="radio" name="main_image" value="{{ $image->id }}"
                                        class="form-check-input" {{ $image->is_main ? 'checked' : '' }}>
                                    <label class="form-check-label">تصویر اصلی</label>
                                </div>
                                <a href="{{ route('panel.room.gallery.destroy', $image->id) }}"
                                    class="btn btn-danger btn-sm mt-2" onclick="return confirm('آیا مطمئن هستید؟')">حذف</a>
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

        previewContainer.className = "";
        previewContainer.style.cssText = `
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: flex-start;
        align-items: stretch;
        margin-top: 15px;
        width: 100%;
    `;

        const files = event.target.files;
        if (files.length === 0) return;

        const cardWidth = "24%";
        const imageHeight = "180px";
        const cardPadding = "12px";
        const minCardWidth = "220px";

        [...files].forEach((file) => {
            const reader = new FileReader();

            reader.onload = function(e) {
                const col = document.createElement('div');

                col.className = "";
                col.style.cssText = `
                width: ${cardWidth} !important;
                min-width: ${minCardWidth} !important;
                flex: 0 0 ${cardWidth} !important;
                box-sizing: border-box !important;
                margin-bottom: 15px !important;
                padding: 0 !important;
            `;

                col.innerHTML = `
                <div style="
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    padding: ${cardPadding};
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                    background: white;
                    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
                ">

                    <!-- قسمت تصویر -->
                    <div style="flex: 0 0 auto; margin-bottom: 10px;">
                        <img src="${e.target.result}" alt="پیش‌نمایش"
                             style="
                                width:100% !important;
                                height:${imageHeight} !important;
                                object-fit:cover !important;
                                border-radius:6px !important;
                                display:block !important;
                             ">
                    </div>

                    <!-- قسمت دکمه‌ها و اطلاعات -->
                    <div style="
                        flex: 1 0 auto;
                        display: flex;
                        flex-direction: column;
                        gap: 10px;
                    ">

                        <!-- کادر اطلاعات و کپشن بزرگ -->
                        <div style="
                            width: 100%;
                            padding: 10px;
                            border: 1px solid #eee;
                            border-radius: 6px;
                            background: #f8f9fa;
                            font-size: 11px;
                            flex-grow: 1;
                        ">
                            <!-- اطلاعات فایل -->
                            <div style="
                                display: flex;
                                flex-direction: column;
                                gap: 5px;
                                margin-bottom: 10px;
                            ">
                                <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    <strong style="font-size: 10px;">نام:</strong>
                                    <span style="font-size: 10px;">${file.name.substring(0, 25)}${file.name.length > 25 ? '...' : ''}</span>
                                </div>
                                <div style="color:#777; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    <strong style="font-size: 10px;">حجم:</strong>
                                    <span style="font-size: 10px;">${(file.size/1024).toFixed(1)} KB</span>
                                </div>
                            </div>

                            <!-- input کپشن بزرگ‌تر -->
                            <input type="text" name="captions[]"
                                   placeholder="کپشن تصویر (حداکثر 100 کاراکتر)"
                                   style="
                                        width: 100%;
                                        padding: 12px 14px;
                                        border: 1px solid #ddd;
                                        border-radius: 5px;
                                        font-size: 12px;
                                        box-sizing: border-box;
                                        background: white;
                                        min-height: 40px;
                                        line-height: 1.4;
                                   ">
                        </div>

                        <!-- ردیف دکمه‌های کوچک -->
                        <div style="
                            display: flex;
                            gap: 8px;
                            width: 100%;
                        ">
                            <!-- دکمه تغییر -->
                            <label style="
                                flex: 0 0 auto;
                                width: 45%;
                                padding: 5px 8px;
                                background: #6c757d;
                                color: white;
                                border-radius: 4px;
                                cursor: pointer;
                                text-align: center;
                                font-size: 10px;
                                border: none;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                gap: 4px;
                                min-height: 28px;
                                white-space: nowrap;
                                position: relative;
                                overflow: hidden;
                            ">
                                <i class="fas fa-camera" style="font-size: 10px;"></i>
                                <span>تغییر</span>
                                <input type="file"
                                       style="
                                            position: absolute;
                                            top: 0;
                                            left: 0;
                                            width: 100%;
                                            height: 100%;
                                            opacity: 0;
                                            cursor: pointer;
                                       "
                                       class="replace-input"
                                       accept="image/*">
                            </label>

                            <!-- دکمه حذف - با Confirm -->
                            <button type="button"
                                    style="
                                        flex: 0 0 auto;
                                        width: 45%;
                                        padding: 5px 8px;
                                        background: #dc3545;
                                        color: white;
                                        border-radius: 4px;
                                        cursor: pointer;
                                        border: none;
                                        font-size: 10px;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        gap: 4px;
                                        min-height: 28px;
                                        white-space: nowrap;
                                    "
                                    class="delete-btn">
                                <i class="fas fa-trash" style="font-size: 10px;"></i>
                                <span>حذف</span>
                            </button>

                            <!-- فضای خالی باقیمانده -->
                            <div style="flex: 1;"></div>
                        </div>

                    </div>

                </div>
            `;

                // 🛠️ برای امکان تغییر تصویر
                const replaceInput = col.querySelector('.replace-input');
                replaceInput.addEventListener('change', function(e) {
                    const newFile = e.target.files[0];
                    if (!newFile) return;

                    // بررسی نوع فایل
                    if (!newFile.type.startsWith('image/')) {
                        alert('لطفاً فقط فایل تصویری انتخاب کنید!');
                        this.value = '';
                        return;
                    }

                    const reader2 = new FileReader();
                    reader2.onload = function(ev) {
                        // آپدیت تصویر
                        col.querySelector('img').src = ev.target.result;

                        // آپدیت نام فایل
                        const nameSpan = col.querySelector('div[style*="display: flex"] span');
                        nameSpan.textContent = ` ${newFile.name.substring(0, 25)}${newFile.name.length > 25 ? '...' : ''}`;

                        // آپدیت حجم فایل
                        const sizeSpan = col.querySelector('div[style*="color:#777"] span');
                        sizeSpan.textContent = ` ${(newFile.size/1024).toFixed(1)} KB`;
                    };

                    reader2.readAsDataURL(newFile);
                });

                // 🗑️ برای دکمه حذف با Confirm
                const deleteBtn = col.querySelector('.delete-btn');
                deleteBtn.addEventListener('click', function() {
                    // نمایش پیام تایید
                    if (confirm('آیا مطمئن هستید که می‌خواهید این تصویر را حذف کنید؟\nاین عمل قابل بازگشت نیست.')) {
                        // اگر کاربر Ok کلیک کرد، کارت را حذف کن
                        col.remove();

                        // پیام موفقیت (اختیاری)
                        setTimeout(() => {
                            alert('تصویر با موفقیت حذف شد.');
                        }, 300);
                    } else {
                        // اگر کاربر Cancel کلیک کرد
                        console.log('کاربر از حذف انصراف داد.');
                    }
                });

                previewContainer.appendChild(col);
            };

            reader.readAsDataURL(file);
        });

        event.target.value = '';
    });
</script>
@endsection
