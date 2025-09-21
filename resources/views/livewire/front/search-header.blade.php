<div>
    <!--Header section start-->

    <div class="header-section">

        <div class="bg-opacity"></div>
        <div class="top-header sticky-header">
            <div class="top-header-inner">
                <div class="container" style="direction: rtl">
                    <div class="mgea-full-width">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <div class="logo mt-15">
                                    <a href="index.html"><img src="{{ asset('images/logo/logo.png') }}" alt=""></a>
                                </div>
                            </div>

                            <div class="col-md-10 col-sm-10 hidden-xs">
                                <div class="header-top ptb-10">
                                    <div class="adresses">
                                        <div class="phone">
                                            <p>call <span>+012 345 678 102 </span></p>
                                        </div>
                                        <div class="email">
                                            <p>Email: <span>info@example.com</span></p>

                                        </div>
                                        {{-- <button type="submit">ورود</button>
                                            <button type="submit">ثبت نام</button> --}}
                                    </div>
                                    {{-- <div class="social-links">
                                            <a href="#"><i class="mdi mdi-facebook"></i></a>
                                            <a href="#"><i class="mdi mdi-rss"></i></a>
                                            <a href="#"><i class="mdi mdi-google-plus"></i></a>
                                            <a href="#"><i class="mdi mdi-pinterest"></i></a>
                                            <a href="#"><i class="mdi mdi-instagram"></i></a>
                                        </div> --}}
                                    <div class="social-links">
                                        @if (auth()->check())
                                            {{-- <div class=" ">
                                                {{auth()->user()->name}}
                                            </div> --}}

                                            <ul>
                                                <li class="mx-3 cursor_pointer_text_shadow font_1_1">
                                                    {{ auth()->user()->name }} خوش آمدبد
                                                    <span></span>
                                                </li>
                                                <li class="mx-3 cursor_pointer_text_shadow font_1_1">
                                                    <a href="/logout">خروج</< /a>
                                                        <span></span>
                                                </li>
                                            @else
                                                {{-- <div class=" "> --}}
                                                <li class="mx-3 cursor_pointer_text_shadow font_1_1">
                                                    <a href="/login">ورود</a>
                                                </li>
                                                {{-- </div> --}}

                                                {{-- <button type="submit">ثبت نام</button> --}}
                                                {{-- <div class=""> --}}
                                                <li class="mx-3 cursor_pointer_text_shadow font_1_1">
                                                    <a href="/register">ثبت نام</a>
                                                </li>
                                                {{-- </div> --}}
                                        @endif
                                        </ul>

                                    </div>
                                </div>
                                <div class="menu mt-25">
                                    <div class="menu-list hidden-sm hidden-xs">
                                        <nav>
                                            <ul>
                                                <li><a href="index.html">خانه</a></li>
                                                <li><a href="about-us.html">درباره ما</a></li>
                                                <li><a href="gallery.html">گالری</a></li>
                                                <li><a href="#">صفحات<i class="fa fa-angle-down"></i></a>
                                                    <ul class="dropdown_menu">
                                                        <li><a href="404.html">404</a></li>
                                                        <li><a href="booking-information.html">Booking Information</a>
                                                        </li>
                                                        <li><a href="personal-information.html">اطلاعات شخصی</a></li>
                                                        <li><a href="payment-information.html">Parment Information</a>
                                                        </li>
                                                        <li><a href="booking-done.html">Booking Done</a></li>
                                                        <li><a href="room-booking.html">رزرو اتاق</a></li>
                                                        <li><a href="news.html">اخبار</a></li>
                                                        <li><a href="gallery.html">گالری</a></li>
                                                        <li><a href="staff.html">Staff</a></li>
                                                        <li><a href="our-room.html">اتاق</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="/panel">ارتباط با ما</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="searchbox">
                                    <input class="nosubmit" type="text" placeholder="جستجو..."
                                        wire:model.debounce.1000ms="char" />

                                    <a href="/search/0/{{ $char }}" >{{ $char }}</a>
                                    {{-- @php --}}
                                    {{-- <div> --}}
                                    {{-- @if ($char!=='')
                                     @php
                                        $issearching='True';
                                      @endphp
                                   @endif --}}
                                    {{-- </div> --}}
                                    {{-- @endphp --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu start -->
            {{-- <div class="mobile-menu-area hidden-lg hidden-md">
                <div class="container">
                    <div class="col-md-12">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="index.html">home</a></li>
                                <li><a href="about-us.html">About</a></li>
                                <li><a href="gallery.html">Gallery</a></li>
                                <li><a href="#">pages</a>
                                    <ul>
                                        <li><a href="404.html">404</a></li>
                                        <li><a href="booking-information.html">Booking Information</a></li>
                                        <li><a href="personal-information.html">Personal Information</a></li>
                                        <li><a href="payment-information.html">Parment Information</a></li>
                                        <li><a href="booking-done.html">Booking Done</a></li>
                                        <li><a href="room-booking.html">Room booking</a></li>
                                        <li><a href="news.html">News</a></li>
                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="staff.html">Staff</a></li>
                                        <li><a href="our-room.html">Room</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html">contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div> --}}

            <!-- Mobile menu end -->
        </div>

        <!--Welcome secton-->
        {{-- @if (!($issearching)) --}}
        {{-- @if ($char=='') --}}
        {{-- @include('livewire.front.mobilemenu') --}}
        {{-- @endif --}}
        {{-- <div class="welcome-section">
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
        </div> --}}
    </div>
    <!-- Header section end -->
</div>

