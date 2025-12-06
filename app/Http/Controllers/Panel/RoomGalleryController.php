<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\RoomImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class RoomGalleryController extends Controller
{
    // صفحه ویرایش گالری یک نوع اتاق
    public function edit(RoomType $roomType)
    {
        // دریافت تصاویر موجود
        $images = RoomImage::where('room_type_id', $roomType->id)
            ->orderBy('image_order')
            ->get();

        return view('panel.room.gallery', compact('roomType', 'images'));
    }

    // ذخیره تغییرات گالری
    public function update(Request $request, RoomType $roomType)
    {
        $request->validate([
            'new_images.*' => 'nullable|image|max:2048',
            'captions.*' => 'nullable|string|max:255',
            'main_image' => 'nullable|integer',
        ]);

        DB::beginTransaction();
        try {
            // 1) آپلود تصاویر جدید
            if ($request->hasFile('new_images')) {
                $lastOrder = RoomImage::where('room_type_id', $roomType->id)->max('image_order') ?? 0;

                foreach ($request->file('new_images') as $index => $file) {
                    $path = $file->store('public/room_images_gallery');
                    $caption = $request->input('captions')[$index] ?? '';

                    RoomImage::create([
                        'room_type_id' => $roomType->id,
                        'image_url' => Storage::url($path),
                        'caption' => $caption,
                        'image_order' => ++$lastOrder,
                        'is_main' => false,
                    ]);
                }
            }

            // 2) بروزرسانی کپشن‌ها و تصویر اصلی
            if ($request->input('existing')) {
                foreach ($request->input('existing') as $id => $caption) {
                    RoomImage::where('id', $id)->update(['caption' => $caption]);
                }
            }

            // 3) تنظیم تصویر اصلی
            RoomImage::where('room_type_id', $roomType->id)->update(['is_main' => false]);
            if ($request->filled('main_image')) {
                RoomImage::where('id', $request->input('main_image'))
                    ->where('room_type_id', $roomType->id)
                    ->update(['is_main' => true]);
            }

            DB::commit();

            return redirect()->route('panel.room.gallery', $roomType->id)
                ->with('success', 'گالری با موفقیت به‌روزرسانی شد.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'خطا در ذخیره گالری: ' . $e->getMessage());
        }
    }

    // حذف یک تصویر
    public function destroy(RoomImage $image)
    {
        $roomTypeId = $image->room_type_id;
        $pathToDelete = str_replace('/storage/', 'public/', $image->image_url);
        Storage::delete($pathToDelete);
        $image->delete();

        return redirect()->route('panel.room.gallery', $roomTypeId)
            ->with('success', 'تصویر با موفقیت حذف شد.');
    }
}
