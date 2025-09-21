<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\front\Index\Roombook;
use App\Http\Livewire\front\Index\facilityCard;
use App\Http\Livewire\front\Index\Index;
use App\Http\Livewire\front\Index\Search;
use App\Http\Livewire\Panel\PanelIndex;
use App\Http\Livewire\Panel\Users\Index2;
use App\Http\Livewire\Panel\Users\Create;
use App\Http\Livewire\Panel\Users\Edit;
use App\Http\Livewire\Panel\Rooms\RoomType;
use App\Http\Livewire\Panel\Rooms\StatusRoom;
use App\Http\Livewire\Panel\Rooms\Room;
use App\Http\Livewire\Panel\facilities\facility;
use App\Http\Livewire\Panel\facilities\facilityType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Panel\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|------------- -------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login',Login::class)->name('login')->middleware('guest');
Route::get('/register',Register::class)->name('register')->middleware('guest');
Route::get('/logout', function(){
Auth::logout();
return redirect('/');
});
Route::get('/',Index::class)->name('site');
Route::get('/roombook/{roomtype_id}',Roombook::class)->name('roombook');
Route::get('/facility-card/{facilitytype_id}',facilityCard::class)->name('facility-card');
Route::get('/panel',PanelIndex::class)->name('panel');
// Route::get('/panel/users',[UserController::class,'index'])->name('user');
Route::get('/panel/users',Index2::class)->name('users')->middleware(['auth']);;
Route::get('/panel/users/create',Create::class)->name('create')->middleware(['auth']);
Route::get('/panel/users/edit/{id}',Edit::class)->name('edit')->middleware(['auth']);
Route::get('/panel/rooms/roomType',roomType::class)->name('roomType')->middleware(['auth']);
Route::get('/panel/rooms/statusRoom',statusRoom::class)->name('statusRoom')->middleware(['auth']);
Route::get('/panel/rooms/room',room::class)->name('room')->middleware(['auth']);
Route::get('/panel/facilities/facility',facility::class)->name('facility')->middleware(['auth']);
Route::get('/panel/facilities/facility-type',facilityType::class)->name('facilityType')->middleware(['auth']);
Route::get('/search/{catId}/{char?}',Search::class);



