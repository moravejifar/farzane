{{-- <livewire:front.header2/> --}}
{{-- @if ($issearching)
@include('livewire.front.mobilemenu')
@endif --}}

<main class="main container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <div class="tab__box">
                        {{-- <div class="tab__items">
                            <a class="tab__item is-active" href="{{ route('panel') }}">پیشخوان</a>|
                            <a class="tab__item is-active" href="{{ route('users') }}">همه کاربران</a>|
                            <a class="tab__item" href="{{ route('create') }}">افزودن کاربر جدید</a>
                        </div> --}}
                    </div>

                </header>
                <div class="panel-body">
                    <div class="section-title mb-75 center text-center">
                        <h2><span>موارد یافت شده</span></h2>
                        {{-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered by injected humour.</p> --}}
                    </div>

                    <div class="col-12 text-right">
                        <h4 class="pt-4 pb-1 text-info">انواع اتاق</h4>
                        <p>درانوع اتاق {{ $countresults1 }} مورد برای این جستجو یافت شده است.</p>

                        {{-- <p>{{ $countresults1 }}مورد در انوع داده یافت شد </p> --}}
                        <hr class="bg-light w-25 h_0_5 m-0 rounded_5">
                    </div>

                    <div class="our-room-show">
                        <div class="row">
                            <div class="our-room-list owl-pagination">
                                <div class="single-room-sapce">

                                    @foreach ($results1 as $result)
                                        <livewire:front.index.search-card :results1="$result">
                                    @endforeach
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-right">
                        <h4 class="pt-4 pb-1 text-info">انواع تسهیلات</h4>
                        <p class="pt-4 pb-1 text-info"> مورد در انواع تحصیلات یافت شد{{ $countresults2 }} </p>

                        <hr class="bg-light w-25 h_0_5 m-0 rounded_5">
                    </div>

                    @foreach ($results2 as $result)
                        <livewire:front.index.searchfa-card :results2="$result">
                    @endforeach

                </div>
            </section>
        </div>
    </div>
</main>
