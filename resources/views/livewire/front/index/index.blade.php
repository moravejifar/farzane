
   {{-- <livewire:front.header/> --}}
    {{-- <livewire:front.header2/> --}}

<div>

    {{-- <livewire:front.mobilemenu/> --}}
<!--Our Room start-->
<div class="our-room text-center ptb-80 white-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb-75">
                    <h2>انواع <span>اتاق</span></h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered by injected humour.</p>
                </div>
            </div>
        </div>
        <div class="our-room-show">
            <div class="row">
                <div class="carousel-list">
                    @foreach($newRooms as $new1)
                    <livewire:front.index.roomtype-card :room="$new1"/>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!--Our room end-->

<!--Our services start-->
    <div class="our-sevices text-center ptb-80 white_bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title mb-80">
                            <h2>انواع <span>خدمات</span></h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered by injected humour.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-services-list">
                <div class="container-fluid">
                    <div class="row">
                        @foreach($newFacility_type as $new2)
                        <livewire:front.index.facilitytype-card :facility_type="$new2"/>
                        @endforeach
                    </div>
                </div>
            </div>
     </div>
     <!--Our services end-->


     <!--Our staff start-->
     <div class="our-staff text-center pb-80 white_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb-80">
                        <h2>our <span>Staff</span></h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered by injected humour.</p>
                    </div>
                </div>
            </div>
            {{-- <div class="staff-list">
                <div class="row">
                    <div class="carousel-list">
                        @foreach($newFacility as $new3)
                        <livewire:front.index.facility-card :facility_type="$new3"/>
                        @endforeach
                    </div>
                </div>
            </div> --}}
        </div>
     </div>
    <!--Our staff end-->
    </div>
