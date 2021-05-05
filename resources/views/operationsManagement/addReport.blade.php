@extends('layouts\master')
@section('content')

    <main class="col-md-8 ms-sm-auto col-lg-10 px-md-4 ">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        {{--Start Content Title--}}

        <div class="border-bottom d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 pr-2 main " >
            <h1 class="h2 mt-2 mb-2 ml-2">إضافة بلاغ وارد</h1>
        </div>

        {{--End Content Title--}}



        {{--Start Content--}}

        <div class="card shadow " >
            <div class="card-header " style="background-color: #F9F9F9;">
                <div class="col-md-12 ">
                    <div class="card-body position-relative">
                        {{-- @if(Session::has('success'))
                             <div class="alert alert-success" role="alert">
                                 {{ Session::get('success') }}
                             </div>
                         @endif--}}

                        <br>
                        {{--//////////////////////////////////////////////////////--}}
                        {{--                    التحقق من الرقم                   --}}
                        {{--//////////////////////////////////////////////////////--}}
                        <form action="{{route('OP_selectBNumber')}}" method="GET">
                            <div class="row ">
                                <div class="form-group raw mt-4 mr-3" style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                    <label class="col-form-label  text-sm-right mt-2">  رقم التشغيلة : </label>
                                    <div class="mt-2  ml-4">
                                        <input type="text" class="form-control" placeholder="رقم التشغيلة  " name="batch_num" id="batch_num">
                                    </div>
                        +        </div>
                                <div class="form-group raw mt-4 " style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                    <button id="query" class="btn btn-primary " type="submit" style="color: white;background-color: #0F122D">
                                        تحقق
                                    </button>
                                </div>
                            </div>
                        </form>
                        @if (isset($drug) && $drug->isEmpty())
                            <form method="POST" action="{{route('OP_store')}}">
                            @csrf
                                {{--  //////////////////////////////////////////////////////--}}
                                {{--                      بيانات المبلغ                   --}}
                                {{--  //////////////////////////////////////////////////////--}}

                             <div class="row">
                                 <h4>بيانات المبلغ</h4>
                             </div>
                             <div class="row border-bottom pb-5">
                                 <div class="form-group raw mt-4 mr-3 " style="display: flex; flex-wrap: wrap;">
                                     <label class="col-form-label text-sm-right mt-2 ">اسم المبلغ : </label>
                                     <div class=" mt-2 ml-4 ">
                                         <input type="text" class="form-control " placeholder="اسم المبلغ" name="authors_name">
                                     </div>
                                     <label class="col-form-label text-sm-right mt-2"> رقم الهاتف : </label>
                                     <div class=" mt-2 ml-4">
                                         <input type="text" class="form-control" placeholder="رقم الهاتف " name="authors_phone">
                                     </div>
                                 </div>
                                 <div class="form-group raw mt-4 mr-3" style="display: flex; flex-wrap: wrap;">
                                     <label class="col-form-label text-sm-right mt-2"> العمر : </label>
                                     <div class=" mt-2 ml-4">
                                         <input type="text" class="form-control" placeholder="العمر " name="authors_age">
                                     </div>
                                     <label class="col-form-label text-sm-right mt-2 ml-0"> الصفة : </label>
                                     <div class=" mt-2 ml-4  ">
                                         <input type="text" class="form-control  " placeholder="الصفة " name="authors_adjective">
                                     </div>
                                 </div>
                             </div>

                                {{--//////////////////////////////////////////////////////--}}
                                {{--                       تفاصيل البلاغ                    --}}
                                {{--//////////////////////////////////////////////////////--}}

                            <div class="row mt-4">
                                <h4>موضوع البلاغ</h4>
                            </div>
                            <div class="row ">
                                <div class="form-group raw mt-4 mr-3" style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                    <label class="col-form-label text-sm-right mt-2">  الاسم التجاري للدواء: </label>
                                    <div class="mt-2 ml-4">
                                        <input name="drug_no" type="hidden" value="0">
                                        <input type="text" class="form-control" placeholder="اسم الدواء" name="commercial_name">
                                    </div>
                                    <label class="col-form-label text-sm-right mt-2 "> الاسم العلمي : </label>
                                    <div class=" mt-2 ml-4 ">
                                        <input type="text" class="form-control" placeholder="الاسم العلمي " name="material_name">
                                    </div>
                                </div>
                                <div class="form-group raw mt-4 mr-3" style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                    <label class="col-form-label text-sm-right mt-2">  اسم الشركة : </label>
                                    <div class="mt-2 ml-4">
                                        <input type="text" class="form-control" placeholder="اسم الشركة" name="company_name">
                                    </div>
                                    <label class="col-form-label text-sm-right mt-2 "> اسم الوكيل : </label>
                                    <div class=" mt-2 ml-4 ">
                                        <input type="text" class="form-control" placeholder="اسم الوكيل " name="agent_name">
                                    </div>
                                </div>
                                <div class="form-group raw mt-4 mr-3" style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">

                                    <input name="site_no" type="hidden" value="{{$site->site_no + 1}}">

                                    <label class="col-form-label text-sm-right mt-2">اسم الصيدلية  : </label>
                                    <div class=" mt-2 ml-4">
                                        <input type="text" class="form-control" placeholder="اسم الصيدلية" name="pharmacy_name">
                                    </div>
                                    <label class="col-form-label text-sm-right mt-2">اسم الشارع  : </label>
                                    <div class=" mt-2 ml-4">
                                        <input type="text" class="form-control" placeholder="اسم الشارع" name="street_name">
                                    </div>
                                </div>
                                <div class="form-group raw mt-4 mr-3" style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                    <label class="col-form-label text-sm-right mt-2">المنطقة : </label>
                                    <div class=" mt-2 ml-4">
                                        <input type="text" class="form-control" placeholder="المنطقة " name="district">
                                    </div>
                                    <label class="col-form-label text-sm-right mt-2">اسم الحي  : </label>
                                    <div class=" mt-2 ml-4">
                                        <input type="text" class="form-control" placeholder="اسم الحي" name="neig_name">
                                    </div>
                                </div>
                                 <div class="form-group raw mt-4 mr-3 " style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                     <label class="col-form-label text-sm-right mt-2">وصف الموقع : </label>
                                     <div class=" mt-2 ml-4">
                                         <textarea  class="form-control" placeholder="وصف الموقع " name="site_dec"></textarea>
                                     </div>
                                 </div>
                                <div class="form-group raw mt-4 mr-3 " style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                    <label class="col-form-label text-sm-right mt-2">ملاحظة المبلغ : </label>
                                    <div class=" mt-2 ml-4">
                                        <textarea id="notes" class="form-control" placeholder="ملاحظة المبلغ" rows="3" name="notes_user"></textarea>
                                    </div>
                                </div>
                                 <div class="form-group raw mt-4 mr-3" style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                     <label class="col-form-label text-sm-right mt-2">نوع البلاغ : </label>
                                     <input type="hidden" class="form-control"  name="type_report_no" value="1">
                                     <div class=" mt-2 ml-4">
                                         <input type="text" class="form-control" placeholder="مهرب" name="type_report" value="مهرب">
                                     </div>
                                     <label class="col-form-label text-sm-right mt-2">الجهه المحال إليها : </label>
                                     <div class="mt-2 ml-4">
                                         <input type="text" class="form-control" placeholder="ادارة الصيدلة"  value="ادارة الصيدلة">
                                     </div>
                                 </div>
                            </div>
                            <div class="form-group raw mt-4 " style="display: flex; flex-wrap: wrap; ">
                                <button id="save" class="btn btn-primary " type="submit" style="margin-right:90%; background-color: #0F122D; color: white">حفظ</button>
                            </div>


                        </form>
                        @elseif(isset($drug) && $drug!=null)
                            <form method="POST" action="{{route('OP_store')}}">
                                @csrf
                                {{--//////////////////////////////////////////////////////--}}
                                {{--                       بيانات المبلغ                   --}}
                                {{--//////////////////////////////////////////////////////--}}

                                <div class="row">
                                    <h4>بيانات المبلغ</h4>
                                </div>
                                <div class="row border-bottom pb-5">
                                    <div class="form-group raw mt-4 mr-3 " style="display: flex; flex-wrap: wrap;">
                                        <label class="col-form-label text-sm-right mt-2 ">اسم المبلغ : </label>
                                        <div class=" mt-2 ml-4 ">
                                            <input type="text" class="form-control " placeholder="اسم المبلغ" name="authors_name">
                                        </div>
                                        <label class="col-form-label text-sm-right mt-2"> رقم الهاتف : </label>
                                        <div class=" mt-2 ml-4">
                                            <input type="text" class="form-control" placeholder="رقم الهاتف " name="authors_phone">
                                        </div>
                                    </div>
                                    <div class="form-group raw mt-4 mr-3" style="display: flex; flex-wrap: wrap;">
                                        <label class="col-form-label text-sm-right mt-2"> العمر : </label>
                                        <div class=" mt-2 ml-4">
                                            <input type="text" class="form-control" placeholder="العمر " name="authors_age">
                                        </div>
                                        <label class="col-form-label text-sm-right mt-2 ml-0"> الصفة : </label>
                                        <div class=" mt-2 ml-4  ">
                                            <input type="text" class="form-control  " placeholder="الصفة " name="authors_adjective">
                                        </div>
                                    </div>
                                </div>

                                {{--//////////////////////////////////////////////////////--}}
                                {{--                       تفاصيل البلاغ                    --}}
                                {{--//////////////////////////////////////////////////////--}}

                                <div class="row mt-4">
                                    <h4>موضوع البلاغ</h4>
                                </div>
                                <div class="row ">
                                    <div class="form-group raw mt-4 mr-3" style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                        <label class="col-form-label text-sm-right mt-2">  اسم الدواء : </label>
                                        <div class="mt-2 ml-4">
                                            @if(isset($drug))
                                                @foreach($drug as $drugs)
                                                    <input type="hidden" class="form-control" placeholder="{{$drugs->drug_no}}  " name="drug_no"
                                                           value="{{$drugs->drug_no}}">
                                                    <input type="text" class="form-control" placeholder="{{$drugs->drug_name}}  " name="drug_name"
                                                           value="{{$drugs->drug_name}}">
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group raw mt-4 mr-3" style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                        <input name="site_no" type="hidden" value="{{$site->site_no + 1}}">

                                        <label class="col-form-label text-sm-right mt-2">اسم الصيدلية  : </label>
                                        <div class=" mt-2 ml-4">
                                            <input type="text" class="form-control" placeholder="اسم الصيدلية" name="pharmacy_name">
                                        </div>
                                        <label class="col-form-label text-sm-right mt-2">اسم الشارع  : </label>
                                        <div class=" mt-2 ml-4">
                                            <input type="text" class="form-control" placeholder="اسم الشارع" name="street_name">
                                        </div>
                                    </div>
                                    <div class="form-group raw mt-4 mr-3" style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                        <label class="col-form-label text-sm-right mt-2">المنطقة : </label>
                                        <div class=" mt-2 ml-4">
                                            <input type="text" class="form-control" placeholder="المنطقة " name="district">
                                        </div>
                                        <label class="col-form-label text-sm-right mt-2">اسم الحي  : </label>
                                        <div class=" mt-2 ml-4">
                                            <input type="text" class="form-control" placeholder="اسم الحي" name="neig_name">
                                        </div>
                                    </div>
                                    <div class="form-group raw mt-4 mr-3 " style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                        <label class="col-form-label text-sm-right mt-2">وصف الموقع : </label>
                                        <div class=" mt-2 ml-4">
                                            <textarea  class="form-control" placeholder="وصف الموقع " name="site_dec"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group raw mt-4 mr-3 " style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                        <label class="col-form-label text-sm-right mt-2">ملاحظة المبلغ : </label>
                                        <div class=" mt-2 ml-4">
                                            <textarea id="notes" class="form-control" placeholder="ملاحظة المبلغ" rows="3" name="notes_user"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group raw mt-4 mr-3" style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                        <label class="col-form-label text-sm-right mt-2">نوع البلاغ : </label>
                                        <div class=" mt-2 ml-4">
                                            <select class="form-control mb-3" name="type_report_no">
                                                <option selected="" ></option>
                                                <option value="2" >مسحوب</option>
                                                <option value="3" >غير مطابق</option>
                                            </select>
                                        </div>
                                        <label class="col-form-label text-sm-right mt-2">الجهه المحال إليها : </label>
                                        <div class="mt-2 ml-4">
                                            <input type="text" class="form-control" placeholder="ادارة الصيدلة"  value="ادارة الصيدلة">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group raw mt-4 " style="display: flex; flex-wrap: wrap; ">
                                    <button id="save" class="btn btn-primary " type="submit" style="margin-right:90%;background-color: #0F122D; color: white">حفظ</button>
                                </div>


                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        {{--End Content--}}

    </main>

@endsection
@push('save_ajax')
    <script>
        $(document).on('click', '#save', function () {

            $.ajax({
                type: 'POST',
                url: '/store',
                data: {
                    '_token':"{{csrf_token()}}",
                    'authors_name':$("input[name='authors_name']").val(),
                    'authors_phone':$("input[name='authors_phone']").val(),
                    'authors_age':$("input[name='authors_age']").val(),
                    'authors_character':$("input[name='authors_character']").val(),
                    'pharmacy_address':$("input[name='pharmacy_address']").val(),
                    'drug_name':$("input[name='drug_name']").val(),
                    'material_name':$("input[name='material_name']").val(),
                    'district':$("input[name='district']").val(),
                    'notes_user':$("#notes").val(),
                    'type_report_no':$("#type_report").val(),
                    'transfer_party':$("#transfer").val(),
                },
                success: function (data) {
                    alert(data);
                },
                error: function (reject) {

                }
            });
        });


    </script>
@endpush
