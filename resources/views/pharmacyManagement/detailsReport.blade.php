@extends('layouts\master')
@section('content')


    <div id="New">
        @foreach($reports as $report)
            <a class="nav-link active" href="{{route('PM_followNewReport',$report->report_no)}}">
                <i class="fas fa-plus fa-1x ml-0 mr-0"></i>
                <span data-feather="file" class="ml-1">متابعة</span>
            </a>
        @endforeach
    </div>

    <main class="col-md-8 ms-sm-auto col-lg-10 px-md-4 ">
        {{--Title--}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 pr-2  border-bottom main " >
            <h1 class="h2 ml-4">تفاصيل بلاغ وارد</h1>
            @if(isset($reports))
                @foreach($reports as $report)
                    <h6 class="mr-4" style="font-size: 17px">بلاغ من نوع {{$report -> type_report}} </h6>
                @endforeach
            @endif
        </div>

        {{--Content--}}
        <div class="row col-lg-12" style="width: 100%" >

            {{--//////////////////////////////////////////////////////--}}
            {{--                    بيانات المبلغ                      --}}
            {{--//////////////////////////////////////////////////////--}}

            <div class="card shadow col-lg-5" style="width: 50% ;background-color: #F9F9F9;"  >
                <div class="card-header "style="background-color: #F9F9F9;">
                    <h5 class="card-title" style="color:#5468FF">بيانات المبلغ</h5>
                </div>
                <div class="card-body">
                    <div class="row" >
                        @if(isset($reports))
                            @foreach($reports as $report)
                                <ul class="list-group list-group-flush" >
                                    <li class="list-group-item" style="background-color: #F9F9F9;">
                                        <label class="Text">الاسم : </label>
                                        <label  class="ml-3">{{$report -> app_user_name}}</label>
                                    </li>
                                    <li class="list-group-item" style="background-color: #F9F9F9;">
                                        <label class="Text">رقم الهاتف : </label>
                                        <label  class="ml-3">{{$report -> app_user_phone}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label class="Text">العمر : </label>
                                        <label  class="ml-3 mr-4">{{$report -> age}}</label>
                                        <label class="ml-5 Text"> عدد البلاغات : </label>
                                        <label  class="ml-3">{{$report -> report_count}}</label>
                                    </li>
                                </ul>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            {{--//////////////////////////////////////////////////////--}}
            {{--                   تفاصيل الموقع                       --}}
            {{--//////////////////////////////////////////////////////--}}

            <div class="card shadow col-lg-5 col-md-4 " style="width: 50%;background-color: #F9F9F9;"  >
                <div class="card-header " style="background-color: #F9F9F9;">
                    <h5 class="card-title" style="color:#5468FF"> موقع البلاغ</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if(isset($reports))
                            @foreach($reports as $report)
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" style="background-color: #F9F9F9;">
                                        <label class="Text"> اسم الصيدلية : </label>
                                        <label  class="ml-3">{{$report -> pharmacy_name}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label class="Text">  الشارع : </label>
                                        <label  class="ml-3">{{$report -> street_name}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label class="Text"> وصف الموقع :</label>
                                        <label  class="ml-3">{{$report -> site_dec}}</label>
                                    </li>
                                </ul>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-lg-12" style="" >

            {{--//////////////////////////////////////////////////////--}}
            {{--                    تفاصيل الدواء                      --}}
            {{--//////////////////////////////////////////////////////--}}

            <div class="card shadow col-lg-5 col-md-4" style=" background-color: #F9F9F9;"  >
                <div class="card-header "style="background-color: #F9F9F9;">
                    <h5 class="card-title nav-link" style="color:#5468FF">تفاصيل الدواء</h5>
                </div>
                <div class="card-body">
                    <div class="row" >
                        @if(isset($reports))
                            @foreach($reports as $report)
                                @if($report -> type_report != 'مهرب')
                                    <ul class="list-group list-group-flush" >
                                        <li class="list-group-item" style="background-color: #F9F9F9;">
                                            <label class="Text">الاسم التجاري: </label>
                                            <label  class="ml-3">{{$report -> drug_name}}</label>
                                        </li>
                                        <li class="list-group-item" style="background-color: #F9F9F9;">
                                            <label class="Text"> الاستخدامات:</label>
                                            <label  class="ml-3">{{$report -> how_to_use}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label class="Text">الاعراض الجانبية :</label>
                                            <label  class="ml-3">{{$report -> side_effects}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <div class="card-img-top" ><img class="card-img-top img-fluid" src="../images/Panadol.jpg"></div>
                                            <a class="btn float-right" href="{{route('PM_detailsDrug',$report -> drug_no)}}">المزيد</a>
                                        </li>
                                    </ul>
                                @else
                                    <ul class="list-group list-group-flush" >
                                        <li class="list-group-item" style="background-color: #F9F9F9;">
                                            <label>الاسم التجاري: </label>
                                            <label  class="ml-3">{{$report -> commercial_name}}</label>
                                        </li>
                                        <li class="list-group-item" style="background-color: #F9F9F9;">
                                            <label>التركيبه العلميه:</label>
                                            <label  class="ml-3">{{$report -> material_name}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label>الوكيل :</label>
                                            <label  class="ml-3">{{$report -> agent_name}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label>الشركة المصنعة :</label>
                                            <label  class="ml-3">{{$report -> company_name}}</label>
                                        </li>
                                    </ul>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            {{--//////////////////////////////////////////////////////--}}
            {{--                    موضوع البلاغ                        --}}
            {{--//////////////////////////////////////////////////////--}}

            <div class="card shadow col-lg-5 col-md-4" style="background-color: #F9F9F9;"  >
                <div class="card-header " style="background-color: #F9F9F9;">
                    <h5 class="card-title" style="color:#5468FF"> موضوع البلاغ</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if(isset($reports))
                            @foreach($reports as $report)
                                <ul class="list-group list-group-flush ">
                                    <li class="list-group-item" style="background-color: #F9F9F9;">
                                        <label class="Text"> نوع البلاغ :</label>
                                        <label  class="ml-3">{{$report -> type_report}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label class="Text">تاريخ البلاغ :</label>
                                        <label  class="ml-3">{{$report -> report_date}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label class="Text"> ملاحظة المبلغ :</label>
                                        <label  class="ml-3">{{$report -> notes_user}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label>مرفق</label>
                                        <div class="card-img-top" >
                                            <img class="card-img-top img-fluid"
                                                 src="{{  $report -> drug_picture}}">
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
