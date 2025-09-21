<div>
    {{-- <livewire:front.mobilemenu/> --}}
    <!-- search bar Start -->
    <div class="search-bar animated slideOutUp">
     <div class="table">
         <div class="table-cell">
             <div class="container">
                 <div class="row">
                     <div class="col-sm-8 col-sm-offset-2">
                         <div class="search-form-wrap">
                             <button class="close-search"><i class="mdi mdi-close"></i></button>
                             <form action="#">
                                 <input type="text" placeholder="Search here..." value="Search here..."/>
                                 <button class="search-button" type="submit">
                                     <i class="fa fa-search"></i>
                                 </button>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- search bar End -->
 <!--Room Section Title start-->
 <div class="room-section text-center ptb-80 white_bg">
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="section-title mb-75">
                     {{-- {{$roomtype_id}} --}}
                    {{-- {{$singleroom->roomtype_id}}
                     <h2> {{$roomtype_id }} <span>اتاق های نوع </span></h2> --}}
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered by injected humour.</p>
                    {{-- {{ dd ($singleroom)}} --}}
                    {{-- {{ dd ($roomtype_id)}} --}}
                    </div>
             </div>
         </div>
         <div class="our-room-show">
             <div class="row">
                 <div class="our-room-list owl-pagination">
                     <div class="single-room-sapce">

                         @foreach($singleroom as $new1)
                         <livewire:front.index.singleroom-card :singleroom="$new1"/>
                         @endforeach
                     </div>


                 </div>
             </div>
         </div>
     </div>
 </div>
 <!--Room Section end-->
     <!--hotel team start-->
 {{-- <div class="hotel-team white_bg">
     <div class="container">
        <div class="row">
             <div class="col-md-12">
                 <div class="newsletter">
                     <div class="row">
                         <div class="col-md-6">
                             <div class="newsletter-title">
                                 <h2>SUBSCRIBE TO OUR NEWSLETTER</h2>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="newsletter-form">
                                 <form id="mc-form" class="mc-form" >
                                     <input id="mc-email" type="email" autocomplete="off" placeholder="Enter Address..." />
                                     <button id="mc-submit" type="submit">Subscribe</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </div> --}}
 <!--hotel team end-->
</div>

