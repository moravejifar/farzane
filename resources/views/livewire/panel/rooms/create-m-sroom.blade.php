<div class="col-sm-4">
    <section class="panel">
        <header class="panel-heading">مدیریت وضعیت اتاق</header>

        <div class="panel-body">
            {{-- @auth
    @if(in_array(auth()->user()->role, ['admin', 'receptionist'])) --}}

            <form class="form-horizontal" wire:submit.prevent="handleCreate">

                {{-- انتخاب شماره اتاق --}}
                <div class="form-group col-lg-12">
                    <label for="room_id" class="col-lg-8">انتخاب شماره اتاق</label>
                    <select wire:model="room_id" class="form-control" wire:key="room-select">
                        <option value="">انتخاب اتاق</option>
                        @foreach ($rooms as $room)

                            <option value="{{ $room->room_id }}" wire:key="room-{{ $room->room_id}}">
                                {{ $room->room_number }}
                            </option>
                        @endforeach
                    </select>
                    @error('room_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- نمایش وضعیت فعلی اتاق --}}
                @if ($currentStatusName)
                    <div class="alert alert-info text-center">
                        وضعیت فعلی: <strong>{{ $currentStatusName }}</strong>
                    </div>
                @endif

                {{-- انتخاب وضعیت جدید --}}
                <div class="form-group col-lg-12">
                    <label for="selectedStatusId" class="col-lg-8">وضعیت جدید اتاق</label>
                    <select wire:model="selectedStatusId" class="form-control">
                        <option value="">انتخاب وضعیت جدید</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->status_id }}">
                                {{ $status->status_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('selectedStatusId')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- فیلد تاریخ شروع وضعیت --}}
                <div class="form-group col-lg-12">
                    <label for="starttime" class="col-lg-8">شروع وضعیت</label>
                    <div class="date-input-wrapper">
                        <input id="starttime" type="text" class="form-control" placeholder="تاریخ شروع وضعیت"
                            data-jdp autocomplete="off" wire:model.lazy="data.StartDateTime">
                        <i class="icon-calendar calendar-icon-wrapper"></i>
                    </div>
                    @error('data.StartDateTime')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- فیلد تاریخ پایان وضعیت --}}
                <div class="form-group col-lg-12">
                    <label for="endtime" class="col-lg-8">پایان وضعیت</label>
                    <div class="date-input-wrapper">
                        <input id="endtime" type="text" class="form-control" placeholder="تاریخ پایان وضعیت"
                            data-jdp autocomplete="off" wire:model.lazy="data.EndDateTime">
                        <i class="icon-calendar calendar-icon-wrapper"></i>
                    </div>
                    @error('data.EndDateTime')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @auth
                    <div class="alert alert-secondary text-center">
                        کاربر تغییر دهنده: <strong>{{ auth()->user()->name }}</strong>
                    </div>
                @endauth
                ّ
                {{-- کاربر تغییر دهنده --}}
                {{-- <div class="form-group col-lg-12">
                    <label for="UpdatedBy" class="col-lg-8">کاربر تغییر دهنده</label>
                    <input id="UpdatedBy" type="text" class="form-control" placeholder="نام کاربر"
                        wire:model.lazy="data.UpdatedBy">
                    @error('data.UpdatedBy')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> --}}

                {{-- دکمه ذخیره --}}
                <div class="form-group col-lg-12 text-center">
                    <button type="submit" class="btn btn-danger">ذخیره</button>
                </div>

                {{-- پیام موفقیت --}}
                @if (session('success'))
                    <div class="alert alert-success text-center mt-3">
                        {{ session('success') }}
                    </div>
                @endif

            </form>
            {{-- @else
        <div class="alert alert-warning text-center">
            شما اجازه تغییر وضعیت اتاق‌ها را ندارید.
        </div>
    @endif
@else
    <div class="alert alert-warning text-center">
        لطفاً وارد حساب کاربری شوید تا بتوانید وضعیت اتاق‌ها را تغییر دهید.
    </div>
@endauth --}}







        </div>
    </section>
</div>
