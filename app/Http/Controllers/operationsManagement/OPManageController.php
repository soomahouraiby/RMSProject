<?php
namespace App\Http\Controllers\operationsManagement;

use App\Http\Controllers\Controller;
use App\Models\Batch_number;
use App\Models\Report_detailes;
use App\Models\Sites;
use App\Models\Commercial_drugs;
use App\Models\App_users;
use App\Models\Reports;
use App\Models\Types_report;
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
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class OPManageController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:مدير العمليات']);
    }
    //عشان عرض البلاغات الوارده
    public function newReports()
    {
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.types_report_id', '=', 'types_reports.id')
            ->join('app_users', 'reports.app_user_id', '=', 'app_users.id')
            ->select('reports.id ','app_users.name '
                , 'reports.date ', 'types_reports.name as type_report')

            ->where('types_reports.name','!=','اعراض جانبية')
            ->where('state','=',0)
            ->where('types_reports.name','!=','جودة')
            ->get();
        //return response($reports);
        return view('operationsManagement.newReports', compact('reports'));

    }
    // عشان اللفلترة حق البلاغات الوارده المهربة
    public function newSmuggledReports()
    {
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.types_report_id', '=', 'types_reports.id')
            ->join('app_users', 'reports.app_user_id', '=', 'app_users.id')
            ->select('reports.id ','app_users.name '
                , 'reports.date ', 'types_reports.name as type_report')

            ->where('state','=',0)
            ->where('types_reports.name','=','مهرب')
            ->get();
        return view('operationsManagement.newReports', compact('reports'));
    }
//عشان اللفلترة حق البلاغات الوارده المسحوبة
    public function newDrownReports()
    {
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.types_report_id', '=', 'types_reports.id')
            ->join('app_users', 'reports.app_user_id', '=', 'app_users.id')
            ->select('reports.id ','app_users.name '
                , 'reports.date ', 'types_reports.name as type_report')

            ->where('state','=',0)
            ->where('types_reports.name','=','مسحوب')
            ->get();
        return view('operationsManagement.newReports', compact('reports'));
    }
    //عشان اللفلترة حق البلاغات الوارده الغير مطابقة
    public function newDiffrentReports()
    {
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.types_report_id', '=', 'types_reports.id')
            ->join('app_users', 'reports.app_user_id', '=', 'app_users.id')
            ->select('reports.id ','app_users.name '
                , 'reports.date ', 'types_reports.name as type_report')

            ->where('state','=',0)
            ->where('types_reports.name','=','غير مطابق')
            ->get();
        return view('operationsManagement.newReports', compact('reports'));
    }
    //عشان اللفلترة حق البلاغات الوارده المستثناه
    public function newExceptionReports()
    {
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.types_report_id', '=', 'types_reports.id')
            ->join('app_users', 'reports.app_user_id', '=', 'app_users.id')
            ->select('reports.id ','app_users.name '
                , 'reports.date ', 'types_reports.name as type_report')

            ->where('state','=',0)
            ->where('types_reports.name','=','مستثناء')
            ->get();
        return view('operationsManagement.newReports', compact('reports'));
    }

//عشان تفاصيل كل البلاغات المسحوبة والغير مطابقة
    public function detailsReport($id){
        $reports = DB::table('reports')->select('reports.id')
            ->where('reports.id','=', $id)->get();  // search in given table id only
        if (!$reports)
            return redirect()->back();

        $report = DB::table('reports')
            ->join('types_reports', 'reports.types_report_id', '=', 'types_reports.id')
            ->join('app_users', 'reports.app_user_id', '=', 'app_users.id')
            ->select('reports.id ','reports.pharmacy_title', 'reports.street_name ',
                'reports.neig_name ','reports.site_dec ', 'reports.notes_user ','reports.batch_number',
                'reports.drug_picture','reports.date ',
                'app_users.name ','app_users.phone ', 'app_users.adjective','app_users.age',
                'reports.date ', 'types_reports.name as type_report')
            ->where('reports.id', '=', $id)->get();

        $r = DB::table('reports')->select('reports.batch_number ')
            ->where('reports.id', '=', $id)->get();

        $drug=DB::table('batch_numbers')
            ->join('commercial_drugs', 'batch_numbers.commercial_id', '=', 'commercial_drugs.id')
            ->select('commercial_drugs.name as drug_name', 'commercial_drugs.photo as drug_photo',
                'commercial_drugs.how_use','commercial_drugs.side_effects','commercial_drugs.id')
            ->where('batch_numbers.batch_num','=', $r)->get();
        return view('operationsManagement.detailsReport', compact('report' ,'drug'));

    }
