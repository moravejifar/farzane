{{-- <div> --}}
<!--Welcome secton -->
        <div class="welcome-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-5">
                        <div class="booking-box">
                            <div class="booking-title">
                                <h3>رزرو یک اتاق</h3>
                                <p>لطفا، اتاق مورد نظر خود را رزرو نمائید.</p>
                            </div>
                            <div class="booking-form">

                                <form action="#">
                                    <div class="b-date arrive mb-15">
                                        <input class="date-picker" type="text" placeholder="تاریخ ورود">
                                        <i class="mdi mdi-calendar-text"></i>
                                    </div>

                                     <div class="b-date arrive mb-15">
                                        <input data-jdp  placeholder="تاریخ ورو222د">
                                        <i class="mdi mdi-calendar-text"></i>
                                    </div>
                                    <!-- JalaliDatePicker -->

        <div class="modal">

             <input data-jdp placeholder="only date" data-jdp-only-date />

        </div>

        <!-- JalaliDatePicker -->


                                     <div class="b-date arrive mb-15">
                                        <input class="date-picker" type="text" placeholder="تاریخ ورود">
                                        {{-- <input data-jdp type="text" class="form-control" placeholder="به js رجوع کنید" /> --}}

                                        <i class="mdi mdi-calendar-text"></i>
                                    </div>



                                    <div class="b-date departure mb-15">
                                        <input class="date-picker" type="text" placeholder="تاریخ عزیمت">
                                        <i class="mdi mdi-calendar-text"></i>
                                    </div>




                                    <div class="select-book mb-15">
                                        <select name="book" class="select-booking">
                                            <option value="" selected>بالغ</option>
                                            <option value="1">نوجوان</option>
                                            <option value="1">سالخورده</option>
                                        </select>
                                    </div>
                                    <div class="select-book  mb-30">
                                        <select name="book" class="select-booking">
                                            <option value="" selected>اتاق</option>
                                            <option value="1">اتاق 101</option>
                                            <option value="1">اتاق 102</option>
                                        </select>
                                    </div>
                                    <div class="submit-form">
                                        <button type="submit">بررسی امکان رزرو</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <div class="welcome-text">
                            <h2>
                                <span>خوش آمدید به </span> <span class="coloring">سایت هتل رویال</span>
                            </h2>
                            <h1 class="cd-headline clip">
                                <span>با بهترین</span>
                                <span class="cd-words-wrapper coloring">
                                    <b class="is-visible"> غذاهای سنتی </b>
                                    <b>اتاق ها و امکانات</b>
                                    <b>مکانهای دیدنی</b>
                                </span>
                            </h1>
                            <p class="welcome-desc">There are many variations of passages of Lorem Ipsum available,
                                but the majority have suffered alteration in some form, by injected humour, or
                                randomised words which don't look even slightly believable.</p>
                            <div class="explore">
                                <a href="#">EXPLORE IT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- JalaliDatePicker -->

    <script>
      jalaliDatepicker.startWatch({
        minDate: "attr",
        maxDate: "attr",
        minTime: "attr",
        maxTime: "attr",
        time: true,
        date: true,
        hasSecond: true,
        hideAfterChange: false,
        autoHide: true,
        showTodayBtn: true,
        showEmptyBtn: true,
        topSpace: 10,
        bottomSpace: 30,
        overflowSpace: -10,
        dayRendering(opt, input) {
          return {
            isHollyDay: opt.day == 1,
          };
        },
      });

      document.getElementById("aaa").addEventListener("jdp:change", function (e) {
        console.log(e);
      });
    </script>

            <!-- JalaliDatePicker -->
<!-- end Welcome secton-->
{{-- </div> --}}
