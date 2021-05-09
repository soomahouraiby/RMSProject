@extends('layouts\master')
@section('content')

    <main class="col-md-8 ms-sm-auto col-lg-10 px-md-4 ">
        {{--Title--}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 pr-2  border-bottom main " >
            @if(isset($reports))
                @foreach($reports as $report)
                    <h1 class="h2 ml-4">{{$report -> drug_name}}</h1>
                    @break($reports)
                @endforeach
            @endif
        </div>

        {{--Content--}}
        <div class="row col-lg-12" style="width: 100%" >

            {{--//////////////////////////////////////////////////////--}}
            {{--                    بيانات الدواء                      --}}
            {{--//////////////////////////////////////////////////////--}}

            <div class="card shadow col-lg-5" style="width: 50% ;background-color: #F9F9F9;"  >
                <div class="card-header "style="background-color: #F9F9F9;">
                    <h5 class="card-title" style="color:#5468FF">تفاصيل الدواء</h5>
                </div>
                <div class="card-body">
                    <div class="row" >
                        @if(isset($reports))
                            @foreach($reports as $report)
                                <ul class="list-group list-group-flush" >
                                    <li class="list-group-item" style="background-color: #F9F9F9;">
                                        <label class="Text">الاسم التجاري : </label>
                                        <label  class="ml-3">{{$report -> drug_name}}</label>
                                    </li>
                                    <li class="list-group-item" style="background-color: #F9F9F9;">
                                        <label class="Text">المادة الفعاله : </label>
                                        <label  class="ml-3">{{$report -> material_name}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label class="Text">قوة التركيز : </label>
                                        <label  class="ml-3 mr-4">{{$report -> con}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label class="Text">دواعي الأستخدام: </label>
                                        <label  class="ml-3 mr-4">{{$report -> indications_for_use}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label class="Text">طريقة الإستعمال: </label>
                                        <label  class="ml-3 mr-4">{{$report -> how_to_use}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label class="Text">الشكل الصيدلاني : </label>
                                        <label  class="ml-3 mr-4">{{$report -> drug_form}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label class="Text">رقم التسجيل  : </label>
                                        <label  class="ml-3 mr-4">{{$report -> register_no}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label class="Text">الأثار الجانبية : </label>
                                        <label  class="ml-3 mr-4">{{$report -> side_effects}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label class="Text">الشركة المصنعة  : </label>
                                        <label  class="ml-3 mr-4">{{$report -> company_name}}</label>
                                    </li>
                                    <li class="list-group-item"style="background-color: #F9F9F9;">
                                        <label class="Text">بلد الشركة المصنعة  : </label>
                                        <label  class="ml-3 mr-4">{{$report -> company_country}}</label>
                                    </li>
                                </ul>
                                @break($report)
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            {{--//////////////////////////////////////////////////////--}}
            {{--                   تفاصيل الموقع                       --}}
            {{--//////////////////////////////////////////////////////--}}

            <div class="container col-lg-6 " style="margin-top:6%" >
                <div class="card shadow col-lg-10" style="background-color: #F9F9F9; "  >
                    <div class="card-header "style="background-color: #F9F9F9;">
                        <h5 class="card-title" style="color:#5468FF">بيانات الوكيل</h5>
                    </div>
                    <div class="card-body">
                        <div class="row" >
                            @if(isset($reports))
                                @foreach($reports as $report)
                                    <ul class="list-group list-group-flush" >
                                        <li class="list-group-item" style="background-color: #F9F9F9;">
                                            <label class="Text">اسم الوكيل : </label>
                                            <label  class="ml-3">{{$report -> agent_name}}</label>
                                        </li>
                                        <li class="list-group-item" style="background-color: #F9F9F9;">
                                            <label class="Text">رقم الهاتف : </label>
                                            <label  class="ml-3">{{$report -> agent_phone}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label class="Text">البريد الإلكتروني : </label>
                                            <label  class="ml-3 mr-4">{{$report -> agent_email}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label class="Text">عنوان الوكيل : </label>
                                            <label  class="ml-3 mr-4">{{$report -> agent_address}}</label>
                                        </li>
                                    </ul>
                                    @break($report)
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card shadow col-lg-12" style="background-color: #F9F9F9;"  >
                    <div class="card-header "style="background-color: #F9F9F9;">
                        <h5 class="card-title" style="color:#5468FF">بيانات الشحنة</h5>
                    </div>
                    <div class="card-body">
                        <div class="row" >
                            @if(isset($reports))
                                @foreach($reports as $report)
                                    <ul class="list-group list-group-flush" >
                                        <li class="list-group-item" style="background-color: #F9F9F9;">
                                            <label class="Text">رقم التشغيلة  : </label>
                                            <label  class="ml-3">{{$report -> batch_num}}</label>
                                        </li>
                                        <li class="list-group-item" style="background-color: #F9F9F9;">
                                            <label class="Text">تاريخ الإنتاج : </label>
                                            <label  class="ml-3">{{$report -> production_date}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label class="Text">تاريخ الإنتهاء  : </label>
                                            <label  class="ml-3 mr-4">{{$report -> expiry_date}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label class="Text">سعر الصنف : </label>
                                            <label  class="ml-3 mr-4">{{$report -> price}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label class="Text">الكمية : </label>
                                            <label  class="ml-3 mr-4">{{$report -> quantity}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label class="Text">السحب : </label>
                                            <label  class="ml-3 mr-4">{{$report -> shipment_drawn}}</label>
                                        </li>
                                        <li class="list-group-item"style="background-color: #F9F9F9;">
                                            <label class="Text">الإستثناء : </label>
                                            <label  class="ml-3 mr-4">{{$report -> exception}}</label>
                                        </li>
                                    </ul>
                                    @break($report)
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
