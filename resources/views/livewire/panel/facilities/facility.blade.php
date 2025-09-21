
<div>
    <x-slot name="title">
        - دسته بندی
    </x-slot>

    <!--main content start-->
    <div class="col-sm-9">
        <section class="panel">
            <header class="panel-heading">
                جدول تسهیلات
            </header>
            <table class="table table-striped" style="width: 25cm; line-height:50px;">
                <thead>
                    <tr>
                        <th class="col-lg-1" style="padding-right: 40px" >شناسه </th>
                        <th class="col-lg-2" > نوع تسهیلات</th>
                        <th class="col-lg-2" > نام تسهیلات</th>
                        <th class="col-lg-2" > آدرس تسهیلات</th>
                        <th class="col-lg-2" >کپشن تصویر</th>
                        <th class="col-lg-2" >امتیاز تسهیلات</th>
                        {{-- <th>توضیحات</th> --}}
                        {{-- <th class="col-lg-2">تصویر</th> --}}
                        <th class="col-lg-3">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($update as $row)
                    <tr>
                        <td ><img src="{{ $row->facility_image }}" class="img img-circle d-block mb-2"   width="40px" height="40px" > {{$row->facility_id}}</td>
                        <td style="padding-right: 10px"> {{$row->facility_type->facility_type_name}}</td>
                        <td>{{$row->facility_name}}</td>
                        <td>{{$row->facility_loc}}</td>
                        <td>{{$row->facility_alt}}</td>
                        <td>{{$row->facility_rank}}</td>
                        <td>
                        <button type="button" class="btn btn-primary btn-xs" ><i class="icon-pencil" wire:click="handleEdit({{$row->facility_id}})"></i></button>
                        <button type="button" class="btn btn-danger btn-xs"><i class="icon-trash " wire:click="destroy({{$row->facility_id}})" ></i></button>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

                    @if ($isUpdating)
                        @include('livewire.panel.facilities.update-facility')
                    @else
                        @include('livewire.panel.facilities.create-facility')
                    @endif


</div>

    {{-- <div class="col-sm-4"> --}}


    {{-- </div> --}}
    <!--main content end-->