//عشان تفاصيل كل البلاغات المهربة
    public function detailsSmuggledReport($id){
        //استخدمت هذا بدل find
        $reports = DB::table('reports')->select('reports.id')
            ->where('reports.id','=', $id)->get();  // search in given table id only
        if (!$reports)
            return redirect()->back();

        $report = DB::table('reports')
            ->join('types_reports', 'reports.types_report_id', '=', 'types_reports.id')
            ->join('app_users', 'reports.app_user_id', '=', 'app_users.id')
            ->select('reports.id ','reports.pharmacy_title', 'reports.street_name ',
                'reports.neig_name ','reports.site_dec ', 'reports.notes_user ','reports.batch_number',
                'reports.drug_picture','reports.date ',
                'app_users.name ','app_users.phone ', 'app_users.adjective','app_users.age',
                'reports.date ', 'types_reports.name as type_report',
                'reports.commercial_name','reports.material_name','reports.companies_name',
                'reports.agent_name')
            ->where('reports.id', '=', $id)->get();

        return view('operationsManagement.detailsSmuggledReport', compact('report'));
    }


//عشان تفاصيل كل البلاغات المسحوبة والغير مطابقة بدون زر التحويل
    public function detailsReport2($id){
        $reports = DB::table('reports')->select('reports.id')
            ->where('reports.id','=', $id)->get();  // search in given table id only
        if (!$reports)
            return redirect()->back();

        $report = DB::table('reports')
            ->join('types_reports', 'reports.types_report_id', '=', 'types_reports.id')
            ->join('app_users', 'reports.app_user_id', '=', 'app_users.id')
            ->select('reports.id ','reports.pharmacy_title', 'reports.street_name ',
                'reports.neig_name ','reports.site_dec ', 'reports.notes_user ','reports.batch_number',
                'reports.drug_picture','reports.date ',
                'app_users.name ','app_users.phone ', 'app_users.adjective','app_users.age',
                'reports.date ', 'types_reports.name as type_report')
            ->where('reports.id', '=', $id)->get();

        $r = DB::table('reports')->select('reports.batch_number ')
            ->where('reports.id', '=', $id)->get();

        $drug=DB::table('batch_numbers')
            ->join('commercial_drugs', 'batch_numbers.commercial_id', '=', 'commercial_drugs.id')
            ->select('commercial_drugs.name as drug_name', 'commercial_drugs.photo as drug_photo',
                'commercial_drugs.how_use','commercial_drugs.side_effects','commercial_drugs.id')
            ->where('batch_numbers.batch_num','=', $r)->get();


        $reports2 = DB::table('reports')->select('reports.id')
            ->where('reports.id','=', $id)->get();  // search in given table id only
        if (!$reports2)
            return redirect()->back();

        $report2 = DB::table('reports')
            ->join('types_reports', 'reports.types_report_id', '=', 'types_reports.id')
            ->select('reports.id ','reports.pharmacy_title', 'reports.street_name ',
                'reports.neig_name ','reports.site_dec ', 'reports.notes_user ','reports.batch_number',
                'reports.drug_picture','reports.date ',
                'reports.amount_name ','reports.phone ', 'reports.adjective','reports.age',
                'reports.date as report_date', 'types_reports.name as type_report')
            ->where('reports.id', '=', $id)->get();
        return view('operationsManagement.detailsReport2', compact('report' ,'drug','report2'));

    }
 //عشان تفاصيل كل البلاغات المهربة بدون زر التحويل
    public function detailsSmuggledReport2($id){
        //استخدمت هذا بدل find
        $reports = DB::table('reports')->select('reports.id')
            ->where('reports.id','=', $id)->get();  // search in given table id only
        if (!$reports)
            return redirect()->back();

        $report = DB::table('reports')
            ->join('types_reports', 'reports.types_report_id', '=', 'types_reports.id')
            ->join('app_users', 'reports.app_user_id', '=', 'app_users.id')
            ->select('reports.id ','reports.pharmacy_title', 'reports.street_name ',
                'reports.neig_name ','reports.site_dec ', 'reports.notes_user ','reports.batch_number',
                'reports.drug_picture','reports.date ',
                'app_users.name ','app_users.phone ', 'app_users.adjective','app_users.age',
                'reports.date ', 'types_reports.name as type_report',
                'reports.commercial_name','reports.material_name','reports.companies_name',
                'reports.agent_name')
            ->where('reports.id', '=', $id)->get();

        $reports2 = DB::table('reports')->select('reports.id')
            ->where('reports.id','=', $id)->get();  // search in given table id only
        if (!$reports2)
            return redirect()->back();

        $report2 = DB::table('reports')
            ->join('types_reports', 'reports.types_report_id', '=', 'types_reports.id')
            ->select('reports.id ','reports.pharmacy_title', 'reports.street_name ',
                'reports.neig_name ','reports.site_dec ', 'reports.notes_user ','reports.batch_number',
                'reports.drug_picture','reports.date ',
                'reports.amount_name ','reports.phone ', 'reports.adjective','reports.age',
                'reports.date ', 'types_reports.name as type_report',
            'reports.commercial_name','reports.material_name','reports.companies_name',
                'reports.agent_name')
            ->where('reports.id', '=', $id)->get();

        return view('operationsManagement.detailsSmuggledReport2', compact('report','report2'));
    }

