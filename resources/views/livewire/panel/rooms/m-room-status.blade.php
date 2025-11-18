<div>
    <x-slot name="title">
        - دسته بندی
    </x-slot>

    <!--main content start-->
    <div class="col-sm-8">
        <section class="panel">
            <header class="panel-heading">
                جدول مدیریت وضعیت فعلی اتاق ها
            </header>
            <table class="table table-striped" style="width: 25cm; line-height:50px;">
                <thead>
                    <tr>
                        {{-- <th class="col-lg-1" > شناسه وضعیت اتاق</th> --}}
                        <th class="col-lg-2">شماره اتاق</th>
                        <th class="col-lg-2">وضعیت اتاق</th>
                        <th class="col-lg-2">شروع وضعیت</th>
                        <th class="col-lg-2">پایان وضعیت</th>
                        <th class="col-lg-2">کاربر تغییر دهنده</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $row)
                        <tr>
                            {{-- <td>{{ $row->RoomID }}</td> --}}
                            <td>{{ $row->room->room_number ?? '—' }}</td>
                            <td>{{ optional($row->status)->status_name }}</td>
                            <td>{{ $row->StartDateTime }}</td>
                            <td>{{ $row->EndDateTime ?? '—' }}</td>
                            <td>{{ optional($row->updatedBy)->name ?? 'نامشخص' }}</td>
                            {{-- </tr> --}}
                            {{-- <td>
                                <button type="button" class="btn btn-primary btn-xs"><i
                                        class="icon-pencil"></i></button>
                                <button type="button" class="btn btn-danger btn-xs"><i
                                        class="icon-trash "></i></button> --}}

                            {{-- </td> --}}
                            {{-- <td>
                                @if ($row->isEditable())
                                    <button wire:click="edit({{ $row->HistoryID }})" class="btn btn-primary btn-xs">
                                        <i class="icon-pencil"></i>
                                    </button>
                                    <button wire:click="delete({{ $row->HistoryID }})" class="btn btn-danger btn-xs">
                                        <i class="icon-trash"></i>
                                    </button>
                                @endif

                            </td> --}}
                            <td>
                                {{-- {{ $row->EndDateTime }} - Editable? {{ $row->isEditable() ? 'Yes' : 'No' }} --}}
                                @if ($row->isEditable())
                                    <button type="button" wire:click="edit({{ $row->HistoryID }})" class="btn btn-primary btn-xs">
                                        <i class="icon-pencil"></i>
                                    </button>
                                    <button type="button" wire:click="delete({{ $row->HistoryID }})" class="btn btn-danger btn-xs">
                                        <i class="icon-trash"></i>
                                    </button>
                                @endif
                            </td>
                    @endforeach
                    {{-- <td> --}}
                    </tr>

                </tbody>
            </table>
        </section>
    </div>


    @if ($isUpdating && $editingHistoryId)
        @livewire('panel.rooms.update-m-sroom', ['historyId' => $editingHistoryId], key('edit-' . $editingHistoryId))
    @else
        @livewire('panel.rooms.create-m-sroom')
    @endif


</div>
