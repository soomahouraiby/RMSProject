@extends('layouts\master')
@section('content')

    <main class="col-md-8 ms-sm-auto col-lg-10 px-md-4 ">
        {{--Start Content Title--}}
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 pr-2  border-bottom main " >
            <h1 class="h2  ml-4">متابعة بلاغ وارد</h1>
            <div class="btn-toolbar ">
            </div>
        </div>

        {{--End Content Title--}}



        {{--Start Content--}}

    <!--//////////////////////////////////////////////////////-->
        <!--                      موضوع البلاغ                      -->
        <!--//////////////////////////////////////////////////////-->

        <div class="card shadow mb-0 pb-0" >
            <div class="card-header " style="background-color: #F9F9F9;">
                <div class="row m-2 ">
                    <h4>موضوع البلاغ</h4>
                </div>
            </div>
            <div class="card-body position-relative mb-0 pb-0" style="background-color: #F9F9F9;">
                <form>
                    @if(isset($report))
                        @foreach($report as $reports)
                            <div class="form-group raw mt-2 " style="display: flex; flex-wrap: wrap;  ">
                                <label class="col-form-label Text ml-3 mr-4 ">اسم المبلغ : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$reports -> authors_name}}  </label>
                                <label class="col-form-label Text ml-5 mr-4 ">رقم الهاتف : </label>
                                <label class="col-form-label  ml-2 mr-4  ">{{$reports -> authors_phone}}  </label>
                            </div>
                            <div class="form-group raw mt-4  border-bottom " style="display: flex; flex-wrap: wrap; ">
                                <label class="col-form-label Text  ml-5 mr-4 ">اسم الدواء : </label>
                                <label class="col-form-label ml-2 mr-4 mb-3  ">{{$reports -> drug_name}}  </label>
                            </div>
                            <div class="form-group raw mt-4  ">
                                <a class="text-center col-form-label mb-3"  href="{{route('PHC_detailsReport2',$reports -> report_no)}}" style="margin-right: 45%"> تفاصيل البلاغ</a>
                            </div>
                        @endforeach
                    @endif
                </form>
            </div>
        </div>

        <!--//////////////////////////////////////////////////////-->
        <!--                    متابعة البلاغ                        -->
        <!--//////////////////////////////////////////////////////-->

        <div class="card shadow mt-5" >
            <div class="card-header " style="background-color: #F9F9F9;">
                <div class="row m-2">
                    <h4>الإجراءات المتخذه حيال البلاغ</h4>
                </div>
            </div>

            <div class="card-body position-relative mb-0 pb-0" style="background-color: #F9F9F9;">
                @if(isset($procedures))
                    @foreach($procedures as $procedure)
                        <div class="row pb-5 border-bottom">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-2  mt-2 ml-3 Text" >  تــاريــخ الإجراء : </label>
                                <label class="col-form-label col-lg-2  mt-2  ">{{$procedure -> procedure_date}}</label>
                            </div>
                        </div>
                        <div class="row pb-5 border-bottom">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-2  mt-2 ml-3 Text" >   الإجراء المتخذ : </label>
                                <p class="col-form-label  mx-5  ">{{$procedure -> procedure}} </p>
                            </div>
                        </div>
                        <div class="row pb-5 border-bottom">
                            <div class="col-lg">
                                <label class="col-form-label col-lg-2  mt-2 ml-3 Text" >   الــنــتــائــج : </label>
                                <p class="col-form-label  mx-5  ">{{$procedure -> procedure_result}} </p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        {{--End Content--}}

    </main>

@endsection
