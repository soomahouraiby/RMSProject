@extends('layouts\master')
@section('content')

    {{--Title--}}
    <main class="col-md-8 ms-sm-auto col-lg-10 px-md-4 ">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 pr-2  border-bottom main " >
            <h1 class="h2  ml-4">إضافة دواء </h1>
        </div>


        {{--Content--}}

        {{--//////////////////////////////////////////////////////--}}
        {{--                    إضافة دواء جديد                    --}}
        {{--//////////////////////////////////////////////////////--}}

        <div class="card shadow mb-0 pb-0" >
            <div class="card-header " style="background-color: #F9F9F9;">
                <div class="row m-2">
                    <h4>بيانات  الدواء</h4>
                </div>
            </div>
            <div class="card-body position-relative mb-0 pb-0" style="background-color: #F9F9F9;">
                <div class="row pb-5">
                    <div class="form-group raw mt-4 " style="display: flex; flex-wrap: wrap; ">
                        <label class="col-form-label   mt-2 mx-4 "> تاريخ الإنتاج : </label>
                        <div class=" mt-2 ">
                            <input type="text" class="form-control" placeholder="تاريخ الإنتاج  ">
                        </div>
                        <label class="col-form-label   mt-2 mx-4  ">  تاريخ الإنتهاء : </label>
                        <div class=" mt-2  ">
                            <input type="text" class="form-control" placeholder="تاريخ الإنتهاء  ">
                        </div>
                    </div>
                    <div class="form-group raw mt-4 " style="display: flex; flex-wrap: wrap; ">
                        <label class="col-form-label   mt-2 mx-4 "> الكمية : </label>
                        <div class=" mt-2 ">
                            <input type="text" class="form-control" placeholder="الكمية">
                        </div>
                        <label class="col-form-label   mt-2 mx-4  ">  السعر : </label>
                        <div class=" mt-2  ">
                            <input type="text" class="form-control" placeholder="السعر ">
                        </div>
                    </div>
                    <div class="form-group raw mt-4 " style="display: flex; flex-wrap: wrap; ">
                        <label class="col-form-label  mt-2 mx-4 ">   الوكيل : </label>
                        <div class=" mt-2  ">
                            <select class="form-control" name="cars" id="cars">
                                @if(isset($agents))
                                    @foreach($agents as $agent)
                                        <option value="">{{$agent->agent_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <label class="col-form-label   mt-2 mx-4 ">  الشركة : </label>
                        <div class=" mt-2  ">
                            <select class="form-control" name="cars" id="cars">
                                @if(isset($companies))
                                    @foreach($companies as $company)
                                        <option value="">{{$company->company_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group raw mt-4 " style="display: flex; flex-wrap: wrap; ">
                        <label class="col-form-label  mt-2 mx-4 ">   الماده الفعاله : </label>
                        <div class=" mt-2  ">
                            <select class="form-control" name="cars" id="cars">
                                @if(isset($agents))
                                    @foreach($agents as $agent)
                                        <option value="">{{$agent->agent_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <label class="col-form-label   mt-2 mx-4 ">  الشركة : </label>
                        <div class=" mt-2  ">
                            <select class="form-control" name="cars" id="cars">
                                @if(isset($companies))
                                    @foreach($companies as $company)
                                        <option value="">{{$company->company_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group raw mt-4 " style="display: flex; flex-wrap: wrap; ">

                        <label class="col-form-label  mt-2 mx-4 ">  اسم الوكيل : </label>
                        <div class=" mt-2">
                            <textarea class="form-control" placeholder="الأثار الجانبيه" rows="3" cols="40"></textarea>
                        </div>
                        <div class="form-group  mt-4 " style="float: right">
                            <button class="btn " type="button" style=" float:right;margin-right:90%; background-color: #5468FF; color:#ffffff">حفظ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
