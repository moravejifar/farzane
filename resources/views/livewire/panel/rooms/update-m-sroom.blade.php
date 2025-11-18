<div class="col-sm-4">
    <section class="panel">
        <header class="panel-heading">ویرایش وضعیت اتاق</header>
        <div class="panel-body">
            <form wire:submit.prevent="update" class="form-horizontal">

                <div class="form-group col-lg-12">
                    <label class="col-lg-8">وضعیت جدید اتاق</label>
                    <select wire:model="data.StatusID" class="form-control">
                        <option value="">انتخاب وضعیت جدید</option>
                        @foreach ($statuses as $status)
                            <option value="{{ $status->status_id }}">{{ $status->status_name }}</option>
                        @endforeach
                    </select>
                    @error('data.StatusID') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-lg-12">
                    <label class="col-lg-8">شروع وضعیت</label>
                    <div class="date-input-wrapper">
                        <input id="starttime" type="text" class="form-control" placeholder="تاریخ شروع" data-jdp autocomplete="off" wire:model.lazy="data.StartDateTime">
                        <i class="icon-calendar calendar-icon-wrapper"></i>
                    </div>
                    @error('data.StartDateTime') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-lg-12">
                    <label class="col-lg-8">پایان وضعیت</label>
                    <div class="date-input-wrapper">
                        <input id="endtime" type="text" class="form-control" placeholder="تاریخ پایان وضعیت" data-jdp autocomplete="off" wire:model.lazy="data.EndDateTime">
                        <i class="icon-calendar calendar-icon-wrapper"></i>
                    </div>
                    @error('data.EndDateTime') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-success">ذخیره تغییرات</button>
                    <button type="button" wire:click="$emitUp('cancelEdit')" class="btn btn-secondary">انصراف</button>
                </div>

                @if (session('success'))
                    <div class="alert alert-success text-center mt-3">
                        {{ session('success') }}
                    </div>
                @endif
            </form>
        </div>
    </section>
</div>