//عشان تفاصيل الدواء
    public function detailsDrug($id){

        $r = DB::table('commercial_drugs')
            ->join('combinations', 'combinations.drug_no', '=','commercial_drugs.drug_no')
            ->join('effective_materials', 'combinations.material_no', '=', 'effective_materials.material_no')
            ->join('batch_number', 'batch_number.drug_no', '=','commercial_drug.drug_no')
            ->join('shipments', 'batch_number.shipment_no', '=', 'shipments.shipment_no')
            ->join('agents', 'commercial_drug.agent_no', '=', 'agents.agent_no')
            ->join('companies', 'commercial_drug.company_no', '=', 'companies.company_no')
            ->select('commercial_drug.drug_name','commercial_drug.how_to_use'
                ,'commercial_drug.side_effects','commercial_drug.drug_no','agents.agent_name'
                ,'effective_material.material_name','companies.company_name','companies.company_country'
                ,'batch_number.batch_num','shipments.production_date','shipments.expiry_date'
                ,'shipments.shipment_drawn','shipments.exception')
            ->where('commercial_drug.drug_no','=',$id)
            ->get();


        return view('operationsManagement/detailsDrug',compact('r'));
        // return response($r) ;

    }

//عشان تحويل البلاغات الوارده
    public function transferReports($report_no,Request $request)
    {
        $reports = DB::table('reports')->select('reports.transfer_party')
            ->where('report_no', '=', $report_no)
            ->update(['transfer_party' => 'ادارة الصيدلة',
                'transfer_date' => Carbon::now()->toDateTimeString()
                ,'state'=>1,'reports.report_statues'=>'محول للمتابعة']);
        return redirect()->back()->with(['success' => 'تم التحويل بنجاح ']);
    }

