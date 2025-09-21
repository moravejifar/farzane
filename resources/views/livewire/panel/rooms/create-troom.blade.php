
    <div class="col-sm-3 ">

        <section class="panel">
            <header class="panel-heading">
                ایجاد دسته بندی جدید

            </header>
            <div class="panel-body">
                <form class="form-horizontal" role="form" onsubmit="return false">
                    <div class="form-group col-lg-12">
                        <label class="col-lg-7" for="room_name">نوع اتاق</label>
                          <input class="form-control"  id="roomtype" name="roomtype" type="text" size="3px"
                              value=" نوع اتاق"  wire:model="data.room_name" />
                    {{-- {{$data['room_name']}} --}}
                    </div>
                    @error('data.room_name')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                    @enderror

                    <div class="form-group col-lg-12">
                        <label class="col-lg-10 " >تعداد مهمان</label>
                        <select value="1" name="max_quest" class="form-control"  wire:model="data.max_quest" value="" >
                            <option selected="selected">select</option>
                            {{-- <option value="1">1</option> --}}
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
                    @error('data.max_quest')
                        <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                    @enderror




                    <div class="form-group col-lg-12 ">
                        <label class="col-lg-10 " >تعداد تخت</label>
                        <select name="room_size" class="form-control "  wire:model="data.room_size" value="" >
                                <option selected="selected">select</option>
                                {{-- <option value="1">1</option> --}}
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                    </div>
                    @error('data.room_size')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                    @enderror

                    <div class="form-group col-lg-12">
                        <label class="col-lg-8" for="price">قیمت اتاق</label>
                            <input class=" form-control" id="price" name="price" type="text" size="3px"
                              value="قیمت اتاق"  wire:model="data.room_priceusd" />
                    </div>
                    @error('data.room_priceusd')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                    @enderror

                    <div class="form-group col-lg-12">
                        <label class="control-label col-lg-8 " for="altimage">کپشن تصویر</label>
                              <input class="form-control" id="altimage" name="altimage" type="text"
                              value="کپشن تصویر"  wire:model="data.alt_image" />
                    </div>
                    {{-- @error('data.alt_image')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                    @enderror --}}

                    <div class="form-group col-lg-12">
                        <label for="exampleInputFile" class="control-label col-lg-8">دریافت تصویر</label>
                        <input type="file" id="exampleInputFile3" style="padding-right: 5px;" wire:model="room_image">
                    </div>
                    @error('room_image')
                        <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                    @enderror

                    <div class="form-group col-lg-12">
                        <label class="col-lg-10 " for="description">توضیحات</label>
                            <textarea class="form-control col-lg-12 " id="ccomment" name="comment" value="توضیحات"   rows="2" wire:model="data.description"></textarea>
                            <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea> -->
                    </div>
                    @error('data.description')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                    @enderror

                    <div class="form-group col-lg-12 ">
                            {{-- <div class="col-lg-offset-2 col-lg-10"> --}}
                                <button wire:click="handleCreate()" class="btn btn-danger">ذخیره</button>
                            {{-- </div> --}}
                    </div>


                </form>

           </div>

        </section>

    </div>









