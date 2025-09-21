<div class="col-sm-3 ">

    <section class="panel">
        <header class="panel-heading">
            ایجاد دسته بندی جدید

        </header>
        <div class="panel-body">
            <form class="form-horizontal" role="form" onsubmit="return false">
                <div class="form-group col-lg-12">
                    <label class="col-lg-7" for="facility_type_name">نوع تسهیلات</label>
                      <input class="form-control"  id="facility_type_name" name="facility_type_name" type="text" size="3px"
                          value=" "نوع تسهیلات"  wire:model="data.facility_type_name" />
                {{-- {{$data['room_name']}} --}}
                </div>
                @error('data.facility_type_name')
                <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror

                <div class="form-group col-lg-12">
                    <label class="col-lg-8" for="facility_loc">آدرس تسهیلات</label>
                      <input class="form-control"  id="facility_loc" name="facility_loc" type="text" size="3px"
                          value=" "آدرس تسهیلات"  wire:model="data.facility_loc" />
                {{-- {{$data['room_name']}} --}}
                </div>
                @error('data.facility_loc')
                <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror

                <div class="form-group col-lg-12">
                    <label class="col-lg-10 " >امتیاز تسهیلات</label>
                    <select value="1" name="facility_rank" class="form-control"  wire:model="data.facility_rank" value="" >
                        <option selected="selected">select</option>
                        {{-- <option value="1">1</option> --}}
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                @error('data.facility_rank')
                    <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror

                <div class="form-group col-lg-12">
                    <label class="col-lg-8" for="price">قیمت تسهیلات</label>
                        <input class=" form-control" id="price" name="price" type="text" size="3px"
                          value="قیمت تسهیلات"  wire:model="data.facility_priceusd" />
                </div>
                @error('data.facility_priceusd')
                <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror


                <div class="form-group col-lg-12">
                    <label class="control-label col-lg-8 " for="alt_image">کپشن تصویر</label>
                          <input class="form-control" id="alt_image" name="alt_image" type="text"
                          value="کپشن تصویر"  wire:model="data.alt_image" />
                </div>
                {{-- @error('data.alt_image')
                <small class="d-block text-danger w-100 text-center">{{ $message }} </small>
                @enderror --}}

                <div class="form-group col-lg-12">
                    <label for="exampleInputFile" class="control-label col-lg-8">دریافت تصویر</label>
                    <input type="file" id="exampleInputFile3" style="padding-right: 5px;" wire:model="facility_image">
                </div>
                @error('facility_image')
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
