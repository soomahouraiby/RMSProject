@extends('layouts\master')
@section('content')

    {{--Title--}}
{{--    @if(Session::has('saved'))--}}
{{--        <div class="alert alert-success">--}}
{{--            {{Session::get('saved')}}--}}
{{--        </div>--}}
{{--    @endif--}}
    <main class="col-md-8 ms-sm-auto col-lg-10 px-md-4 ">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 pr-2  border-bottom main " >
            <h1 class="h2  ml-4">متابعة بلاغ وارد</h1>
            <div class="btn-toolbar ">
                <div class="btn-group show ">
                    @if(isset($reports))
                        @foreach($reports as $report)
                            @if($report->report_statues =='قيد المتابعة')
                    <button  class="btn btn-sm btn-outline-secondary  mr-4 ml-4 button" >
                        <a href="{{route('PM_endFollowUp',$report->report_no)}}">انهاء المتابعة</a>
                    </button>
                            @endif
                            @break($report)
                        @endforeach
                    @endif
                </div>
            </div>
        </div>


        {{--Content--}}
        {{--//////////////////////////////////////////////////////--}}
        {{--                    موضوع البلاغ                        --}}
        {{--//////////////////////////////////////////////////////--}}

        <div class="card shadow mb-0 pb-0" >
            <div class="card-header " style="background-color: #F9F9F9;">
                <div class="row m-2 ">
                    <h4>موضوع البلاغ</h4>
                </div>
            </div>
            <div class="card-body position-relative mb-0 pb-0" style="background-color: #F9F9F9;">
                <form>
                    @if(isset($reports))
                        @foreach($reports as $report)
                            <div class="form-group raw mt-2 " style="display: flex; flex-wrap: wrap;  ">
                                <label class="col-form-label Text ml-3 mr-4 ">اسم المبلغ : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$report -> app_user_name}}  </label>
                                <label class="col-form-label Text ml-5 mr-4 ">رقم الهاتف : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$report -> app_user_phone}}  </label>
                            </div>
                            <div class="form-group raw mt-4  border-bottom " style="display: flex; flex-wrap: wrap; ">
                                <label class="col-form-label  Text ml-3 mr-4 ">نوع البلاغ : </label>
                                <label class="col-form-label  ml-2 mr-4 ">{{$report -> type_report}}  </label>
                                <label class="col-form-label Text  ml-5 mr-4 ">اسم الصيدلية : </label>
                                <label class="col-form-label ml-2 mr-4  ">{{$report -> pharmacy_name}}  </label>
                                <label class="col-form-label Text  ml-5 mr-4 ">تاريخ البلاغ : </label>
                                <label class="col-form-label ml-2 mr-4 mb-3  ">{{$report -> report_date}}  </label>
                            </div>
                            <div class="form-group raw mt-4  ">
                                <a class="text-center col-form-label mb-3"  href="{{route('PM_detailsReport',$report->report_no)}}" style="margin-right: 20%"> تفاصيل البلاغ</a>
                                @if($report -> type_report != 'مهرب')
                                    <a class="text-center col-form-label mb-3 "  href="{{route('PM_detailsReport',$report->report_no)}}" style="margin-right: 34%"> تفاصيل الدواء</a>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </form>
            </div>
        </div>


        {{--//////////////////////////////////////////////////////--}}
        {{--                    متابعة البلاغ                        --}}
        {{--//////////////////////////////////////////////////////--}}

        <div class="card shadow mt-5" >
            <div class="card-header " style="background-color: #F9F9F9;">
                <div class="row m-2">
                    <h4>الإجراءات المتخذه حيال البلاغ</h4>
                </div>
            </div>
            <div class="card-body position-relative mb-0 pb-0" style="background-color: #F9F9F9;">
                <div class="row pb-5">
                    @if(isset($procedures))
                        @foreach($procedures as $procedure)
                            @if($procedure->report_no == $report->report_no)
                                <div class="form-group raw mt-4 col-lg-12 " style="display: flex; flex-wrap: wrap; ">
                                    <label class="col-form-label col-lg-2   ml-3 ">  التاريخ : </label>
                                    <label class="  col-lg-8 mt-2">{{$procedure -> procedure_date}}</label>
                                </div>
                                <div class="form-group raw mt-4 col-lg-12 " style="display: flex; flex-wrap: wrap; ">
                                    <label class="col-form-label col-lg-2   ml-3 ">  الإجراء المتخذ : </label>
                                    <label class="  col-lg-8 mt-2">{{$procedure -> procedure}}</label>
                                </div>
                                <div class="form-group raw mt-4 col-lg-12 " style="display: flex; flex-wrap: wrap; ">
                                    <label class="col-form-label col-lg-2   ml-3 ">  الــنــتــائــج : </label>
                                    <label class="  col-lg-8 mt-2">{{$procedure -> procedure_result}}</label>
                                </div>

                            @endif
{{--                            @break($procedure)--}}
                            @endforeach
                        @endif
                    </div>
                @if($report->report_statues == 'قيد المتابعة')
                     <form method="POST" action="{{route('PM_addProcedure',$report->report_no)}}">
                    @csrf
                        <div class="row pb-5">
                            <div class="form-group raw mt-4 col-lg-12 " style="display: flex; flex-wrap: wrap; ">
                                <label class="col-form-label col-lg-2  mt-2 ml-3 ">  الإجراء المتخذ : </label>
                                <div class=" mt-2 col-lg-8 ">
                                    <textarea class="form-control" name="procedure" placeholder="الإجراء المتخذ" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group raw mt-4 col-lg-12" style="display: flex; flex-wrap: wrap; ">
                                <label class="col-form-label col-lg-2  mt-2 ml-3 ">  الــنــتــائــج : </label>
                                <div class=" mt-2 col-lg-8 ">
                                    <textarea class="form-control" name="procedure_result" placeholder="النتائج" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group raw mt-4 col-lg-12 "  style="display: flex; flex-wrap: wrap; ">
                                <button class="btn " type="submit" style="margin-right:90%; width: 20%; background-color: #5468FF; color:#ffffff">حفظ</button>
                            </div>
                        </div>
                     </form>
                    @endif
                </div>
            </div>
        </main>

    @endsection
