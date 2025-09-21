
<div class="our-room text-center ptb-80 white-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb-75">
                    <h2>انواع <span>اتاق</span></h2>
                    {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered by injected humour.</p> --}}
                </div>
            </div>
        </div>
        <div class="card hover_shadow hover_up">
            {{-- <a href="/article/{{$results->id}}"> --}}
               <a href="{{$results1->id}}">
            <div class="p-0 over_hidden card-header h_10 d-flex align-items-center justify-content-center">
                <img src="{{$results1->room_image}}" width="320px" height="206px" alt="" class="h-100">

            </div>
            <div class="card-body px-1 py-2">
                <h5 class="text-center text-primary">{{$results1->alt_image}}</h5>
                {{-- <p class="text-justify text-right font_0_9 text-secondary h_85px">{{$results1->description}}</p> --}}
                {{-- <a href="{{$results1->id}}" class="btn btn-primary cursor_pointer_shadow rounded_5 px-3">جزئیات مشخصات</a> --}}
            </div>
            </a>
            </div>
    </div>
</div>



