
<div>
    <x-slot name="title">
        - دسته بندی
    </x-slot>

    <!--main content start-->
    <div class="col-sm-8">
        <section class="panel">
            <header class="panel-heading">
                جدول دسته بندی
            </header>
            <table class="table table-striped" style="width: 25cm; line-height:50px;">
                <thead>
                    <tr>
                        <th class="col-lg-1" style="padding-right: 40px" >شناسه </th>
                        <th class="col-lg-1" > نوع اتاق</th>
                        <th class="col-lg-1" >تعداد مهمان</th>
                        <th class="col-lg-1" >تعداد تخت</th>
                        <th class="col-lg-1">قیمت اتاق</th>
                        {{-- <th>توضیحات</th> --}}
                        <th class="col-lg-2">کپشن تصویر</th>
                        {{-- <th class="col-lg-2">تصویر</th> --}}
                        <th class="col-lg-1">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($update as $row)
                    <tr>
                        <td ><img src="{{ $row->room_image }}" class="img img-circle d-block mb-2"   width="40px" height="40px" > {{$row->id}}</td>
                        <td style="padding-right: 10px"> {{$row->room_name}}</td>
                        <td>{{$row->max_quest}}</td>
                        <td>{{$row->room_size}}</td>
                        <td>{{$row->room_priceusd}}</td>
                        {{-- <td>{{$row->description}}</td> --}}
                        <td>{{$row->alt_image}}</td>
                        {{-- <td> </td> --}}

                        <td>
                        <button type="button" class="btn btn-primary btn-xs" ><i class="icon-pencil" wire:click="handleEdit({{$row->id}})"></i></button>
                        <button type="button" class="btn btn-danger btn-xs"><i class="icon-trash " wire:click="destroy({{$row->id}})" ></i></button>
                        {{-- <button class="btn btn-danger btn-xs"><i class="icon-trash " wire:click="deleteUser({{$newUser->id}})"></i></button> --}}
                        {{-- {{$row->id}} --}}
                        {{-- {{$row->room_priceusd}} --}}
                    </td>
                    </tr>

                  {{-- {{$row->alt_image}} --}}
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

                    @if ($isUpdating)
                        @include('livewire.panel.rooms.update-troom')
                    @else
                        @include('livewire.panel.rooms.create-troom')
                        {{-- @include('livewire.panel.rooms.room-image-manager') --}}
                    @endif


</div>

    {{-- <div class="col-sm-4"> --}}


    {{-- </div> --}}
    <!--main content end-->


