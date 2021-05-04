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
{{--                    @if(isset($reports))--}}
{{--                        @foreach($reports as $report)--}}
{{--                            @if(route('showFollowingReports'))--}}
{{--                            <a class="badge badge rounded-pill badge-soft-success  align-items-center text-left nav-link active" href="" style="color:#A7613A;  height:25px;"  >--}}
{{--                                <span data-feather="file text-center" class="h6">{{$report -> report_statues}}</span>--}}
{{--                            </a>--}}
{{--                            @elseif(route('showFollowDoneReports'))--}}
{{--                                <a class="badge badge rounded-pill badge-soft-success  align-items-center text-left nav-link active" href="" style=" color:#5468FF;   height:25px;"  >--}}
{{--                                    <span data-feather="file text-center" class="h6">{{$report -> report_statues}}</span>--}}
{{--                                </a>--}}
{{--                            @elseif(route('showReports'))--}}
{{--                                <a class="badge badge rounded-pill badge-soft-success  align-items-center text-left nav-link active" href="" style=" color:#5468FF;   height:25px;"  >--}}
{{--                                    <span data-feather="file text-center" class="h6"></span>--}}
{{--                                </a>--}}
{{--                            @elseif(route('showDoneReports'))--}}
{{--                                <a class="badge badge rounded-pill badge-soft-success  align-items-center text-left nav-link active" href="" style="color:#00864E;   height:25px;"  >--}}
{{--                                    <span data-feather="file text-center" class="h6">{{$report -> report_statues}}</span>--}}
{{--                                </a>--}}
{{--                            @elseif(route('showTransferReports'))--}}
{{--                                <a class="badge badge rounded-pill badge-soft-success  align-items-center text-left nav-link active" href="" style=" color:#7D899B;    height:25px;"  >--}}
{{--                                    <span data-feather="file text-center" class="h6">{{$report -> report_statues}}</span>--}}
{{--                                </a>--}}
{{--                            @else--}}
{{--                                <a class="badge badge rounded-pill badge-soft-success  align-items-center text-left nav-link active" href="" style="  color:#3a416f;   height:25px;"  >--}}
{{--                                    <span data-feather="file text-center" class="h6">بــــــــــلاغ وارد</span>--}}
{{--                                </a>--}}
{{--                            @endif--}}
{{--                            @break($report)--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
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
                        @if(isset($reports))
                            @foreach($reports as $report)
                                <tr class="btn-reveal-trigger">
                                    <td class="align-middle" style="width: 28px;">
                                        <div class="form-check mb-2 mt-2 d-flex align-items-center"><input class="form-check-input" type="checkbox" id="recent-purchase-0" data-bulk-select-row="data-bulk-select-row" /></div>
                                    </td>
                                    <td class="align-middle white-space-nowrap text-left name "><a href="">{{$report -> app_user_name}}</a></td>
                                    <td class="align-middle white-space-nowrap text-left email"><a href="">{{$report -> report_date}}</a></td>
                                    <td class="align-middle white-space-nowrap text-left email"><a href="">{{$report -> transfer_date}}</a></td>
                                    <td class="align-middle white-space-nowrap text-left email"><a href="">{{$report -> transfer_party}}</a></td>
                                    <td class="align-middle white-space-nowrap text-left product"><a href="">{{$report-> type_report}}</a></td>
                                    @if($report->report_statues=='قيد المتابعة')
                                        <td class="align-middle text-left  white-space-nowrap payment">
                                            <a class="badge badge rounded-pill badge-soft-success  align-items-center text-left nav-link active" href="{{route('detailsReport',$report->report_no)}}" style="background-color:#FDE6D8; color:#A7613A;  height:25px;"  >
                                                <span data-feather="file  text-center">{{$report -> report_statues}}</span>
                                                <i class="fas fa-file-contract ml-3"></i>
                                            </a>
                                        </td>
                                    @elseif($report->report_statues=='تمت المتابعة')
                                            <td class="align-middle text-left  white-space-nowrap payment">
                                                <a class="badge badge rounded-pill badge-soft-success  align-items-center text-left nav-link active" href="{{route('detailsReport',$report->report_no)}}" style="background-color:#D9DEFF; color:#5468FF;  height:25px;"  >
                                                    <span data-feather="file  text-center">{{$report -> report_statues}}</span>
                                                    <i class="fas fa-file-contract ml-3"></i>
                                                </a>
                                            </td>
                                    @elseif($report -> report_statues=='تم الانهاء')
                                        <td class="align-middle text-left  white-space-nowrap payment">
                                            <a class="badge badge rounded-pill badge-soft-success  align-items-center text-left nav-link active" href="{{route('detailsReport',$report->report_no)}}" style="background-color:#CCF6E4; color:#00864E; height:25px;"  >
                                                <span data-feather="file  text-center">{{$report -> report_statues}}</span>
                                                <i class="fas fa-file-contract ml-3"></i>
                                            </a>
                                        </td>
                                    @elseif($report -> report_statues=='محول للمتابعة')
                                        <td class="align-middle text-left  white-space-nowrap payment">
                                            <a class="badge badge rounded-pill badge-soft-success  align-items-center text-left nav-link active" href="{{route('detailsReport',$report->report_no)}}" style="background-color:#E3E6EA; color:#7D899B; height:25px;"  >
                                                <span data-feather="file  text-center">{{$report -> report_statues}}</span>
                                                <i class="fas fa-file-contract ml-3"></i>
                                            </a>
                                        </td>
                                    @else
                                        <td class="align-middle text-left  white-space-nowrap payment">
                                            <a class="badge badge rounded-pill badge-soft-success  align-items-center text-left nav-link active" href="{{route('detailsReport',$report->report_no)}}" style="background-color:#ffffff; color:#3a416f; height:25px;"  >
                                                <span data-feather="file  text-center">بــــــــــلاغ وارد</span>
                                                <i class="fas fa-file-contract ml-3"></i>
                                            </a>
                                        </td>
                                    @endif
{{--                                    <td class="align-middle white-space-nowrap">--}}
{{--                                        <div class="dropdown font-sans-serif">--}}
{{--                                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-right" type="button" id="dropdown0" data-toggle="dropdown">--}}
{{--                                                <span class="fas fa-ellipsis-h fs--1"></span>--}}
{{--                                            </button>--}}
{{--                                                <div class="dropdown-menu dropdown-menu-right border py-2" aria-labelledby="dropdown0">--}}
{{--                                                    <a class="dropdown-item" href="{{route('detailsReport',$report->report_no)}}">تـفـاصـيـل</a>--}}
{{--                                                </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </main>

@endsection
