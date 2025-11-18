
<div>
    <x-slot name="title">
        - اتاق ها
    </x-slot>

    <!--main content start-->
    <div class="col-sm-8">
        <section class="panel">
            <header class="panel-heading">
               جدول نمایش اتاق ها
            </header>
            <table class="table table-striped" style="width: 25cm; line-height:50px;">
                <thead>
                    <tr>
                        <th class="col-lg-1"  > شناسه اتاق </th>
                        {{-- <th class="col-lg-10" style="padding-right: 40px" > شناسه اتاق </th> --}}
                        <th class="col-lg-1" > نوع اتاق</th>
                        <th class="col-lg-1" >شماره اتاق</th>
                        <th class="col-lg-1" >طبقه اتاق</th>
                        <th class="col-lg-1">وضعیت اتاق</th>
                        <th class="col-lg-3">توضیحات</th>
                        {{-- <th class="col-lg-3">کپشن تصویر</th> --}}
                        {{-- <th class="col-lg-2">تصویر</th> --}}
                        <th class="col-lg-1">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roomname as $row)
                    <tr>
                        <td >{{$row->room_id}}</td>
                        {{-- <td > {{$row->id}}</td> --}}
                        <td>{{$row->room_type->room_name}}</td>
                        <td>{{$row->room_number}}</td>
                        <td>{{$row->floor_number}}</td>
                        <td>{{$row->room_status->status_name}}</td>
                        <td>{{$row->description}}</td>
                        {{-- <td>{{$row->alt_image}}</td> --}}
                        {{-- <td> </td> --}}

                        <td>
                        <button type="button" class="btn btn-primary btn-xs" ><i class="icon-pencil" wire:click="handleEdit({{$row->room_id}})"></i></button>
                        <button type="button" class="btn btn-danger btn-xs"><i class="icon-trash " wire:click="destroy({{$row->room_id}})" ></i></button>
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
                        @include('livewire.panel.rooms.update-room')
                    @else
                        @include('livewire.panel.rooms.create-room')
                    @endif


</div>




