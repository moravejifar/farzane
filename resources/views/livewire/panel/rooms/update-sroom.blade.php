{{-- <div class="row">
    <div class="col-lg-12">
       <section class="panel"> --}}
        <div class="col-sm-4">

            <section class="panel">
                <header class="panel-heading">
                    ویرایش وضعیت اتاق

                </header>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" onsubmit="return false">
                        <div class="form-group col-lg-12">
                            <label class="col-lg-7" for="status_id">شناسه وضعیت اتاق</label>
                              <input class="form-control"  id="status_id" name="status_id" type="text" size="3px"
                                  value=" شناسه وضعیت اتاق"  wire:model="data.status_id" />
                        {{-- {{$data['room_name']}} --}}
                        </div>
                        @error('data.status_id')
                        <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                        @enderror

                        <div class="form-group col-lg-12">
                            <label class="col-lg-7" for="status_name">وضعیت اتاق</label>
                              <input class="form-control"  id="status_name" name="status_name" type="text" size="3px"
                                  value=" وضعیت اتاق"  wire:model="data.status_name" />
                        {{-- {{$data['room_name']}} --}}
                        </div>
                        @error('data.status_name')
                        <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                        @enderror

                        <div class="form-group col-lg-12">
                            <label class="col-lg-10 " for="description">توضیحات</label>
                                <textarea class="form-control col-lg-12 " id="ccomment" name="comment" value="توضیحات"   rows="3" wire:model="data.status_description"></textarea>
                                <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea> -->
                        </div>
                        @error('data.status_description')
                        <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                        @enderror


                        <div class="form-group col-lg-12">

                            {{-- <div class="form-group"> --}}
                            {{-- <div class="col-lg-offset-2 col-lg-10"> --}}
                            <button wire:click="handleUpdate()" class="btn btn-danger">ویرایش</button>
                            {{-- </div> --}}
                        </div>

                </form>
        </div>
        </section>
        </div>

