
                            <div class="col-md-4">
                                {{-- <livewire:front.mobilemenu/> --}}
                                {{-- <style>
                                    .h_85px{

                                        height:85px !important;
                                        overflow: hidden;
                                    }
                                 </style> --}}
                                <div class="single-room">
                                    <div class="room-img">
                                        {{-- @if ({{$room->room_image}})
                            <img src="{{ $user_image->temporaryUrl() }}" class="img img-circle d-block mb-2"   width="50px" height="50px">
                            {{ $user_image->temporaryUrl() }}
                            {{$isUploaded}}
                            @else
                            <div style="padding-right: 5.60cm; direction:rtl"  >
                                <img src="{{ $user_image }}" class="img img-circle d-block mb-2"   width="50px" height="50px" >
                            </div>
                            @endif --}}

                                        <a href="#"><img src="{{$room->room_image}}" width="370px" height="256px" alt=""></a>
                                        {{-- <a href="#"><img src="storage/images/rooms/{{$room->room_image}}" alt=""></a> --}}
                                    </div>
                                    <div class="room-desc">
                                        <div class="room-name">
                                            <h3><a href="#">{{$room->room_name}}</a></h3>
                                        </div>
                                        <div class="room-rent h_85px">
                                            <h5>{{$room->cost }} / <span>{{$room->alt_image}}</span></h5>
                                            <p class=" h_85px">
                                                {{-- {{$room->description }} --}}
                                            </p>
                                        </div>
                                        <div class="room-book">
                                            {{-- <a href="/roombook/{{$room->roomtype_id}}" class=" cursor_pointer_shadow rounded_5px-3">Book now</a> --}}
                                            <a href="/roombook/{{$room->id}}" class=" cursor_pointer_shadow rounded_5px-3">نمایش جزئیات</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
