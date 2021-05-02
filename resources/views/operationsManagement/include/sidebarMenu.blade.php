{{--sidebarMenu--}}

<nav id="sidebarMenu" class="col-md-4 col-lg-2 d-md-block">
    <div class="position-fixed pt-4  border-bottom">
        {{--        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('operations_Management'))--}}
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}">
                    <i class="fas fa-home"></i>
                    <span data-feather="file" class="ml-2"> الرئيسية </span>
                </a>
            </li>
            <li class="nav-item " >
                <a class="nav-link active " aria-current="page" href="{{route('OP_newReports')}}">
                    <i class="fas fa-inbox "></i>
                    <span data-feather="file" class="ml-2">بلاغات وارده</span>
                    <i class="fas fa-caret-down ml-3 dropdown "></i>
                </a>
                <ul class="UL">
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('OP_newSmuggledReports')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">مهرب</span>
                        </a>
                    </li>
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('OP_newDrownReports')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">مسحوب</span>
                        </a>
                    </li>
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('OP_newDiffrentReports')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">غير مطابق</span>
                        </a>
                    </li>
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('OP_newExceptionReports')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">مستثناء</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" >
                    <i class="fas fa-plus "></i>
                    <span data-feather="file" class="ml-2"> إضافة بلاغ جديد</span>
                </a>
                <ul class="UL">
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('OP_addReport')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">مهرب</span>
                        </a>
                    </li>
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('OP_addReport')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">ّاخر</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="{{route('OP_followReports')}}">
                    <i class="fas fa-chalkboard-teacher "></i>
                    <span data-feather="file" class="ml-2">إدارة ومتابعه</span>
                    <i class="fas fa-caret-down ml-1 dropdown "></i>
                </a>
                <ul class="UL">
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('OP_transferFollowingReports')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">محول للمتابعة</span>
                        </a>
                    </li>
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('OP_followingReports')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">قيد المتابعة</span>
                        </a>
                    </li>
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('OP_followDoneReports')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">تم متابعتها</span>
                        </a>
                    </li>
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('OP_doneReports')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">تم انهائها</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                    <i class="fas fa-file-contract "></i>
                    <span data-feather="file" class="ml-2">التقارير</span>
                </a>
            </li>
        </ul>
        {{--        @endif--}}
    </div>
</nav>

{{--sidebarMenu--}}
