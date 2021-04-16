@extends('layouts\master')
@section('content')

    <main class="col-md-8 ms-sm-auto col-lg-10 px-md-4 ">

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
                                         <input type="text" class="form-control  " placeholder="الصفة " name="authors_character">
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
                                    <label class="col-form-label  text-sm-right mt-2">  الرقم المميز : </label>
                                    <div class="mt-2  ml-4">
                                        <input type="text" class="form-control" placeholder="الرقم المميز  " name="batch_no">
                                    </div>
                                </div>
                                <div class="form-group raw mt-4 " style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                    <button id="query" class="btn btn-primary "  >تحقق</button>
                                </div>
                                <div class="form-group raw mt-4 mr-3" style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                    <label class="col-form-label text-sm-right mt-2">  اسم الدواء : </label>
                                    <div class="mt-2 ml-4">
                                        <input type="text" class="form-control" placeholder="الاسم التجاري  " name="drug_name">

                                    </div>
                                    <label class="col-form-label text-sm-right mt-2 "> التركيبة العلمية : </label>
                                    <div class=" mt-2 ml-4 ">
                                        <input type="text" class="form-control" placeholder="الاسم العلمي " name="material_name">
                                    </div>
                                </div>
                                <div class="form-group raw mt-4 mr-3" style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                    <label class="col-form-label text-sm-right mt-2">اسم الصيديلة  : </label>
                                    <div class=" mt-2 ml-4">
                                        <input type="text" class="form-control" placeholder="اسم الصيديلة" name="pharmacy_address">
                                    </div>
                                    <label class="col-form-label text-sm-right mt-2">المنطقة : </label>
                                    <div class=" mt-2 ml-4">
                                        <input type="text" class="form-control" placeholder="المنطقة " name="district">
                                    </div>
                                </div>
                                 <div class="form-group raw mt-4 mr-3 " style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                     <label class="col-form-label text-sm-right mt-2">وصف الموقع : </label>
                                     <div class=" mt-2 ml-4">
                                         <input type="text" class="form-control" placeholder="وصف الموقع ">
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
                                         <select class="form-control mb-3" id="type_report">
                                             <option selected="" value="4">غير معروف</option>
                                             <option value="1">مهرب</option>
                                             <option value="2">مسحوب</option>
                                             <option value="3">غير مطابق</option>
                                         </select>
                                     </div>
                                     <label class="col-form-label text-sm-right mt-2">الجهه المحال إليها : </label>
                                     <div class="mt-2 ml-4">
                                         <select class="form-control mb-3" id="transfer">
                                             <option selected="" value="إدارة الصيدلة">إدارة الصيدلة</option>
                                         </select>
                                     </div>
                                 </div>
                            </div>
                            <div class="form-group raw mt-4 " style="display: flex; flex-wrap: wrap; margin-left: -12px; margin-right: -12px;">
                                <button id="save" class="btn btn-primary "  >حفظ</button>
                            </div>

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
                    'transfered_party':$("#transfer").val(),
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
