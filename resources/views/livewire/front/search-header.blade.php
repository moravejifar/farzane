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
                                    <a href="index.html"><img src="{{ asset('images/logo/logo.png') }}"
                                            alt=""></a>
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
                                {{-- <div class="search-bar-container active " > --}}

                                <form wire:submit.prevent="doSearch" id="search-form-livewire" class="searchbox ">

                                    <input type="text" class="nosubmit" placeholder="search..."
                                        wire:model.live="char" wire:keydown.enter="doSearch" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu end -->
            </div>

        </div>
        <!-- Header section end -->
    </div>
