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
                    <div class="form">




    <div id="searchedArticles" class="row justify-content-center col-12 m-auto px-0">

      {{-- <div class="col-12 row justify-content-center align-items-center mt-3 py-2">

        <div class="form-group ">
            <div class="col-lg-2">
            <label for="tittle" class="control-label .col-lg-4">عنوان را وارد کن</label>
            </div>

            <div class="col-lg-2">
          <input
            type="text"
            class="form-control rounded_5 placeholder_gray shadow-sm h_2_5"
            placeholder="عنوان رو وارد کن"
            wire:model.debounce.1000ms="char"
          />
          {{-- <a href="/search.html" class="fas fa-search search_btn"></a> --}}

            {{-- </div>
           <div class="col-lg-2">
             <select name="" id="" class="rounded_5 outline_0 h_2_5 border-0 form-control" wire:model="catId">
            <option value="0">انتخاب بر اساس نوع</option> --}}
            {{-- @foreach ($categories as $cat)
            <option value="{{$cat->id}}">{{$cat->title}}</option>
            @endforeach --}}
             {{-- </select> --}}
           {{-- </div> --}}
        {{-- </div> --}}
      {{-- </div> --}}

     </div>

      <div class="col-12 text-right">
        <h4 class="pt-4 pb-1 text-info">موارد یافت شده</h4>
        <hr class="bg-light w-25 h_0_5 m-0 rounded_5">
      </div>

        {{-- <div class="col-12 text-right">
            <h4 class="pt-4 pb-1 text-info">انواع اتاقها</h4>
            <hr class="bg-light w-25 h_0_5 m-0 rounded_5">
          </div> --}}


        @foreach ($results1 as $result)
        <livewire:front.index.search-card :results1="$result">
        {{-- <livewire:front.index.search-card :results="$result" :key="$results->id"> --}}
        @endforeach

        {{-- <div class="col-12 text-right">
            <h4 class="pt-4 pb-1 text-info">انواع تسهیلات</h4>
            <hr class="bg-light w-25 h_0_5 m-0 rounded_5">
          </div> --}}

        @foreach ($results2 as $result)
        <livewire:front.index.searchfa-card :results2="$result">
        {{-- <livewire:front.index.search-card :results="$result" :key="$results->id"> --}}
        @endforeach

        {{-- {{$results->links('livewire.utils.pagination-links')}} --}}

      </div>
    </div>
    </div>
</section>
</div>
</div>
</div>
</div>

  </main>




