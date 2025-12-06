<?php

namespace App\Http\Livewire\Panel\Rooms;

use Livewire\Component;
use App\Models\RoomType;
use Livewire\WithFileUploads;
use App\Models\RoomImage;// ✅ جدید: ایمپورت مدل RoomImage
use Illuminate\Support\Facades\Storage; // ✅ جدید: ایمپورت Storage برای مدیریت فایل‌ها
use Illuminate\Support\Facades\DB;

class RoomTypeManager extends Component
{

use WithFileUploads;
public $room_image, $selected_id, $update;
public $isUpdating = false;
public $isUploading = false;
public $galleryMessage = '';


 // 👇 پراپرتی‌های مدیریت گالری تصاویر (اضافه شده)
public $showGalleryModal = false; // وضعیت نمایش مودال گالری
public $roomTypeId; // ID نوع اتاق فعلی (کلید خارجی)
public $newImageFiles = [];// فایل‌های جدید در حال آپلود
public $tempCaptions = [];// کپشن‌های موقتی برای فایل‌های جدید
public $currentImages;// کالکشن تصاویر موجود از دیتابیس (RoomImage)
public $mainImageId;// ID تصویر اصلی انتخاب شده
public $data = [
"id" => "",
"room_name" => "",
"max_quest" => "",
"alt_image" => "",
"room_size" => "",
"description" => "",
"room_priceusd" => "",
];

 // 👇 قوانین اعتبارسنجی به‌روز شده

protected function rules()
{
return [
'data.room_name' => 'required|min:3|unique:room_type,room_name,' . $this->selected_id,
'data.max_quest' => 'required',
'data.alt_image' => 'required',
'data.room_size' => 'required',
'data.room_priceusd' => 'required',

 // قوانین تصاویر گالری
'newImageFiles.*' => 'nullable|image|max:2048',
'tempCaptions.*' => 'nullable|string|max:255',
];
}

 // ----------------------------------------------------------------------
// ⬇️ متدهای مدیریت گالری تصاویر (جدید) ⬇️
// ----------------------------------------------------------------------

