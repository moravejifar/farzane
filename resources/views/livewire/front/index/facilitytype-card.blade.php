<div class="col-md-3 col-sm-6 col-xs-12">
    {{-- <livewire:front.mobilemenu/> --}}
    <div class="single-services">
        <div class="services-img">
            <img src="{{$facility_type->facility_image}}" width="370px" height="256px"  alt="">
            {{-- <img src="storage/images/facility_type/{{$facility_type->facility_image}}" alt=""> --}}

            <div class="services-hover-desc">
                <div class="services-hover-inner">
                    <div class="services-hover-table">
                        <div class="services-hover-table-cell">
                            <h2>{{$facility_type->alt_image}}</h2>
                            <h2>{{$facility_type->facilitytype_id}}</h2>
                            <h2>مکان: {{$facility_type->facility_loc}}</h2>
                            <h2>امتیاز: {{$facility_type->facility_rank}}</h2>
                            <h2>قیمت: {{$facility_type->facility_priceusd}}</h2>

                            {{-- <h2>Breakfast & Buffet</h2> --}}
                            {{-- <p>There are many variations of passages Loem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="services-title">
        <a href="/facility-card/{{$facility_type->facilitytype_id}}" class=" cursor_pointer_shadow rounded_5px-3"><h4> {{$facility_type->facility_type_name}}-مشاهده جزئیات</h4></a>
     </div>
</div>
