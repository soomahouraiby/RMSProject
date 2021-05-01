@extends('layouts\master')
@section('content')

    <main class="col-md-8 ms-sm-auto col-lg-10 px-md-4 ">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        {{--Title--}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 pr-2  border-bottom main " >
            <h1 class="h2   ml-2 mt-2 mb-2">تفاصيل بلاغ وارد</h1>
            <div class="dropdown  ml-5" >
                @if(isset($report))
                    @foreach($report as $reports)
                        <button class="btn " type="submit" style=" width: 90%; background-color: #1b225a; color:#ffffff">
                            <a  href="{{route('PHC_transferReports',$reports -> report_no)}}" style=" color:#ffffff;">تحويل للمتابعة</a>
                        </button>
                    @endforeach
                @endif
            </div>
        </div>

        {{--Title--}}


        {{--Start Content--}}

        {{--//////////////////////////////////////////////////////--}}
        {{--                       بيانات المبلغ                   --}}
        {{--//////////////////////////////////////////////////////--}}
        <div class="card shadow mb-0 pb-0" >
            <div class="card-header " style="background-color: #F9F9F9;">
                <div class="row m-2 ">
                    <h4>بيانات المبلغ</h4>
                </div>
            </div>
            <div class="card-body position-relative mb-0 pb-0" style="background-color: #F9F9F9;">
                <form>
                    @if(isset($report))
                        @foreach($report as $reports)
                            <div class="form-group raw mt-2 " style="display: flex; flex-wrap: wrap;  ">
                                <label class="col-form-label Text ml-3 mr-4 ">اسم المبلغ : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$reports -> app_user_name}}  </label>
                                <label class="col-form-label Text ml-5 mr-4 ">رقم الهاتف : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$reports -> app_user_phone}}  </label>
                                <label class="col-form-label Text ml-5 mr-4 ">البريد الالكتروني : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$reports -> app_user_email}}  </label>
                            </div>
                            <div class="form-group raw mt-4  border-bottom " style="display: flex; flex-wrap: wrap; ">
                                <label class="col-form-label Text  ml-3 mr-4 ">تاريخ البلاغ : </label>
                                <label class="col-form-label ml-2 mr-4  ">{{$reports -> report_date}}  </label>
                                @endforeach
                                @endif
                                @if(isset($details))
                                    @foreach($details as $detail)
                                        <label class="col-form-label Text ml-3 mr-4 ">صلة القرابة بالمريض : </label>
                                        <label class="col-form-label  ml-2 mr-4  ">{{$detail -> Relation_with_patient}}  </label>
                                    @endforeach
                                @endif
                            </div>

                </form>
            </div>
        </div>

        {{--//////////////////////////////////////////////////////--}}
        {{--               بيانات مستخدم الدواء                   --}}
        {{--//////////////////////////////////////////////////////--}}
        <div class="card shadow mb-0 pb-0" >
            <div class="card-header " style="background-color: #F9F9F9;">
                <div class="row m-2 ">
                    <h4>بيانات مستخدم الدواء</h4>
                </div>
            </div>
            <div class="card-body position-relative mb-0 pb-0" style="background-color: #F9F9F9;">
                <form>
                    @if(isset($details))
                        @foreach($details as $detail)
                            <div class="form-group raw mt-2 " style="display: flex; flex-wrap: wrap;  ">
                                <label class="col-form-label Text ml-3 mr-4 ">الاسم : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$detail -> drug_user_name}}  </label>
                                <label class="col-form-label Text ml-5 mr-4 ">العمر : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$detail -> age}}  </label>
                                <label class="col-form-label Text ml-5 mr-4 ">الجنس : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$detail -> gender}}  </label>
                            </div>
                            <div class="form-group raw mt-4  border-bottom " style="display: flex; flex-wrap: wrap; ">
                                <label class="col-form-label Text  ml-3 mr-4 ">الوزن : </label>
                                <label class="col-form-label ml-2 mr-4  ">{{$detail -> weight}}  </label>
                                <label class="col-form-label Text ml-3 mr-4 ">الطول : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$detail -> height}}  </label>
                            </div>
                        @endforeach
                    @endif
                </form>
            </div>
        </div>

        {{--//////////////////////////////////////////////////////--}}
        {{--                      تفاصيل الدواء                   --}}
        {{--//////////////////////////////////////////////////////--}}
        <div class="card shadow mb-0 pb-0" >
            <div class="card-header " style="background-color: #F9F9F9;">
                <div class="row m-2 ">
                    <h4>بيانات الدواء</h4>
                </div>
            </div>
            <div class="card-body position-relative mb-0 pb-0" style="background-color: #F9F9F9;">
                <form>
                    @if(isset($report))
                        @foreach($report as $reports)
                            <div class="form-group raw mt-2 " style="display: flex; flex-wrap: wrap;  ">
                                <label class="col-form-label Text ml-3 mr-4 ">اسم الدواء التجاري : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$reports -> drug_name}}  </label>
                                <label class="col-form-label Text ml-5 mr-4 ">اسم الدواء العلمي : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$reports -> material_name}}  </label>
                            </div>
                            <div class="form-group raw mt-4  border-bottom " style="display: flex; flex-wrap: wrap; ">
                                <label class="col-form-label Text ml-5 mr-4 ">اسم المصنع : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$reports -> company_name}}  </label>
                                <label class="col-form-label Text  ml-3 mr-4 ">رقم التشغيلة : </label>
                                <label class="col-form-label ml-2 mr-4  ">{{$reports -> batch_num}}  </label>
                                <label class="col-form-label Text ml-3 mr-4 ">شكل الدواء : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$reports -> drug_form}}  </label>
                            </div>
                        @endforeach
                    @endif
                    @if(isset($details))
                        @foreach($details as $detail)
                            <div class="form-group raw mt-4  border-bottom " style="display: flex; flex-wrap: wrap; ">
                                <label class="col-form-label Text  ml-3 mr-4 ">كيفية الحصول على الدواء : </label>
                                <label class="col-form-label ml-2 mr-4  ">{{$detail -> how_get_drug}}  </label>
                            </div>
                        @endforeach
                    @endif
                    @if(isset($report))
                        @foreach($report as $reports)
                            <div class="form-group raw mt-4  border-bottom " style="display: flex; flex-wrap: wrap; ">
                                <label class="col-form-label Text  ml-3 mr-4 ">اسم المنشأه التي تم صرف الدواء منها : </label>
                                <label class="col-form-label ml-2 mr-4  ">{{$reports -> pharmacy_name}}  </label>
                                <label class="col-form-label Text ml-3 mr-4 ">العنوان : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$reports -> street_name}}  </label>
                            </div>
                        @endforeach
                    @endif
                    @if(isset($details))
                        @foreach($details as $detail)
                            <div class="form-group raw mt-4  border-bottom " style="display: flex; flex-wrap: wrap; ">
                                <label class="col-form-label Text  ml-3 mr-4 ">تاريخ بدء استخدام الدواء : </label>
                                <label class="col-form-label ml-2 mr-4  ">{{$detail -> date_start_use}}  </label>
                                <label class="col-form-label Text ml-3 mr-4 ">طريقة استخدامه : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$detail -> how_use_drug}}  </label>
                                <label class="col-form-label Text ml-3 mr-4 ">الغرض من استخدامه : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$detail -> purpose_of_use}}  </label>
                            </div>
                            <div class="form-group raw mt-4  border-bottom " style="display: flex; flex-wrap: wrap; ">
                                <label class="col-form-label Text  ml-3 mr-4 ">الجرعة : </label>
                                <label class="col-form-label ml-2 mr-4  ">{{$detail -> dose}}  </label>
                                <label class="col-form-label Text ml-3 mr-4 ">تاريخ الصلاحية : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$detail -> expiration_date}}  </label>
                            </div>
                            <div class="form-group raw mt-4  border-bottom " style="display: flex; flex-wrap: wrap; ">
                                <label class="col-form-label Text  ml-3 mr-4 ">هل تم ايقاف الاستخدام : </label>
                                <label class="col-form-label ml-2 mr-4  ">{{$detail -> status_stop_use}}  </label>
                                <label class="col-form-label Text ml-3 mr-4 ">التاريخ : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$detail -> date_stop_use}}  </label>
                            </div>
                        @endforeach
                    @endif
                </form>
            </div>
        </div>

        {{--//////////////////////////////////////////////////////--}}
        {{--                      وصف المشكلة                     --}}
        {{--//////////////////////////////////////////////////////--}}
        <div class="card shadow mb-0 pb-0" >
            <div class="card-header " style="background-color: #F9F9F9;">
                <div class="row m-2 ">
                    <h4>وصف المشكلة المتعلقة بالعرض الجانبي وكيف تم علاجه واية معلومات اخرى ضرورية تشمل الحالة الصحية</h4>
                </div>
            </div>
            <div class="card-body position-relative mb-0 pb-0" style="background-color: #F9F9F9;">
                <form>
                    @if(isset($report))
                        @foreach($report as $reports)
                            <div class="form-group raw mt-2 " style="display: flex; flex-wrap: wrap;  ">
                                <label class="col-form-label  ml-2 mr-4  ">{{$reports -> notes_user}}  </label>
                            </div>
                        @endforeach
                    @endif
                </form>
            </div>
        </div>

        {{--//////////////////////////////////////////////////////--}}
        {{--              بيانات الادوية الاخرى                     --}}
        {{--//////////////////////////////////////////////////////--}}
         <div class="card shadow mb-0 pb-0" >
                <div class="card-header " style="background-color: #F9F9F9;">
                    <div class="row m-2 ">
                        <h4>بيانات الادوية الاخرى المستخدمة حاليا وكذلك المستخدمة قبل شهر من ظهور العرض</h4>
                    </div>
                </div>
                <div class="card-body position-relative mb-0 pb-0" style="background-color: #F9F9F9;">
                    <table class="table table-striped ">
                        <thead >
                        <tr>
                            <th>اسم الدواء</th>
                            <th>الجرعة</th>
                            <th>تاريخ بدء الاستخدام</th>
                            <th>تاريخ انهاء الاستخدام</th>
                            <th>الغرض من الاستخدام</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($o_drug))
                            @foreach($o_drug as $o_drugs)
                                <tr class="reportRow">
                                    <td>{{$o_drugs -> drug_name}}</td>
                                    <td>{{$o_drugs -> dose}}</td>
                                    <td>{{$o_drugs -> date_start_use}}</td>
                                    <td>{{$o_drugs -> date_end_use}}</td>
                                    <td>{{$o_drugs -> purpose_of_use}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        {{--//////////////////////////////////////////////////////--}}
        {{--              بيانات العرض الجانبي                     --}}
        {{--//////////////////////////////////////////////////////--}}
         <div class="card shadow mb-0 pb-0" >
                <div class="card-header " style="background-color: #F9F9F9;">
                    <div class="row m-2 ">
                        <h4>بيانات العرض الجانبي</h4>
                    </div>
                </div>
                <div class="card-body position-relative mb-0 pb-0" style="background-color: #F9F9F9;">
                    <table class="table table-striped ">
                        <thead >
                        <tr>
                            <th>العرض</th>
                            <th>تاريخ بدء ظهور العرض</th>
                            <th>مدى خطورته</th>
                            <th>هل زال العرض</th>
                            <th>التاريخ</th>
                            <th>حالة المريض حاليا</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($details))
                            @foreach($details as $detail)
                                <tr class="reportRow">
                                    <td>{{$detail -> side_effect}}</td>
                                    <td>{{$detail -> date_st_effect}}</td>
                                    <td>{{$detail -> range_dangerous}}</td>
                                    <td>{{$detail -> side_effect_removed}}</td>
                                    <td>{{$detail -> removed_date}}</td>
                                    <td>{{$detail -> status_patient_now}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        {{--End Content--}}

    </main>

@endsection

