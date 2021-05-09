<?php
namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Procedures;
use App\Models\Report_detailes;
use App\Models\Sites;
use App\Models\Commercial_drugs;
use App\Models\App_users;
use App\Models\Reports;
use App\Models\Types_report;
use App\Models\User;
use App\Request\ReportsRequest;
use App\Models\Shipments;
use App\Models\Combinations;
use App\Models\Effective_materials;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Type;
use phpDocumentor\Reflection\Types\Nullable;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:المدير العام']);
    }


    //////////////// [ Show .. بلاغات وارده ]  ////////////////
    public function showReports(){
        $reports=DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','app_user.app_user_name','reports.report_statues' ,'reports.state',
                'reports.report_date','reports.transfer_party', 'types_reports.type_report','reports.transfer_date')
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();
        return view('Management/showReports',compact('reports'));
    }




    //////////////// [ Details .. البلاغ ]  ////////////////
    public function detailsReport($report_no){
        $report = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$report)
            return redirect()->back();

        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')

            ->select('reports.report_no','reports.authors_name','reports.authors_phone','reports.opmanage_notes',
                'app_user.app_user_name','app_user.app_user_phone','reports.commercial_name'
                ,'site.pharmacy_name','types_reports.type_report','reports.report_date','reports.report_statues')

            ->where('report_no','=', $report_no)->get();

        $procedures= DB::table('procedures')
            ->select('procedures.report_no','procedures.procedure_result','procedures.procedure','procedures.procedure_date')
            ->where('report_no','=',$report_no)->get();

        return view('Management/detailsReport',compact('reports','procedures'));
    }




    //////////////// [ Filter .. بلاغات وارده ]  ////////////////
    public function showNewReports(){
        $reports=DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','app_user.app_user_name','reports.report_statues' ,'reports.state',
                'reports.report_date','reports.transfer_party', 'types_reports.type_report','reports.transfer_date')
            ->where('transfer_date','=',null)
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();
        return view('Management/showReports',compact('reports'));
    }

    //////////////// [ Filter .. بلاغات وارده ]  ////////////////
    public function showTransferReports(){
        $reports=DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','app_user.app_user_name','reports.report_statues' ,'reports.state',
                'reports.report_date','reports.transfer_party', 'types_reports.type_report','reports.transfer_date')
            ->where('report_statues','=','محول للمتابعة')
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();
        return view('Management/showReports',compact('reports'));
    }

    //////////////// [ Filter .. بلاغات وارده ]  ////////////////
    public function showFollowingReports(){
        $reports=DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','app_user.app_user_name','reports.report_statues' ,'reports.state',
                'reports.report_date','reports.transfer_party', 'types_reports.type_report','reports.transfer_date')
            ->where('report_statues','=','قيد المتابعة')
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();
        return view('Management/showReports',compact('reports'));
    }

    //////////////// [ Filter .. بلاغات وارده ]  ////////////////
    public function showFollowDoneReports(){
        $reports=DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','app_user.app_user_name','reports.report_statues' ,'reports.state',
                'reports.report_date','reports.transfer_party', 'types_reports.type_report','reports.transfer_date')
            ->where('report_statues','=','تمت المتابعة')
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();
        return view('Management/showReports',compact('reports'));
    }

    //////////////// [ Filter .. بلاغات وارده ]  ////////////////
    public function showDoneReports(){
        $reports=DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','app_user.app_user_name','reports.report_statues' ,'reports.state',
                'reports.report_date','reports.transfer_party', 'types_reports.type_report','reports.transfer_date')
            ->where('report_statues','=','تم الانهاء')
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();
        return view('Management/showReports',compact('reports'));
    }

}
