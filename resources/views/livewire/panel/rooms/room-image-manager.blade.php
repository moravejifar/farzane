<div class="p-6 bg-white shadow rounded-lg">

    <h2 class="text-xl font-bold mb-4">مدیریت تصاویر اتاق: {{ $roomType->name }}</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="saveImages">

        <div class="mb-6 p-4 border border-dashed rounded-lg bg-gray-50">
            <h3 class="text-lg font-semibold mb-3">۱. آپلود تصاویر جدید</h3>

            <input type="file" wire:model="newImageFiles" multiple class="block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-blue-50 file:text-blue-700
                hover:file:bg-blue-100"
            >

            @error('newImageFiles.*') <p class="text-red-500 text-xs mt-1">حداقل یک فایل باید تصویر و زیر ۲ مگابایت باشد.</p> @enderror

            @if (count($newImageFiles) > 0)
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach ($newImageFiles as $index => $file)
                        <div class="border p-3 rounded-lg bg-white">
                            @if ($file->temporaryUrl())
                                <img src="{{ $file->temporaryUrl() }}" alt="پیش نمایش" class="w-full h-24 object-cover rounded mb-2">
                            @endif
                            <label class="block text-sm font-medium text-gray-700 mb-1">کپشن تصویر:</label>
                            <input type="text"
                                   wire:model.defer="tempCaptions.{{ $file->getClientOriginalName() }}"
                                   placeholder="مثال: نمای تخت کینگ"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            >
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="p-4 border rounded-lg bg-white">
            <h3 class="text-lg font-semibold mb-3">۲. تصاویر فعلی ({{ $currentImages->count() }})</h3>

            @if ($currentImages->isEmpty())
                <p class="text-gray-500">تصویری برای این نوع اتاق وجود ندارد.</p>
            @endif

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                @foreach ($currentImages as $index => $image)
                    <div class="border p-2 rounded-lg relative transition duration-300 ease-in-out
                                {{ $image->is_main ? 'border-4 border-green-500 ring-4 ring-green-100' : 'border-gray-200' }}">

                        @if ($image->is_main)
                            <span class="absolute top-2 left-2 bg-green-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">اصلی</span>
                        @endif

                        <img src="{{ asset($image->image_url) }}" alt="{{ $image->caption }}" class="w-full h-28 object-cover rounded mb-2">

                        <label class="block text-xs font-medium text-gray-500 mb-1">کپشن/Alt Text:</label>
                        <input type="text"
                               wire:model.lazy="currentImages.{{ $index }}.caption"
                               class="block w-full rounded-md border-gray-300 shadow-sm text-sm p-1"
                               placeholder="کپشن"
                        >

                        <div class="flex items-center justify-between mt-2 pt-2 border-t border-gray-100">

                            <div class="flex items-center">
                                <input id="main-{{ $image->id }}" type="radio" wire:model="mainImageId" value="{{ $image->id }}" class="text-indigo-600 focus:ring-indigo-500">
                                <label for="main-{{ $image->id }}" class="ml-1 text-sm text-gray-700">اصلی باشد</label>
                            </div>

                            <button type="button" wire:click="deleteImage({{ $image->id }})" class="text-red-500 hover:text-red-700 text-xs font-medium p-1 rounded-md transition duration-150">
                                حذف
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150">
                ذخیره تمام تغییرات (آپلود و به روزرسانی)
            </button>
        </div>
    </form>
</div>