// عشان عرض المتابعة للبلاغات
    public function followReports(){
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','app_user.app_user_name',
                'reports.report_date', 'reports.transfer_date','reports.transfer_party',
                'reports.report_statues' , 'types_reports.type_report')
            ->where('report_statues','!=',null)
            ->where('transfer_party','!=',null)
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();

        $reports2 = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->select('reports.report_no','reports.authors_name',
                'reports.report_date', 'reports.transfer_date','reports.transfer_party',
                'reports.report_statues' , 'types_reports.type_report')
            ->where('app_user_no','=',null)
            ->where('report_statues','!=',null)
            ->where('transfer_party','!=',null)
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();
        return view('operationsManagement/followReports',compact('reports','reports2'));
    }
    //عشان اللفلترة حق محول للمتابعة
    public function transferFollowingReports(){
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','app_user.app_user_name',
                'reports.report_date', 'reports.transfer_date','reports.transfer_party',
                'reports.report_statues' , 'types_reports.type_report')
            ->where('report_statues','=','محول للمتابعة')
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();

        $reports2 = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->select('reports.report_no','reports.authors_name',
                'reports.report_date', 'reports.transfer_date','reports.transfer_party',
                'reports.report_statues' , 'types_reports.type_report')
            ->where('app_user_no','=',null)
            ->where('report_statues','!=',null)
            ->where('transfer_party','!=',null)
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();

        return view('operationsManagement/followReports',compact('reports','reports2'));
    }
    //عشان اللفلترة حق قيد المتابعة
    public function followingReports(){
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','reports.authors_name','app_user.app_user_name',
                'reports.report_date', 'reports.transfer_date','reports.transfer_party',
                'reports.report_statues' , 'types_reports.type_report')
            ->where('report_statues','=','قيد المتابعة')
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();

        $reports2 = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->select('reports.report_no','reports.authors_name',
                'reports.report_date', 'reports.transfer_date','reports.transfer_party',
                'reports.report_statues' , 'types_reports.type_report')
            ->where('app_user_no','=',null)
            ->where('report_statues','!=',null)
            ->where('transfer_party','!=',null)
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();

        return view('operationsManagement/followReports',compact('reports','reports2'));
    }
    //عشان اللفلترة حق تمت المتابعة
    public function followDoneReports(){
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','reports.authors_name','app_user.app_user_name',
                'reports.report_date', 'reports.transfer_date','reports.transfer_party',
                'reports.report_statues' , 'types_reports.type_report')
            ->where('report_statues','=','تمت المتابعة')
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();

        $reports2 = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->select('reports.report_no','reports.authors_name',
                'reports.report_date', 'reports.transfer_date','reports.transfer_party',
                'reports.report_statues' , 'types_reports.type_report')
            ->where('app_user_no','=',null)
            ->where('report_statues','!=',null)
            ->where('transfer_party','!=',null)
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();

        return view('operationsManagement/followReports',compact('reports','reports2'));
    }
    //عشان اللفلترة حق تم الانهاء
    public function doneReports(){
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','reports.authors_name','app_user.app_user_name',
                'reports.report_date', 'reports.transfer_date','reports.transfer_party',
                'reports.report_statues' , 'types_reports.type_report')
            ->where('report_statues','=','تم الانهاء')
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();
        return view('operationsManagement/followReports',compact('reports'));
    }

//عشان تفاصيل الذي تمت المتابعه
    public function followedUp($report_no){
        $reports = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$reports)
            return redirect()->back();

        $report = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')
            //->join('commercial_drug', 'reports.drug_no', '=', 'commercial_drug.drug_no')
            ->select('reports.report_no','reports.authors_name','reports.authors_phone',
            'app_user.app_user_name','app_user.app_user_phone','reports.commercial_name'
                ,'site.pharmacy_name','types_reports.type_report','reports.report_date')
            ->where('report_no','=', $report_no)->get();


        $report2 = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$report2)
            return redirect()->back();

        $report2 = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')
            ->select('reports.report_no','reports.authors_name','reports.authors_phone',
                'reports.report_date', 'reports.transfer_date','reports.transfer_party','site.pharmacy_name',
                'reports.report_statues' , 'types_reports.type_report')
            ->where('app_user_no','=',null)
            ->where('report_statues','!=',null)
            ->where('transfer_party','!=',null)
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->where('report_no','=', $report_no)
            ->get();



        $procedures=DB::table('procedures')->select('procedures.procedure'
            ,'procedures.procedure_date','procedures.procedure_result')
            ->where('report_no','=', $report_no)->get();

        return view('operationsManagement/followedUp',compact('report','procedures','report2'));
    }
//والمحوله //عشان تفاصيل الذي قيد المتابعه
    public function followedUp2($report_no){
        $reports = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$reports)
            return redirect()->back();

        $report = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')
            ->select('reports.report_no','reports.authors_name','reports.authors_phone',
            'app_user.app_user_name','app_user.app_user_phone','reports.commercial_name'
                ,'site.pharmacy_name','types_reports.type_report','reports.report_date','reports.report_statues')
            ->where('report_no','=', $report_no)->get();

        $report2 = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$report2)
            return redirect()->back();

        $report2 = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')
            ->select('reports.report_no','reports.authors_name','reports.authors_phone',
                'reports.report_date', 'reports.transfer_date','reports.transfer_party','site.pharmacy_name',
                'reports.report_statues' , 'types_reports.type_report')
            ->where('app_user_no','=',null)
            ->where('report_statues','!=',null)
            ->where('transfer_party','!=',null)
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->where('report_no','=', $report_no)
            ->get();

        $procedures=DB::table('procedures')->select('procedures.procedure'
            ,'procedures.procedure_date','procedures.procedure_result')
            ->where('report_no','=', $report_no)->get();

        return view('operationsManagement/followedUp2',compact('report','procedures','report2'));
    }
