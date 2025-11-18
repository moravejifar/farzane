<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;

// Front
use App\Http\Livewire\front\Index\Index;
use App\Http\Livewire\front\Index\Roombook;
use App\Http\Livewire\front\Index\facilityCard;
use App\Http\Livewire\front\Index\Search;

// Panel
use App\Http\Livewire\Panel\PanelIndex;
use App\Http\Livewire\Panel\Users\Index2;
use App\Http\Livewire\Panel\Users\Create;
use App\Http\Livewire\Panel\Users\Edit;
use App\Http\Livewire\Panel\Rooms\RoomType;
use App\Http\Livewire\Panel\Rooms\StatusRoom;
use App\Http\Livewire\Panel\Rooms\MRoomStatus;
use App\Http\Livewire\Panel\Rooms\Room;
use App\Http\Livewire\Panel\Rooms\RoomImageManager;
use App\Http\Livewire\Panel\facilities\Facility;
use App\Http\Livewire\Panel\facilities\FacilityType;

// ---------------------------
// Authentication Routes
// ---------------------------
Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/register', Register::class)->name('register')->middleware('guest');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

// ---------------------------
// Frontend Routes
// ---------------------------
Route::get('/', Index::class)->name('site');
Route::get('/roombook/{roomtype_id}', Roombook::class)->name('roombook');
Route::get('/facility-card/{facilitytype_id}', facilityCard::class)->name('facility-card');
Route::get('/search/{catId}/{char?}', Search::class);

// ---------------------------
// Panel Routes (Livewire)
// ---------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/panel', PanelIndex::class)->name('panel');

    // Users
    Route::get('/panel/users', Index2::class)->name('users');
    Route::get('/panel/users/create', Create::class)->name('create');
    Route::get('/panel/users/edit/{id}', Edit::class)->name('edit');

    // Rooms
    Route::get('/panel/rooms/roomType', RoomType::class)->name('roomType');
    Route::get('/panel/rooms/statusRoom', StatusRoom::class)->name('statusRoom');
    Route::get('/panel/rooms/mRoomStatus', MRoomStatus::class)->name('mRoomStatus');
    Route::get('/panel/rooms/room', Room::class)->name('room');
    Route::get('/panel/rooms/room-image-manager', RoomImageManager::class)->name('roomImageManager');
// Route::get('/panel/rooms/room-image-manager/{roomType}', RoomImageManager::class)
    // ->name('room-image-manager');
    // Facilities
    Route::get('/panel/facilities/facility', Facility::class)->name('facility');
    Route::get('/panel/facilities/facility-type', FacilityType::class)->name('facilityType');

    // مسیر تست مینیمال
// Route::get('/panel/test', function () {
//     return view('panel.test');
// })->middleware(['auth']);
});

// ---------------------------
// Catch-all Frontend Route (در انتهای فایل)
// ---------------------------
Route::get('/{any}', Index::class)->where('any', '.*');
