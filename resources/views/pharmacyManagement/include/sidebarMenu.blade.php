{{--sidebarMenu--}}

<nav id="sidebarMenu" class="col-md-4 col-lg-2 d-md-block" >
    <div class="position-fixed pt-4  border-bottom" >
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}">
                    <i class="fas fa-home"></i>
                    <span data-feather="file" class="ml-2"> الرئيسية </span>
                </a>
            </li>
            <li class="nav-item " >
                <a class="nav-link active " aria-current="page" href="{{route('PM_newReports')}}">
                    <i class="fas fa-inbox"></i>
                    <span data-feather="file" class="ml-2">بلاغات وارده</span>
                    <i class="fas fa-caret-down ml-3 dropdown "></i>
                </a>
                <ul class="UL">
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('PM_newSmuggledReports')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">مهرب</span>
                        </a>
                    </li>
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('PM_newDrownReports')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">مسحوب</span>
                        </a>
                    </li>
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('PM_newDifferentReports')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">غير مطابق</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('PM_drug')}}">
                    <i class="fas fa-plus"></i>
                    <span data-feather="file" class="ml-2">إضافة دواء جديد</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('PM_drug')}}">
                    <i class="fas fa-plus"></i>
                    <span data-feather="file" class="ml-2">إضافة شحنة جديده</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active " aria-current="page" href="{{route('PM_followReports')}}">
                    <i class="fas fa-chalkboard-teacher "></i>
                    <span data-feather="file" class="ml-2">متابعةالبلاغات</span>
                    <i class="fas fa-caret-down ml-2 dropdown "></i>
                </a>
                <ul class="UL">
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('PM_followingReports')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">قيد المتابعة</span>
                        </a>
                    </li>
                    <li class="nav-item " >
                        <a class="nav-link active " aria-current="page" href="{{route('PM_followDoneReports')}}">
                            <i class="far fa-newspaper"></i>
                            <span data-feather="file" class="ml-2">تم متابعتها</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                    <i class="fas fa-file-contract"></i>
                    <span data-feather="file" class="ml-2">التقارير</span>
                </a>
            </li>
        </ul>

    </div>
</nav>

{{--sidebarMenu--}}