//عشان تفاصيل الذي تم الانهاء
    public function followedUp3($report_no){
        $reports = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$reports)
            return redirect()->back();

        $report = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')
            ->select('reports.report_no','reports.authors_name','reports.authors_phone',
            'app_user.app_user_name','app_user.app_user_phone','reports.commercial_name','reports.report_date'
                ,'site.pharmacy_name','types_reports.type_report','reports.opmanage_notes')
            //->where('opmanage_notes','!=',null)
            ->where('report_no','=', $report_no)
            ->get();

        $report2 = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$report2)
            return redirect()->back();

        $report2 = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')
            ->select('reports.report_no','reports.authors_name','reports.authors_phone',
                'reports.report_date', 'reports.transfer_date','reports.transfer_party','site.pharmacy_name',
                'reports.report_statues' , 'types_reports.type_report')
            ->where('app_user_no','=',null)
            ->where('report_statues','!=',null)
            ->where('transfer_party','!=',null)
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->where('report_no','=', $report_no)
            ->get();



        $procedures=DB::table('procedures')->select('procedures.procedure'
            ,'procedures.procedure_date','procedures.procedure_result')
            ->where('report_no','=', $report_no)->get();

        return view('operationsManagement/followedUp3',compact('report','procedures','report2'));
    }

//عشان حفظ ملاحظة المدير على البلاغ
    public function editReport($report_no){
        $reports = Reports::find($report_no);
        return view('operationsManagement/doneReports',compact('reports'));
    }
    public function saveOPMNotes($report_no,Request $request)
    {
        Reports::select('reports.report_no')
            ->where('report_no', '=', $report_no)
            ->update(['opmanage_notes' => $request->opmanage_notes,
                'reports.report_statues'=>'تم الانهاء' ]);
        $reports = DB::table('reports')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','reports.authors_name','app_user.app_user_name',
                'reports.report_date', 'reports.transfer_date','reports.transfer_party','reports.report_statues' )
            ->where('report_statues','!=',null)
            ->get();
        return view('operationsManagement/followReports',compact('reports'))
            ->with(['success' => 'تم الانهاء بنجاح ']);
    }

//عشان اضافة بلاغ
    public function addReport(){
        return view('operationsManagement/addReport');
    }
    public function selectBNumber(Request $request){
        $batch_no = $request->input('batch_num');

        $drug=DB::table('batch_number')
            ->join('commercial_drug', 'batch_number.drug_no', '=', 'commercial_drug.drug_no')
            ->select('commercial_drug.drug_name','commercial_drug.drug_no')
            ->where('batch_num','=', $batch_no)->get();

        $site=Sites::orderByDesc('site_no')->first('site_no');



        return view('operationsManagement/addReport',compact('drug','site'));



    }
    public function store(Request  $request): \Illuminate\Http\RedirectResponse
    {

        $this->validate($request, [
            'type_report_no' => 'required',
        ]);


        $reports = DB::table('reports')->insert([
            'authors_name' =>   $request->input('authors_name'),
            'authors_phone' =>  $request->input('authors_phone'),
            'authors_adjective' => $request->input('authors_adjective'),
            'authors_age' => $request->input('authors_age'),
            'report_date'=>Carbon::now()->toDateTimeString(),
            'transfer_party' =>'ادارة الصيدلة',
            'transfer_date'=>Carbon::now()->toDateTimeString(),
            'commercial_name' =>   $request->input('commercial_name'),
            'material_name' =>  $request->input('material_name'),
            'company_name' => $request->input('company_name'),
            'agent_name' => $request->input('agent_name'),
//            'batch_number' => $request->input('batch_number'),
            'district' => $request->input('district'),
            'report_statues'=>'محول للمتابعة',
            'notes_user' =>$request->input('notes_user'),
            'state'=>1,
            'type_report_no' =>$request->input('type_report_no'),
            'site_no' =>$request->input('site_no'),
            'drug_no' =>$request->input('drug_no'),
        ]);
        $sites = DB::table('site')->insert([
          'pharmacy_name' => $request->input('pharmacy_name'),
          'street_name' => $request->input('street_name'),
          'neig_name' => $request->input('neig_name'),
          'site_dec' => $request->input('site_dec'),

      ]);
         return redirect()->back()->with(['success' => 'تم اضافه البلاغ بنجاح ']);
    }


}
