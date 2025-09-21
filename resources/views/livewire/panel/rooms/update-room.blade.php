{{-- <div class="row">
    <div class="col-lg-12">
       <section class="panel"> --}}
        <div class="col-sm-3">

            <section class="panel">
                <header class="panel-heading">
                   ویرایش اتاق
                </header>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" onsubmit="return  false">
                        <div class="form-group col-lg-12">
                            <label class="col-lg-8" for="price"> شناسه اتاق</label>
                            <input class=" form-control" id="room_id" name="room_id" type="text" size="3px" value="شناسه اتاق"
                                wire:model="data.room_id" />
                        </div>
                        @error('data.room_id')
                            <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                        @enderror

                        <div class="form-group col-lg-12">
                            <label class="col-lg-10 ">نوع اتاق</label>
                            <select value="1" name="room_name" class="form-control" wire:model="data.id" value="">
                                <option value="{{$data['id']}}">{{$room_name}}</option>
                                {{-- <option value="1">1</option> --}}
                                @foreach($type as $row)
                                <option value="{{$row->id}}">{{$row->room_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('data.room_name')
                            <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                        @enderror


                        <div class="form-group col-lg-12">
                            <label class="col-lg-8" for="price"> شماره اتاق</label>
                            <input class=" form-control" id="room_number" name="room_number" type="text" size="3px" value="شماره اتاق"
                                wire:model="data.room_number" />
                        </div>
                        @error('data.room_number')
                            <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                        @enderror
                        <div class="form-group col-lg-12">
                            <label class="col-lg-10 ">طبقه اتاق</label>
                            <select value="1" name="floor_number" class="form-control" wire:model="data.floor_number" value="">
                                <option selected="selected">select</option>
                                {{-- <option value="1">1</option> --}}
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        @error('data.floor_number')
                            <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                        @enderror

                        <div class="form-group col-lg-12">
                            <label class="col-lg-10 " for="description">توضیحات</label>
                            <textarea class="form-control col-lg-12 " id="ccomment" name="comment" value="توضیحات" rows="2"
                                wire:model="data.description"></textarea>
                            <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea> -->
                        </div>
                        @error('data.description')
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

