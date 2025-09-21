<x-slot name="title">
- مدیریت کاربران
  </x-slot>

               <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
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
                                        <td class="hidden-phone">{{$newUser->id}}</td>
                                        <td><img src="{{$newUser->user_image}}" class="img img-circle d-block mb-2" width="40px" height="30px" aly="">&nbsp;&nbsp;{{$newUser->name}} {{$newUser->lastname}}</td>
                                        <td class="hidden-phone"> <a href="mailto:jhone-doe@gmail.com">{{$newUser->email}}</a></td>
                                        <td class="hidden-phone">{{$newUser->role}}</td>
                                        <td class="center hidden-phone">{{$newUser->getCreatedAtJalali()}}</td>
                                        {{-- <td class="hidden-phone">10</td> --}}
                                        {{-- <td class="hidden-phone"><span class="label label-success">Approved</span></td> --}}
                                        <td>
                                            {{-- <a href="/panel/users/create"><button class="btn btn-success btn-xs"><i class="icon-plus"></i></button></a> --}}
                                            {{-- <a href="{{ route('edit',[$newUser['id']]) }}"><button class="btn btn-primary btn-xs" type="submit"><i class="icon-pencil" ></i></button> </a> --}}
                                            {{-- <a href="/panel/users/edit/{{$newUser->id}}"><button class="btn btn-primary btn-xs" type="submit"><i class="icon-pencil" ></i></button> </a> --}}
                                            <a href="/panel/users/edit/{{$newUser->id}}"><button class="btn btn-primary btn-xs" type="submit"><i class="icon-pencil" ></i></button> </a>
                                            {{-- <a href="{{ route('edit', [$newUser->id]) }}"><button class="btn btn-primary btn-xs" ><i class="icon-pencil" ></i></button> </a> --}}
                                            {{-- <a href="{{ route('edit', ['id'=>$newUser->id]) }}"><button class="btn btn-primary btn-xs" ><i class="icon-pencil" ></i></button> </a> --}}

                                                {{-- {{ dd ($newUser->name)}} --}}
                                            <button class="btn btn-danger btn-xs"><i class="icon-trash " wire:click="deleteUser({{$newUser->id}})"></i></button>
                                            {{-- <div x-data>
                                                <span x-show="$wire.showMessage"></span>

                                                <button x-on:click="$wire.toggleShowMessage()">کاربر مورد نظر حذف شد.</button>
                                            </div> --}}
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </section>
                    </div>
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
      {{-- @endpush --}}


