@extends('layouts\master')
@section('content')

    <main class="col-md-8 ms-sm-auto col-lg-10 px-md-4 ">
        {{--Title--}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 pr-2  border-bottom main " >
            <h1 class="h2   ml-2 mt-2 mb-2">تفاصيل بلاغ وارد</h1>
        </div>

        {{--Title--}}


        {{--Start Content--}}

        <div class="row" style="width: 100%;" >

            {{--//////////////////////////////////////////////////////--}}
            {{--                       بيانات المبلغ                   --}}
            {{--//////////////////////////////////////////////////////--}}

            <div class="card shadow col-lg-5" style="width: 40%; background-color: #F9F9F9;"  >
                <div class="card-header "style="background-color: #F9F9F9;">
                    <h5 class="card-title" style="color:#5468FF">بيانات المبلغ</h5>
                </div>
                <div class="card-body">
                    <div class="row " >
                        @if(isset($report))
                            @foreach($report as $reports)
                                <ul class="list-group list-group-flush" >
                                    <li class="list-group-item" style="background-color: #F9F9F9;">
                                        <label>الاسم : </label>
                                        <label  class="ml-3">{{$reports -> app_user_name}}</label>
                                    </li>
                                    <li class="list-group-item" style="background-color: #F9F9F9;">
                                        <label>رقم الهاتف : </label>
                                        <label  class="ml-3">{{$reports -> app_user_phone}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label>العمر : </label>
                                        <label  class="ml-3 mr-4">{{$reports -> age}}</label>
                                        <label class="ml-5"> الصفه : </label>
                                        <label  class="ml-3">{{$reports -> adjective}}</label>
                                    </li>
                                </ul>
                            @endforeach
                        @endif
                        @if(isset($report2))
                                @foreach($report2 as $reports2)
                                    <ul class="list-group list-group-flush" >
                                        <li class="list-group-item" style="background-color: #F9F9F9;">
                                            <label>الاسم : </label>
                                            <label  class="ml-3">{{$reports2 -> authors_name}}</label>
                                        </li>
                                        <li class="list-group-item" style="background-color: #F9F9F9;">
                                            <label>رقم الهاتف : </label>
                                            <label  class="ml-3">{{$reports2 -> authors_phone}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label>العمر : </label>
                                            <label  class="ml-3 mr-4">{{$reports2 ->authors_age}}</label>
                                            <label class="ml-5"> الصفه : </label>
                                            <label  class="ml-3">{{$reports2 -> authors_adjective}}</label>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                    </div>
                </div>
            </div>

            {{--//////////////////////////////////////////////////////--}}
            {{--                       تفاصيل الموقع                   --}}
            {{--//////////////////////////////////////////////////////--}}

            <div class="card shadow  col-md-4 col-lg-5" style="width: 40%;background-color: #F9F9F9;"  >
                <div class="card-header " style="background-color: #F9F9F9;">
                    <h5 class="card-title" style="color:#5468FF"> موقع البلاغ</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if(isset($report))
                            @foreach($report as $reports)
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" style="background-color: #F9F9F9;">
                                        <label> اسم الصيدلية : </label>
                                        <label  class="ml-3">{{$reports -> pharmacy_name}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label>  الشارع : </label>
                                        <label  class="ml-3">{{$reports -> street_name}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label> وصف الموقع :</label>
                                        <label  class="ml-3">{{$reports -> site_dec}}</label>
                                    </li>
                                </ul>
                            @endforeach
                        @endif
                        @if(isset($report2))
                                @foreach($report2 as $reports2)
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item" style="background-color: #F9F9F9;">
                                            <label> اسم الصيدلية : </label>
                                            <label  class="ml-3">{{$reports2 -> pharmacy_name}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label>  الشارع : </label>
                                            <label  class="ml-3">{{$reports2 -> street_name}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label> وصف الموقع :</label>
                                            <label  class="ml-3">{{$reports2 -> site_dec}}</label>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="width: 100%;" >

            {{--//////////////////////////////////////////////////////--}}
            {{--                       تفاصيل الدواء                    --}}
            {{--//////////////////////////////////////////////////////--}}

            <div class="card shadow  col-md-4 col-lg-5" style="width: 40%; background-color: #F9F9F9;"  >
                <div class="card-header "style="background-color: #F9F9F9;">
                    <h5 class="card-title" style="color:#5468FF">تفاصيل الدواء</h5>
                </div>
                <div class="card-body">
                    <div class="row" >
                        @if(isset($report))
                            @foreach($report as $reports)
                                <ul class="list-group list-group-flush" >
                                    <li class="list-group-item" style="background-color: #F9F9F9;">
                                        <label>الاسم التجاري: </label>
                                        <label  class="ml-3">{{$reports -> commercial_name}}</label>
                                    </li>
                                    <li class="list-group-item" style="background-color: #F9F9F9;">
                                        <label>التركيبه العلميه:</label>
                                        <label  class="ml-3">{{$reports -> material_name}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label>الوكيل :</label>
                                        <label  class="ml-3">{{$reports -> agent_name}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label>الشركة المصنعة :</label>
                                        <label  class="ml-3">{{$reports -> company_name}}</label>
                                    </li>
                                    {{--                                    <li class="list-group-item"style="background-color: #F9F9F9;">--}}
                                    {{--                                        <div class="card-img-top" >--}}
                                    {{--                                            <img class="card-img-top img-fluid"--}}
                                    {{--                                                 src="{{ asset('images/' . $reports -> drug_photo) }}">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </li>--}}
                                </ul>
                            @endforeach
                        @endif
                        @if(isset($report2))
                                @foreach($report2 as $reports2)
                                    <ul class="list-group list-group-flush" >
                                        <li class="list-group-item" style="background-color: #F9F9F9;">
                                            <label>الاسم التجاري: </label>
                                            <label  class="ml-3">{{$reports2 -> commercial_name}}</label>
                                        </li>
                                        <li class="list-group-item" style="background-color: #F9F9F9;">
                                            <label>التركيبه العلميه:</label>
                                            <label  class="ml-3">{{$reports2 -> material_name}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label>الوكيل :</label>
                                            <label  class="ml-3">{{$reports2 -> agent_name}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label>الشركة المصنعة :</label>
                                            <label  class="ml-3">{{$reports2 -> company_name}}</label>
                                        </li>
                                        {{--                                    <li class="list-group-item"style="background-color: #F9F9F9;">--}}
                                        {{--                                        <div class="card-img-top" >--}}
                                        {{--                                            <img class="card-img-top img-fluid"--}}
                                        {{--                                                 src="{{ asset('images/' . $reports -> drug_photo) }}">--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </li>--}}
                                    </ul>
                                @endforeach
                            @endif
                    </div>
                </div>
            </div>

            {{--//////////////////////////////////////////////////////--}}
            {{--                       موضوع البلاغ                    --}}
            {{--//////////////////////////////////////////////////////--}}

            <div class="card shadow  col-md-4 col-lg-5" style="width: 40%;background-color: #F9F9F9;"  >
                <div class="card-header " style="background-color: #F9F9F9;">
                    <h5 class="card-title" style="color:#5468FF"> موضوع البلاغ</h5>
                </div>
                <div class="card-body">
                    <div class="row ">
                        @if(isset($report))
                            @foreach($report as $reports)
                                <ul class="list-group list-group-flush ">
                                    <li class="list-group-item" style="background-color: #F9F9F9;">
                                        <label> نوع البلاغ :</label>
                                        <label  class="ml-3">{{$reports -> type_report}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label>تاريخ البلاغ :</label>
                                        <label  class="ml-3">{{$reports -> report_date}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label> ملاحظة المبلغ :</label>
                                        <label  class="ml-3">{{$reports -> notes_user}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label>مرفق</label>
                                        <div class="card-img-top" >
                                            <img class="card-img-top img-fluid"
                                                 src="{{ asset('images/' . $reports -> drug_picture)}}">
                                        </div>
                                    </li>
                                </ul>
                            @endforeach
                        @endif
                        @if(isset($report2))
                                @foreach($report2 as $reports2)
                                    <ul class="list-group list-group-flush ">
                                        <li class="list-group-item" style="background-color: #F9F9F9;">
                                            <label> نوع البلاغ :</label>
                                            <label  class="ml-3">{{$reports2 -> type_report}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label>تاريخ البلاغ :</label>
                                            <label  class="ml-3">{{$reports2 -> report_date}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label> ملاحظة المبلغ :</label>
                                            <label  class="ml-3">{{$reports2 -> notes_user}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label>مرفق</label>
                                            <div class="card-img-top" >
                                                <img class="card-img-top img-fluid"
                                                     src="{{ asset('images/' . $reports2 -> drug_picture)}}">
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                    </div>
                </div>
            </div>
        </div>

        {{--End Content--}}

    </main>

@endsection

