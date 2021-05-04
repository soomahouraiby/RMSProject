@extends('layouts\master')
@section('content')

    <main class="col-md-8 ms-sm-auto col-lg-10 px-md-4 ">

        {{--Title--}}
        <div class=" col-lg-12 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 pr-2  border-bottom main " >
            <h1 class="col-lg-4  h2  ml-4">متابعة وإدارة البلاغات</h1>
            <div class="btn-toolbar col-lg-8 ">
                <input class="col-lg-4 form-control form-control-dark w-50 mr-5" type="text" placeholder="بحث" aria-label="بحث" size="30" style="border: 2px solid #ECECEC;
                    border-radius: 20px;">
                <div class="dropdown ">
                    <button type="button " class="btn btn-sm dropdown-toggle mr-4 ml-4 button" data-toggle="dropdown" id="btn">
                        حالة البـلاغ
                    </button>
                    <div class="dropdown-menu dropdown-menu-right bg-light">
                        <a class="dropdown-item m-2 " href="{{route('showReports')}}">جميع البلاغات</a>
                        <a class="dropdown-item m-2" href="{{route('showNewReports')}}">بلاغات وارده</a>
                        <a class="dropdown-item m-2" href="{{route('showTransferReports')}}">محول للمتابعة</a>
                        <a class="dropdown-item m-2" href="{{route('showFollowingReports')}}">قيد المتابعة</a>
                        <a class="dropdown-item m-2" href="{{route('showFollowDoneReports')}}">تم متابعتها</a>
                        <a class="dropdown-item m-2" href="{{route('showDoneReports')}}">تم انهائها</a>
                    </div>
                </div>
            </div>
        </div>


        {{--Content--}}
        <div class="card shadow mb-3 w-9" style=" width:85%;background-color: #F9F9F9;">
            <div class="card-body px-0 py-0" style="background-color: #F9F9F9;">
                <div class="table-responsive scrollbar">
                    <table class="table table-hover fs--1 mb-0 " style="background-color: #F9F9F9;">
                        <thead class="bg-200 text-900">
                        <tr>
                            <th>
                                <div class="form-check mb-2 mt-2 d-flex align-items-center mb-3 mt-3"><input class="form-check-input" id="checkbox-bulk-purchases-select" type="checkbox" data-bulk-select='{"body":"table-purchase-body","actions":"table-purchases-actions","replacedElement":"table-purchases-replace-element"}' /></div>
                            </th>
                            <th class="sort pr-1 align-middle white-space-nowrap text-left" data-sort="name">اسم المبلغ</th>
                            <th class="sort pr-1 align-middle white-space-nowrap text-left" data-sort="email">تاريخ البلاغ</th>
                            <th class="sort pr-1 align-middle white-space-nowrap text-left" data-sort="product">تاريخ التحويل</th>
                            <th class="sort pr-1 align-middle white-space-nowrap text-left" data-sort="payment">الجهه المُحال إليها</th>
                            <th class="sort pr-1 align-middle white-space-nowrap text-left" data-sort="product">نوع البلاغ</th>
                            <th class="sort pr-1 align-middle white-space-nowrap text-left" data-sort="amount">حالة البلاغ</th>
                            <th class="sort pr-1 align-middle white-space-nowrap text-left" data-sort="amount"></th>
                        </tr>
                        </thead>
                        <tbody class="list" id="table-purchase-body">
                            <tr class="btn-reveal-trigger">
                                <td class="align-middle" style="width: 28px;">
                                    <div class="form-check mb-2 mt-2 d-flex align-items-center"><input class="form-check-input" type="checkbox" id="recent-purchase-0" data-bulk-select-row="data-bulk-select-row" /></div>
                                </td>
                                <td class="align-middle white-space-nowrap text-left name "><a href=""></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </main>

@endsection
