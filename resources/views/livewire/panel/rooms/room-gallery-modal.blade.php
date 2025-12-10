@extends('layouts.app')

@section('content')
    <div class="container">
        @livewire('panel.rooms.room-gallery-modal.blade', ['roomTypeId' => $roomId])

        <a href="{{ route('rooms.index') }}" class="btn btn-secondary mt-4">بازگشت به لیست اتاق‌ها</a>
    </div>
@endsection
