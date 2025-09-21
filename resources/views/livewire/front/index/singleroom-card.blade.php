<div class="col-md-4 hidden-sm col-xs-12">
    {{-- <livewire:front.mobilemenu/> --}}
    <div class="single-room">
        <div class="room-img">
            <a href="#"><img src="" alt=""></a>
        </div>
        <div class="room-desc">
            <div class="room-name">
             <h5>وضعیت اتاق: <span>
                <a href="#">
                    @if ( $singleroom->status_id=='1' )
                     <span>خالی</span></h5>
                     @elseif ($singleroom->status_id =='2')
                     <span>رزرو شده</span></h5>
                     @elseif ($singleroom->status_id=='3')
                     <span>در دست تعمیر</span></h5>
                     @elseif ($singleroom->status_id =='4')
                     <span>در حال آماده سازی</span></h5>
                    @endif
                </a>
            </h3>
            </div>
            <div class="room-rent">
                <h5>شماره اتاق: <span>{{$singleroom->room_number }}</span></h5>
            </div>
            <div class="room-rent">
                <h5>طبقه اتاق: <span>{{$singleroom->floor_number }}</span></h5>
            </div>
            <div class="room-book">
                <h3><span> <a href="#">
                    @if ( $singleroom->status_id=='1' )
                     رزرو کن
                     @else
                    غیر قابل رزرو
                    @endif
                </a></span></h3>
            </div>
        </div>
    </div>
</div>
