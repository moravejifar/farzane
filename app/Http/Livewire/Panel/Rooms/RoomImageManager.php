<?php

namespace App\Http\Livewire\Panel\Rooms;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\RoomImage; // مطمئن شوید مدل RoomImage را Import کنید
use App\Models\RoomType;  // مطمئن شوید مدل RoomType را Import کنید
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RoomImageManager extends Component
{
    use WithFileUploads;

    public RoomType $roomType;

    // متغیرهایی برای تصاویر موجود
    public $currentImages;

    // متغیرهایی برای تصاویر جدید
    public $newImageFiles = []; // آرایه ای برای فایل‌های آپلودی
    public $tempCaptions = [];  // کپشن‌های فایل‌های آپلودی

    // متغیر برای ردیابی تصویر اصلی
    public $mainImageId;

    // قوانینی برای اعتبارسنجی
    protected $rules = [
        'newImageFiles.*' => 'nullable|image|max:2048', // حداکثر 2 مگابایت
        'currentImages.*.caption' => 'nullable|string|max:255',
    ];

    // متد mount برای بارگذاری اولیه داده ها
    public function mount(RoomType $roomType)
    {
        $this->roomType = $roomType;
        $this->loadImages();
    }

    // متد کمکی برای بارگذاری و مرتب سازی تصاویر موجود
    public function loadImages()
    {
        // با استفاده از orderBy('image_order') تصاویر را مرتب سازی می کنیم
        $this->currentImages = $this->roomType->images()->get();

        // پیدا کردن ID تصویر اصلی برای رادیو باتن ها
        $mainImage = $this->currentImages->where('is_main', true)->first();
        $this->mainImageId = $mainImage ? $mainImage->id : null;
    }

    // متد ذخیره سازی کل تغییرات (تصاویر جدید و کپشن های موجود)
    public function saveImages()
    {
        $this->validate();

        DB::transaction(function () {
            $order = $this->currentImages->count();

            // 1. آپلود و ذخیره تصاویر جدید
            foreach ($this->newImageFiles as $file) {
                // آپلود در storage
                $path = $file->store('public/room_images');
                $url = Storage::url($path);

                // پیدا کردن کپشن موقت بر اساس نام فایل
                $captionKey = $file->getClientOriginalName();
                $caption = $this->tempCaptions[$captionKey] ?? null;

                // ایجاد رکورد جدید در دیتابیس
                $image = $this->roomType->images()->create([
                    'image_url' => $url,
                    'caption' => $caption,
                    'image_order' => $order++,
                ]);

                // اگر هیچ تصویر اصلی قبلا نبود، این را به عنوان تصویر اصلی قرار بده
                if (!$this->mainImageId) {
                    $this->mainImageId = $image->id;
                }
            }

            // 2. به روزرسانی کپشن ها و ترتیب تصاویر موجود
            foreach ($this->currentImages as $image) {
                // فقط اگر مدل تغییر کرده است (لایو وایر این را ردیابی می کند)
                if ($image->isDirty('caption')) {
                    $image->save();
                }
                // (اگر قابلیت تغییر ترتیب اضافه شود، اینجا به روز می شود)
            }

            // 3. به روز رسانی تصویر اصلی (فراخوانی متدی که در ادامه تعریف می کنیم)
            $this->updateMainImageId();


            // پاکسازی
            $this->newImageFiles = [];
            $this->tempCaptions = [];
            $this->loadImages(); // بارگذاری مجدد لیست تصاویر
        });

        session()->flash('message', 'تصاویر با موفقیت به روزرسانی شدند.');
    }

    // متد اختصاصی برای به روز رسانی تصویر اصلی
    // این متد توسط saveImages و یا با کلیک رادیو باتن به صورت مستقیم فراخوانی می شود
    public function updateMainImageId()
    {
        // اگر هیچ IDای انتخاب نشده، کاری نکن
        if (!$this->mainImageId) {
            return;
        }

        DB::transaction(function () {
            // 1. تمام تصاویر را به is_main = false تغییر می دهد
            $this->roomType->images()->update(['is_main' => false]);

            // 2. تصویر انتخاب شده را به is_main = true تغییر می دهد
            $mainImage = RoomImage::find($this->mainImageId);
            if ($mainImage) {
                $mainImage->update(['is_main' => true]);
            }
        });

        $this->loadImages(); // رفرش برای نمایش وضعیت جدید
    }

    // متد حذف تصویر
    public function deleteImage($imageId)
    {
        $image = RoomImage::find($imageId);
        if ($image) {
            // 1. حذف از Storage
            Storage::delete(str_replace('/storage/', 'public/', $image->image_url));

            // 2. حذف از دیتابیس
            $image->delete();

            // 3. اگر تصویر اصلی حذف شده، mainImageId را ریست کن
            if ($this->mainImageId == $imageId) {
                $this->mainImageId = null;
            }

            // 4. بارگذاری مجدد لیست
            $this->loadImages();
        }
    }

    public function render()
    {
        return view('livewire.panel.rooms.room-image-manager')->layout('layouts.panel');;
    }
}