 /**
* متد باز کردن مودال گالری و بارگذاری تصاویر موجود
*/
// RoomTypeManager.php


// public function openGalleryModal($roomTypeId = null)
// {
// $this->roomTypeId = $this->selected_id ?? $roomTypeId;
// $this->reset(['tempCaptions']); // فقط کپشن‌ها ریست می‌شوند

// // اگر در حالت ایجاد هستیم، newImageFiles را دست نمی‌زنیم تا فایل‌های موقت حفظ شوند.

// if ($this->roomTypeId) {
// // حالت ویرایش: بارگذاری تصاویر موجود از دیتابیس
// // $this->currentImages = RoomImage::where('room_type_id', $this->roomTypeId)
// // ->orderBy('image_order')
// // ->get();
// dd ( $this->currentImages = RoomImage::where('room_type_id', $this->roomTypeId)
// ->orderBy('image_order')
// ->get()
// ->map(function ($img) {
// return [
// 'id' => (int) $img->id,
// 'caption' => (string) $img->caption,
// 'image_url' => (string) $img->image_url,
// 'image_order' => (int) $img->image_order,
// 'is_main' => (bool) $img->is_main,
// ];
// })
// ->values()
// ->all()); // ←← بهترین روش به جای toArray()


// $mainImage = collect($this->currentImages)
// ->where('is_main', true)
// ->first();

// $this->mainImageId = $mainImage['id'] ?? null;


// // $mainImage = $this->currentImages->where('is_main', true)->first();
// // $this->mainImageId = $mainImage ? $mainImage['id'] : null;
// } else {
// // 🟢 حالت ایجاد: currentImages خالی است، اما newImageFiles می‌تواند پر باشد
// $this->currentImages = [];  // آرایه خالی، نه کالکشن
// $this->mainImageId = null;


// // نکته: در حالت ایجاد، ما تصاویر موقت را به کاربر نمایش نمی‌دهیم،
// // مگر اینکه بخواهید منطق پیچیده‌تری برای نمایش Livewire Temporary Uploads پیاده‌سازی کنید.
// }

// // ✅ مودال باز می‌شود
// $this->showGalleryModal = true;
// }
// public function testSelectedId()
// {
// dd($this->selected_id);
// }

// =======================
// تابع باز کردن مودال گالری
// =======================
public function openGalleryModal($roomTypeId = null)
{
// استفاده از selected_id در صورت عدم ارسال پارامتر
$this->roomTypeId = $roomTypeId ?? $this->selected_id;

// اگر هنوز null بود، مودال باز نشود
if (!$this->roomTypeId) {
session()->flash('error', 'نوع اتاق انتخاب نشده است.');
return;
}
// $this->dispatchBrowserEvent('openGalleryModal');

 // ریست کپشن‌ها
$this->reset(['tempCaptions']);

// بارگذاری تصاویر موجود از جدول room_images
$images = RoomImage::where('room_type_id', $this->roomTypeId)
->orderBy('image_order')
 ->get();

// تبدیل به آرایه Livewire-friendly
$this->currentImages = $images->map(function ($img) {
return [
'id' => $img->id,
'caption' => $img->caption,
'image_url' => $img->image_url,
'image_order' => $img->image_order,
'is_main' => $img->is_main,
];
})->values()->all();

// تعیین تصویر اصلی
$mainImage = collect($this->currentImages)->firstWhere('is_main', true);
$this->mainImageId = $mainImage['id'] ?? null;

// باز کردن مودال
$this->showGalleryModal = true;

}
// public function openGalleryModal($roomTypeId = null)
// {
// dd("OPEN", $roomTypeId);
// }
// public function testButton()
// {
// dd('BUTTON CLICKED');
// }
// public function openGalleryModal($id = null)
// {
// dd([
// 'selected_id' => $this->selected_id,
// 'roomTypeId (param)' => $id,
// 'roomTypeId (property)' => $this->roomTypeId,
// ]);
// }



public function saveGalleryChanges()
{
// اعتبارسنجی سبک (برای فایل‌های جدید و کپشن‌ها)
$this->validate([
'newImageFiles.*' => 'nullable|image|max:2048',
'tempCaptions.*' => 'nullable|string|max:255',
]);

// حالت ایجاد: اگر هنوز roomTypeId نداریم -> فقط مودال را ببند و فایل‌ها را نگه دار (موقت)
if (!$this->roomTypeId) {
// فایل‌ها هم‌اکنون در $this->newImageFiles قرار دارند (TemporaryUploadedFile)
$this->reset(['tempCaptions']); // فقط کپشن‌های فرم مودال را ریست کن یا نگه دار طبق نیاز
session()->flash('success_message', 'تصاویر گالری به صورت موقت ذخیره شدند. جهت ثبت نهایی، دکمه ذخیره را در فرم اصلی بزنید.');
$this->showGalleryModal = false;
// session()->flash('message', 'تغییرات گالری به صورت موقت ذخیره شد. جهت ثبت نهایی، دکمه ذخیره را در فرم اصلی بزنید.');
// $this->emit('showAlert', 'تغییرات گالری به صورت موقت ذخیره شد. جهت ثبت نهایی، دکمه ذخیره را در فرم اصلی بزنید.');
// $this->galleryMessage = 'تغییرات گالری با موفقیت ذخیره شد (موقت).';


return;
}

// حالت ویرایش (roomTypeId موجود): تصاویر را از newImageFiles به دیسک منتقل و در دیتابیس ذخیره کن
DB::beginTransaction();

try {
if (!empty($this->newImageFiles)) {
$lastOrder = RoomImage::where('room_type_id', $this->roomTypeId)->max('image_order') ?? 0;

foreach ($this->newImageFiles as $index => $file) {
// store و ساخت URL
$path = $file->store('public/room_images_gallery');
$caption = $this->tempCaptions[$index] ?? null;

RoomImage::create([
'room_type_id' => $this->roomTypeId,
'image_url'=> Storage::url($path),
'caption'=> $caption,
'image_order' => ++$lastOrder,
]);
}

// فایل‌های موقت آپلود شده را پاک می‌کنیم (چون اکنون دائمی شدند)
$this->reset(['newImageFiles', 'tempCaptions']);
}

// بروزرسانی کپشن تصاویر قبلی (اگر کاربر آن‌ها را ویرایش کرده)
if ($this->currentImages && $this->currentImages->count() > 0) {
foreach ($this->currentImages as $img) {
RoomImage::where('id', $img->id)
->update(['caption' => $img->caption ?? null]);
}
}

// -----------------------------------------------------------
// 🏆 منطق به‌روزرسانی is_main (تصویر اصلی) 🏆
// -----------------------------------------------------------
if ($this->roomTypeId) {

// الف) تمام تصاویر را ابتدا به غیر اصلی (is_main = false) تبدیل کن
RoomImage::where('room_type_id', $this->roomTypeId)
->update(['is_main' => false]);

// ب) اگر یک تصویر اصلی انتخاب شده است ($mainImageId تنظیم شده است)
if ($this->mainImageId) {

// تصویر انتخاب شده را به اصلی (is_main = true) تبدیل کن
RoomImage::where('id', $this->mainImageId)
->where('room_type_id', $this->roomTypeId)
->update(['is_main' => true]);
}
}
// -----------------------------------------------------------

DB::commit();

// بارگذاری مجدد تصاویر و بستن مودال
$this->loadGalleryImages();
$this->showGalleryModal = false;
// 🏆 اضافه کردن پیغام موفقیت 🏆
session()->flash('success_message', 'تغییرات گالری با موفقیت ذخیره شد.');
// session()->flash('message', 'تغییرات گالری با موفقیت ذخیره شد.');

} catch (\Exception $e) {
DB::rollBack();
session()->flash('error', 'خطا در ذخیره‌سازی گالری: ' . $e->getMessage());
// throw $e; // در محیط تولید بهتر است لاگ کنید و پیام عمومی بدهید
}
}



public function closeGalleryModal()
{
// برای حالت ایجاد: newImageFiles را نگه می‌داریم تا بعداً در handleCreate ذخیره شوند.
// فقط کپشن‌های ورودی مودال را ریست می‌کنیم یا بسته به خواست شما نگه می‌داریم.
$this->tempCaptions = [];

// $this->reset(['tempCaptions']);
$this->showGalleryModal = false;
}
public function loadGalleryImages()
{
if (!$this->roomTypeId) {
$this->currentImages = collect();
$this->mainImageId = null;
return;
}

$this->currentImages = RoomImage::where('room_type_id', $this->roomTypeId)
->orderBy('image_order')
->get();

$main = $this->currentImages->firstWhere('is_main', true);
$this->mainImageId = $main ? $main->id : null;
}


/**
* متد حذف تصویر (حذف رکورد از دیتابیس و فایل فیزیکی)
*/
public function deleteImage($imageId)
{
$image = RoomImage::find($imageId);

if ($image) {
// حذف فیزیکی فایل
// تبدیل مسیر عمومی به مسیر خصوصی Storage برای حذف
$pathToDelete = str_replace('/storage/', 'public/', $image->image_url);
Storage::delete($pathToDelete);

$image->delete();

if ($this->mainImageId == $imageId) {
$this->mainImageId = null;
}
session()->flash('message', 'تصویر با موفقیت حذف شد.');
}
$this->openGalleryModal($this->roomTypeId); // بارگذاری مجدد گالری
}

// ----------------------------------------------------------------------
// ⬆️ پایان متدهای مدیریت گالری تصاویر ⬆️
// ----------------------------------------------------------------------


public function handleCreate()
{
// -----------------------------
// 1) اعتبارسنجی
// -----------------------------
$this->validate();

DB::beginTransaction();

try {

$roomData = [
'room_name' => $this->data['room_name'],
'max_quest' => $this->data['max_quest'],
'alt_image' => $this->data['alt_image'],
'room_size' => $this->data['room_size'],
'description' => $this->data['description'],
'room_priceusd' => $this->data['room_priceusd'],
];

$uploadedMainImage = $this->room_image; // شیء آپلود شده را در متغیر محلی نگه می‌داریم

// -----------------------------
// 2) مدیریت تصویر اصلی (آپلود و آماده‌سازی مسیر)
// -----------------------------
$mainImagePath = "/storage/images/room_image/1.jpg"; // مسیر پیش‌فرض

if ($uploadedMainImage instanceof \Livewire\TemporaryUploadedFile) {
// آپلود فایل اصلی در دیسک
// 💡 اگر می‌خواهید همه عکس‌ها در پوشه 'public/room_images_gallery' باشند، از همین مسیر استفاده کنید.
$path = $uploadedMainImage->store('public/room_images_gallery');
$mainImagePath = Storage::url($path);
}

// مسیر نهایی تصویر اصلی را به RoomType اضافه می‌کنیم
$roomData['room_image'] = $mainImagePath;

// -----------------------------
// 3) ایجاد رکورد جدید اتاق
// -----------------------------
$room = RoomType::create($roomData);

$this->selected_id = $room->id;
$this->roomTypeId = $room->id;

// -----------------------------
// 🏆 4) ثبت تصویر اصلی در جدول RoomImage (is_main = true) 🏆
// -----------------------------
if ($uploadedMainImage instanceof \Livewire\TemporaryUploadedFile) {

RoomImage::create([
'room_type_id' => $room->id,
'image_url'  => $mainImagePath, // استفاده از مسیر آپلود شده
'caption' => $room->alt_image ?? 'تصویر اصلی',
'image_order' => 0, // ترتیب 0 برای تصویر اصلی (یا 1، هر طور که ترجیح می‌دهید)
'is_main' => true, // 🎉 این رکورد، تصویر اصلی است
]);
}

// -----------------------------
// 5) ذخیره گالری (در صورت وجود)
// -----------------------------
if (!empty($this->newImageFiles)) {
// ترتیب را از بزرگترین order موجود شروع می‌کنیم (که ممکن است 0 یا 1 باشد)
$lastOrder = RoomImage::where('room_type_id', $room->id)->max('image_order') ?? 0;

foreach ($this->newImageFiles as $index => $file) {
// ... (ذخیره فایل گالری) ...
$fileName = $file->hashName();
$path = $file->storeAs('public/room_images_gallery', $fileName);

RoomImage::create([
'room_type_id' => $room->id,
'image_url'  => Storage::url($path),
'caption' => $this->tempCaptions[$index] ?? '',
'image_order' => ++$lastOrder,
'is_main' => false, // تصاویر گالری باید false باشند
]);
}
}

DB::commit();

// -----------------------------
// 6) پیام موفقیت و ریست
// -----------------------------
$this->emit('showAlert', "نوع اتاق همراه با تصویر اصلی و گالری با موفقیت ثبت شد.");

$this->resetInput();
$this->reset(['newImageFiles', 'tempCaptions', 'room_image']); // ریست room_image ضروری است
$this->update = RoomType::all();
} catch (\Exception $e) {

DB::rollBack();
// 💡 لاگ‌کردن خطا می‌تواند به اشکال‌زدایی کمک کند
// \Log::error('خطا در ایجاد اتاق: ' . $e->getMessage());
$this->emit('showAlert', "خطا در ذخیره. عملیات لغو شد: " . $e->getMessage());
}
}


public function handleUpdate()
{
$this->validate();

DB::beginTransaction();

try {
$room = RoomType::findOrFail($this->selected_id);
$uploadedMainImage = $this->room_image;
$newImagePath = $room->room_image; // مسیر فعلی را نگه می‌داریم

// ----------------------------------------------------
// 1) بررسی و آپلود تصویر اصلی جدید (اگر فایل جدیدی انتخاب شده)
// ----------------------------------------------------
if ($uploadedMainImage instanceof \Livewire\TemporaryUploadedFile) {

// الف) آپلود فایل جدید و گرفتن مسیر آن
// 💡 بهتر است آن را در پوشه گالری ذخیره کنید تا همه تصاویر یکسان باشند
$path = $uploadedMainImage->store('public/room_images_gallery');
$newImagePath = Storage::url($path);

// ب) لغو وضعیت is_main برای تصاویر قبلی این اتاق در جدول RoomImage
RoomImage::where('room_type_id', $this->selected_id)
->update(['is_main' => false]);

// ج) ثبت تصویر جدید به عنوان تصویر اصلی (is_main=true)
RoomImage::create([
'room_type_id' => $this->selected_id,
'image_url'  => $newImagePath,
'caption' => $this->data['alt_image'] ?? 'تصویر اصلی',
'image_order' => 0, // ترتیب 0 یا 1 برای تصویر اصلی
'is_main' => true, // 🎉 تصویر جدید اصلی است
]);

// 💡 اگر می‌خواهید فایل فیزیکی تصویر اصلی قدیمی (اگر مسیرش در room_image ذخیره شده بود) را هم حذف کنید، منطق آن باید اینجا اضافه شود.
}

// ----------------------------------------------------
// 2) به‌روزرسانی رکورد RoomType در جدول اصلی
// ----------------------------------------------------
$room->update([
'room_name' => $this->data['room_name'],
'max_quest' => $this->data['max_quest'],
'alt_image' => $this->data['alt_image'],
'room_size' => $this->data['room_size'],
'description'  => $this->data['description'],
'room_priceusd' => $this->data['room_priceusd'],
'room_image'  => $newImagePath, // مسیر URL جدید یا قبلی
]);

DB::commit();

// 3) پیام موفقیت و ریست فرم
$this->emit('showAlert', "نوع اتاق با موفقیت به‌روزرسانی شد.");
$this->isUpdating = false;
$this->resetInput();
$this->reset(['room_image']); // ریست فایل آپلود شده
$this->update = RoomType::all(); // رفرش لیست

} catch (\Exception $e) {
DB::rollBack();
$this->emit('showAlert', "خطا در ویرایش: " . $e->getMessage());
}
}
// public function handleEdit($id)
// {
// $this->resetInput();
// $record = RoomType::findOrFail($id);
// $this->selected_id = $id;

// // 🟢 تغییر ۳: تنظیم ID برای گالری هنگام باز کردن فرم ویرایش
// $this->roomTypeId = $id;

// $this->data['room_name'] = $record->room_name;
// $this->data['max_quest'] = $record->max_quest;
// $this->data['alt_image'] = $record->alt_image;
// $this->room_image = $record->room_image;
// $this->data['room_size'] = $record->room_size;
// $this->data['description'] = $record->description;
// $this->data['room_priceusd'] = $record->room_priceusd;

// $this->isUpdating = true;
// }
// public function handleEdit($id)
// {
// $this->resetInput();
// $record = RoomType::findOrFail($id);

// $this->selected_id = $id;
// $this->roomTypeId = $id; // ← فقط همین، بدون هیچ متن اضافی

// // پر کردن فرم
// $this->data['room_name'] = $record->room_name;
// $this->data['max_quest'] = $record->max_quest;
// $this->data['alt_image'] = $record->alt_image;
// $this->room_image = $record->room_image;
// $this->data['room_size'] = $record->room_size;
// $this->data['description']  = $record->description;
// $this->data['room_priceusd'] = $record->room_priceusd;

// $this->isUpdating = true;

// // بسیار مهم: گالری را هم لود کن اگر لازم است
// $this->currentImages = RoomImage::where('room_type_id', $id)
// ->orderBy('image_order')
// ->get()
// ->toArray(); // ← جلوگیری از گیر کردن Livewire
// }
// public function handleEdit($id)
// {
// $this->resetInput();
// $record = RoomType::findOrFail($id);

// $this->selected_id = $id;
// // $this->roomTypeId = $id;
// if (method_exists($this, 'openGalleryModal')) {
// $this->roomTypeId = $id;
// }

// // ✅ دقیقاً مثل کامپوننت working عمل کنید
// $this->data['id'] = $id; // این خط رو اضافه کنید
// $this->data['room_name'] = $record->room_name;
// $this->data['max_quest'] = $record->max_quest;
// $this->data['alt_image'] = $record->alt_image;
// $this->room_image = $record->room_image;
// $this->data['room_size'] = $record->room_size;
// $this->data['description'] = $record->description;
// $this->data['room_priceusd'] = $record->room_priceusd;

// $this->isUpdating = true;
// }
// =======================
// تابع handleEdit برای ویرایش نوع اتاق
// =======================
public function handleEdit($id)
{
$this->resetInput();
$record = RoomType::findOrFail($id);

// تنظیم selected_id
$this->selected_id = $id;

// مقداردهی roomTypeId برای مودال گالری
$this->roomTypeId = $id;

// پر کردن فرم
$this->data['id'] = $id;
$this->data['room_name'] = $record->room_name;
$this->data['max_quest'] = $record->max_quest;
$this->data['alt_image'] = $record->alt_image;
$this->room_image = $record->room_image;
$this->data['room_size'] = $record->room_size;
$this->data['description'] = $record->description;
$this->data['room_priceusd'] = $record->room_priceusd;

$this->isUpdating = true;

// 🔹 آماده‌سازی تصاویر موجود برای مودال (اختیاری، می‌توانید بعداً با openGalleryModal بارگذاری کنید)
$this->currentImages = RoomImage::where('room_type_id', $id)
->orderBy('image_order')
->get()
->map(function ($img) {
return [
'id' => $img->id,
'caption' => $img->caption,
'image_url' => $img->image_url,
'image_order' => $img->image_order,
'is_main' => $img->is_main,
];
})->values()->all();

$mainImage = collect($this->currentImages)->firstWhere('is_main', true);
$this->mainImageId = $mainImage['id'] ?? null;
}

public function resetInput()
{
// "id" => "", // ✅ مطمئن شید این وجود داره


// $this->data['id'] = null;
$this->data['room_name'] = null;
$this->data['max_quest'] = null;
$this->data['alt_image'] = null;
$this->room_image = null;
$this->data['room_size'] = null;
$this->data['description'] = null;
$this->data['room_priceusd'] = null;

// ➕ جدید: ریست پراپرتی‌های گالری
$this->room_image = null;
// $this->roomTypeId = null;
// $this->selected_id = null;
}

public function destroy($id)
{
$record = RoomType::where('id', $id);

// ➕ جدید: حذف تصاویر گالری مربوط به این نوع اتاق
RoomImage::where('room_type_id', $id)->get()->each(function ($image) {
$pathToDelete = str_replace('/storage/', 'public/', $image->image_url);
Storage::delete($pathToDelete);
});

$record->delete();
}

public function mount()
{
$this->update = RoomType::all();
}

public function render()
{
return view('livewire.panel.rooms.room-type')
->layout('layouts.panel');
}

public function changed()
{
$this->isUploading = true;
}
// public function simpleTest($id)
// {
// \Log::info("SimpleTest called with ID: " . $id);
// $this->selected_id = $id;
// $this->isUpdating = true;
// session()->flash('message', ' تست ساده کار کرد - ID: ' . $id);
// }
// public function resetInputAndCancelUpdate()
// {
// $this->resetInput();
// $this->isUpdating = false; // برگشت به حالت ایجاد
// $this->reset(['room_image', 'selected_id', 'newImageFiles', 'tempCaptions', 'roomTypeId']);
// $this->emit('showAlert', "عملیات ویرایش لغو شد.");
// }
protected $listeners = [
    'backToEdit' => 'returnToEditForm'
];

public function returnToEditForm()
{
    if ($this->selected_id) {
        $this->handleEdit($this->selected_id); // فرم ویرایش را دوباره باز می‌کند
    }
}
}
