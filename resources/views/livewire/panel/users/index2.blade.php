<x-slot name="title">
مدیریت کاربران
    </x-slot>

               <!-- page start-->
                <div class="row">
                    <div class="col-lg-8">
                        <section class="panel">
                            <header class="panel-heading">
                                <div class="tab__box">
                                    <div class="tab__items">
                                        <a class="tab__item is-active" href="{{ route('panel') }}">پیشخوان</a>|
                                        <a class="tab__item is-active" href="{{ route('users') }}">همه کاربران</a>
                                        <a class="tab__item" href="{{ route('create') }}">افزودن کاربر جدید</a>
                                    </div>
                                </div>

                            </header>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                    <tr>
                                        <th style="width: 8px;">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                        <th>شناسه</th>
                                        <th class="hidden-phone"style="padding-right: 50px">نام و نام خانوادگی</th>
                                        <th class="hidden-phone">ایمیل</th>
                                        <th class="hidden-phone">سطح کاربری</th>
                                        <th class="hidden-phone">تاریخ عضویت</th>
                                        {{-- <th class="hidden-phone">وضعیت حساب</th> --}}
                                        <th class="hidden-phone">عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($newUsers as $newUser)
                                    <tr class="odd gradeX">
                                        <td>
                                          <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td class="hidden-phone">{{ $newUser->id }}</td>
                                        <td>
                                            <img src="{{ $newUser->user_image }}" class="img img-circle d-block mb-2" width="40px" height="30px" aly="">
                                            &nbsp;&nbsp;
                                            <a href="{{ route('edit', $newUser->id) }}" class="text-primary">
                                                {{ $newUser->name }} {{ $newUser->lastname }}
                                            </a>
                                        </td>
                                        <td class="hidden-phone"> <a href="mailto:jhone-doe@gmail.com">{{ $newUser->email }}</a></td>
                                        <td class="hidden-phone">{{ $newUser->role }}</td>
                                        <td class="center hidden-phone">{{ $newUser->getCreatedAtJalali() }}</td>
                                        <td>
                                            <a href="{{ route('edit', $newUser->id) }}" class="btn btn-primary btn-xs" role="button"><i class="icon-pencil"></i></a>
                                            <button class="btn btn-danger btn-xs" type="button" wire:click="deleteUser({{ $newUser->id }})"><i class="icon-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </section>
                    </div>

                    {{-- create/edit are separate pages again; links in header go to those routes --}}
                </div>

                <!-- page end-->
      {{-- @push('scripts') --}}
      <x-slot name="scripts">
        <!-- js placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="{{ asset ('/Admin2/assets/data-tables/jquery.dataTables.js')}}"></script>
        <script type="text/javascript" src="{{ asset ('/Admin2/assets/data-tables/DT_bootstrap.js')}}"></script>
        <!--script for this page only-->
        <script src="{{ asset ('/Admin2/js/dynamic-table.js')}}"></script></div>
      </x-slot>
      <script>
        document.addEventListener('livewire:load', function () {
            function initUsersTable() {
                if (window.jQuery && $.fn.DataTable) {
                    try {
                        if ($.fn.DataTable.isDataTable('#sample_1')) {
                            $('#sample_1').DataTable().destroy();
                        }
                        $('#sample_1').DataTable();
                    } catch (e) {
                        console.warn('DataTables init failed', e);
                    }
                }
            }

            initUsersTable();

            Livewire.hook('message.processed', (message, component) => {
                initUsersTable();
            });

            // no debug browser events in list view
        });
      </script>
      {{-- @endpush --}}



