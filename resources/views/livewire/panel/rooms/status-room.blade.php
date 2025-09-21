
<div>
    <x-slot name="title">
        - دسته بندی
    </x-slot>

    <!--main content start-->
    <div class="col-sm-9">
        <section class="panel">
            <header class="panel-heading">
                جدول وضعیت اتاق ها
            </header>
            <table class="table table-striped" style="width: 25cm; line-height:50px;">
                <thead>
                    <tr>
                        <th class="col-lg-1" > شناسه وضعیت اتاق</th>
                        <th class="col-lg-1" >وضعیت اتاق</th>
                        <th class="col-lg-1" >توضیحات</th>
                        <th class="col-lg-1">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($update as $row)
                    <tr>
                        <td>{{$row->status_id}}</td>
                        <td>{{$row->status_name}}</td>
                        <td>{{$row->status_description}}</td>
                        {{-- <td> </td> --}}

                        <td>
                        <button type="button" class="btn btn-primary btn-xs" ><i class="icon-pencil" wire:click="handleEdit({{$row->status_id}})"></i></button>
                        <button type="button" class="btn btn-danger btn-xs"><i class="icon-trash " wire:click="destroy({{$row->status_id}})" ></i></button>
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
                        @include('livewire.panel.rooms.update-sroom')
                    @else
                        @include('livewire.panel.rooms.create-sroom')
                    @endif


</div>

    {{-- <div class="col-sm-4"> --}}


    {{-- </div> --}}
    <!--main content end-->


