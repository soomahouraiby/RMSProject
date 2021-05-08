<?php
namespace App\Http\Controllers\pharmacovigilanceManagement;

use App\Http\Controllers\Controller;
use App\Models\Procedures;
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

class PHCManageController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:pharmacovigilance_Management');
    }

    //عشان عرض البلاغات الوارده
    public function newReports()
    {
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','app_user.app_user_name'
                , 'reports.report_date', 'types_reports.type_report')
            ->where('state','=',0)
            ->where('type_report','!=','مهرب')
            ->where('type_report','!=','مسحوب')
            ->where('type_report','!=','غير مطابق')
            ->where('type_report','!=','مستثناء')
            ->get();
        //return response($reports);
        return view('pharmacovigilanceManagement.newReports', compact('reports'));
    }

    // عشان اللفلترة حق البلاغات الوارده للاعراض الجانبية
    public function newEffectReports()
    {
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','app_user.app_user_name'
                , 'reports.report_date', 'types_reports.type_report')
            ->where('state','=',0)
            ->where('type_report','=','اعراض جانبية')
            ->get();
        return view('pharmacovigilanceManagement.newReports', compact('reports'));
    }
//عشان اللفلترة حق البلاغات الوارده للجودة
    public function newQualityReports()
    {
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','app_user.app_user_name'
                , 'reports.report_date', 'types_reports.type_report')
            ->where('state','=',0)
            ->where('type_report','=','جودة')
            ->get();
        return view('pharmacovigilanceManagement.newReports', compact('reports'));
    }

//عشان تفاصيل كل البلاغات الجودة
    public function detailsReport($report_no){
        $reports = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$reports)
            return redirect()->back();

        $report = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')
            ->join('commercial_drug', 'reports.drug_no', '=', 'commercial_drug.drug_no')
            ->join('batch_number', 'commercial_drug.drug_no', '=', 'batch_number.drug_no')
            ->join('combination', 'combination.drug_no', '=','commercial_drug.drug_no')
            ->join('effective_material', 'combination.material_no', '=', 'effective_material.material_no')
            ->join('companies', 'commercial_drug.company_no', '=', 'companies.company_no')
            ->select('reports.report_no', 'app_user.app_user_name', 'app_user.app_user_phone',
                'app_user.app_user_email', 'site.pharmacy_name', 'site.street_name',
                'reports.notes_user', 'reports.report_date', 'types_reports.type_report',
                'reports.drug_picture', 'commercial_drug.drug_name', 'commercial_drug.drug_no',
                'commercial_drug.drug_form','batch_number.batch_num'
                ,'effective_material.material_name','companies.company_name')
            ->where('report_no', '=', $report_no)->get();


        $details=DB::table('report_side_effects')
            ->join('drug_user', 'report_side_effects.drug_user_no', '=',
                'drug_user.drug_user_no')
            ->select('report_side_effects.Relation_with_patient','report_side_effects.purpose_of_use'
            ,'report_side_effects.date_start_use','report_side_effects.dose',
                'report_side_effects.how_use_drug','report_side_effects.how_get_drug',
                'report_side_effects.status_stop_use','report_side_effects.date_stop_use',
                'report_side_effects.expiration_date','drug_user.drug_user_name','drug_user.age'
            ,'drug_user.height','drug_user.weight','drug_user.gender')
            ->where('report_no','=', $report_no)->get();

        return view('pharmacovigilanceManagement.detailsReport', compact('report','details'));
        //return Response($details);
    }
//عشان تفاصيل كل البلاغات الاعراض الجانبية
    public function detailsEffectReport($report_no){
        $reports = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$reports)
            return redirect()->back();

        $report = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')
            ->join('commercial_drug', 'reports.drug_no', '=', 'commercial_drug.drug_no')
            ->join('batch_number', 'commercial_drug.drug_no', '=', 'batch_number.drug_no')
            ->join('combination', 'combination.drug_no', '=','commercial_drug.drug_no')
            ->join('effective_material', 'combination.material_no', '=', 'effective_material.material_no')
            ->join('companies', 'commercial_drug.company_no', '=', 'companies.company_no')
            ->select('reports.report_no', 'app_user.app_user_name', 'app_user.app_user_phone',
                'app_user.app_user_email', 'site.pharmacy_name', 'site.street_name',
                'reports.notes_user', 'reports.report_date', 'types_reports.type_report',
                'reports.drug_picture', 'commercial_drug.drug_name', 'commercial_drug.drug_no',
                'commercial_drug.drug_form','batch_number.batch_num'
                ,'effective_material.material_name','companies.company_name')
            ->where('report_no', '=', $report_no)->get();


        $details=DB::table('report_side_effects')

            ->join('drug_user', 'report_side_effects.drug_user_no', '=',
                'drug_user.drug_user_no')
            ->join('side_effects', 'side_effects.drug_user_no', '=', 'drug_user.drug_user_no')
            ->select('report_side_effects.Relation_with_patient','report_side_effects.report_side_effect_no',
                'report_side_effects.purpose_of_use','report_side_effects.date_start_use','report_side_effects.dose',
                'report_side_effects.how_use_drug','report_side_effects.how_get_drug',
                'report_side_effects.status_stop_use','report_side_effects.date_stop_use',
                'report_side_effects.expiration_date','drug_user.drug_user_name','drug_user.age'
                ,'drug_user.height','drug_user.weight','drug_user.gender'
                ,'side_effects.side_effect','side_effects.date_st_effect','side_effects.range_dangerous',
                'side_effects.status_patient_now','side_effects.side_effect_removed','side_effects.removed_date')
            ->where('report_no','=', $report_no)->get();

        $o_drug=DB::table('other_drug')
            ->join('report_side_effects', 'other_drug.report_side_effects_no',
                '=', 'report_side_effects.report_side_effect_no')
            ->select('other_drug.drug_name','other_drug.dose','other_drug.date_start_use',
                'other_drug.date_end_use','other_drug.purpose_of_use','report_side_effects.report_no')
            ->where('report_side_effects.report_no','=', $report_no)
            ->get();

    return view('pharmacovigilanceManagement.detailsEffectReport', compact('report','details'))
        ->with('o_drug',$o_drug);

    }

//عشان تفاصيل كل البلاغات الجودة بدون زر التحويل
    public function detailsReport2($report_no){
        $reports = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$reports)
            return redirect()->back();

        $report = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')
            ->join('commercial_drug', 'reports.drug_no', '=', 'commercial_drug.drug_no')
            ->join('batch_number', 'commercial_drug.drug_no', '=', 'batch_number.drug_no')
            ->join('combination', 'combination.drug_no', '=','commercial_drug.drug_no')
            ->join('effective_material', 'combination.material_no', '=', 'effective_material.material_no')
            ->join('companies', 'commercial_drug.company_no', '=', 'companies.company_no')
            ->select('reports.report_no', 'app_user.app_user_name', 'app_user.app_user_phone',
                'app_user.app_user_email', 'site.pharmacy_name', 'site.street_name',
                'reports.notes_user', 'reports.report_date', 'types_reports.type_report',
                'reports.drug_picture', 'commercial_drug.drug_name', 'commercial_drug.drug_no',
                'commercial_drug.drug_form','batch_number.batch_num'
                ,'effective_material.material_name','companies.company_name')
            ->where('report_no', '=', $report_no)->get();


        $details=DB::table('report_side_effects')
            ->join('drug_user', 'report_side_effects.drug_user_no', '=',
                'drug_user.drug_user_no')
            ->select('report_side_effects.Relation_with_patient','report_side_effects.purpose_of_use'
                ,'report_side_effects.date_start_use','report_side_effects.dose',
                'report_side_effects.how_use_drug','report_side_effects.how_get_drug',
                'report_side_effects.status_stop_use','report_side_effects.date_stop_use',
                'report_side_effects.expiration_date','drug_user.drug_user_name','drug_user.age'
                ,'drug_user.height','drug_user.weight','drug_user.gender')
            ->where('report_no','=', $report_no)->get();

        return view('pharmacovigilanceManagement.detailsReport2', compact('report','details'));
        //return Response($details);
    }
//عشان تفاصيل كل البلاغات الاعراض الجانبية بدون زر التحويل
    public function detailsEffectReport2($report_no){
        $reports = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$reports)
            return redirect()->back();

        $report = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')
            ->join('commercial_drug', 'reports.drug_no', '=', 'commercial_drug.drug_no')
            ->join('batch_number', 'commercial_drug.drug_no', '=', 'batch_number.drug_no')
            ->join('combination', 'combination.drug_no', '=','commercial_drug.drug_no')
            ->join('effective_material', 'combination.material_no', '=', 'effective_material.material_no')
            ->join('companies', 'commercial_drug.company_no', '=', 'companies.company_no')
            ->select('reports.report_no', 'app_user.app_user_name', 'app_user.app_user_phone',
                'app_user.app_user_email', 'site.pharmacy_name', 'site.street_name',
                'reports.notes_user', 'reports.report_date', 'types_reports.type_report',
                'reports.drug_picture', 'commercial_drug.drug_name', 'commercial_drug.drug_no',
                'commercial_drug.drug_form','batch_number.batch_num'
                ,'effective_material.material_name','companies.company_name')
            ->where('report_no', '=', $report_no)->get();


        $details=DB::table('report_side_effects')

            ->join('drug_user', 'report_side_effects.drug_user_no', '=',
                'drug_user.drug_user_no')
            ->join('side_effects', 'side_effects.drug_user_no', '=', 'drug_user.drug_user_no')
            ->select('report_side_effects.Relation_with_patient','report_side_effects.report_side_effect_no',
                'report_side_effects.purpose_of_use','report_side_effects.date_start_use','report_side_effects.dose',
                'report_side_effects.how_use_drug','report_side_effects.how_get_drug',
                'report_side_effects.status_stop_use','report_side_effects.date_stop_use',
                'report_side_effects.expiration_date','drug_user.drug_user_name','drug_user.age'
                ,'drug_user.height','drug_user.weight','drug_user.gender'
                ,'side_effects.side_effect','side_effects.date_st_effect','side_effects.range_dangerous',
                'side_effects.status_patient_now','side_effects.side_effect_removed','side_effects.removed_date')
            ->where('report_no','=', $report_no)->get();

        $o_drug=DB::table('other_drug')
            ->join('report_side_effects', 'other_drug.report_side_effects_no',
                '=', 'report_side_effects.report_side_effect_no')
            ->select('other_drug.drug_name','other_drug.dose','other_drug.date_start_use',
                'other_drug.date_end_use','other_drug.purpose_of_use','report_side_effects.report_no')
            ->where('report_side_effects.report_no','=', $report_no)
            ->get();

        return view('pharmacovigilanceManagement.detailsEffectReport2', compact('report','details'))
            ->with('o_drug',$o_drug);

    }


//عشان تفاصيل الدواء
    public function detailsDrug($drug_no){

        $r = DB::table('commercial_drug')
            ->join('combination', 'combination.drug_no', '=','commercial_drug.drug_no')
            ->join('effective_material', 'combination.material_no', '=', 'effective_material.material_no')
            ->join('batch_number', 'batch_number.drug_no', '=','commercial_drug.drug_no')
            ->join('shipments', 'batch_number.shipment_no', '=', 'shipments.shipment_no')
            ->join('agents', 'commercial_drug.agent_no', '=', 'agents.agent_no')
            ->join('companies', 'commercial_drug.company_no', '=', 'companies.company_no')
            ->select('commercial_drug.drug_name','commercial_drug.how_to_use'
                ,'commercial_drug.side_effects','commercial_drug.drug_form','commercial_drug.drug_no','agents.agent_name'
                ,'effective_material.material_name','companies.company_name','companies.company_country'
                ,'batch_number.batch_num','shipments.production_date','shipments.expiry_date')
            ->where('commercial_drug.drug_no','=',$drug_no)
            ->get();


        return view('pharmacovigilanceManagement/detailsDrug',compact('r'));
        //return response($r) ;

    }

//عشان تحويل البلاغات الوارده الى متابعة
    public function transferReports($report_no,Request $request)
    {
        $reports = DB::table('reports')->select('reports.transfer_party')
            ->where('report_no', '=', $report_no)
            ->update(['state'=>1,'reports.report_statues'=>'قيد المتابعة']);
        return redirect()->back()->with(['success' => 'تم التحويل بنجاح ']);
    }


// عشان عرض المتابعة للبلاغات
    public function followReports(){
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','reports.authors_name','app_user.app_user_name',
                'reports.report_date', 'reports.report_statues', 'types_reports.type_report' )
            ->where('report_statues','!=',null)
            ->where('type_report','!=','مهرب')
            ->where('type_report','!=','مسحوب')
            ->where('type_report','!=','غير مطابق')
            ->where('type_report','!=','مستثناء')
            ->get();
        return view('pharmacovigilanceManagement/followReports',compact('reports'));
    }
    //عشان اللفلترة حق قيد المتابعة
    public function followingReports(){
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','reports.authors_name','app_user.app_user_name',
                'reports.report_date', 'reports.report_statues' , 'types_reports.type_report')
            ->where('report_statues','=','قيد المتابعة')
            ->where('type_report','!=','مهرب')
            ->where('type_report','!=','مسحوب')
            ->where('type_report','!=','غير مطابق')
            ->where('type_report','!=','مستثناء')
            ->get();
        return view('pharmacovigilanceManagement/followReports',compact('reports'));
    }
    //عشان اللفلترة حق تم الانهاء
    public function doneReports(){
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','reports.authors_name','app_user.app_user_name',
                'reports.report_date', 'reports.report_statues' , 'types_reports.type_report')
            ->where('report_statues','=','تم الانهاء')
            ->where('type_report','!=','مهرب')
            ->where('type_report','!=','مسحوب')
            ->where('type_report','!=','غير مطابق')
            ->where('type_report','!=','مستثناء')
            ->get();
        return view('pharmacovigilanceManagement/followReports',compact('reports'));
    }



//عشان تفاصيل الذي قيد المتابعه
    public function followedUp($report_no){
        $reports = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$reports)
            return redirect()->back();

        $report = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')
            ->join('commercial_drug', 'reports.drug_no', '=', 'commercial_drug.drug_no')
            ->select('reports.report_no','reports.authors_name','reports.authors_phone',
                'app_user.app_user_name','app_user.app_user_phone'
                ,'site.pharmacy_name','types_reports.type_report','commercial_drug.drug_name')
            ->where('report_no','=', $report_no)->get();


        return view('pharmacovigilanceManagement/followedUp',compact('report'));
    }
//عشان تفاصيل الذي تم الانهاء
    public function followedUp2($report_no){
        $reports = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$reports)
            return redirect()->back();

        $report = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')
            ->join('commercial_drug', 'reports.drug_no', '=', 'commercial_drug.drug_no')
            ->select('reports.report_no','reports.authors_name','reports.authors_phone',
                'app_user.app_user_name','app_user.app_user_phone'
                ,'site.pharmacy_name','types_reports.type_report','commercial_drug.drug_name')
            ->where('report_no','=', $report_no)
            ->get();

        $procedures=DB::table('procedures')->select('procedures.procedure'
            ,'procedures.procedure_date','procedures.procedure_result')
            ->where('report_no','=', $report_no)->get();

        return view('pharmacovigilanceManagement/followedUp2',compact('report','procedures'));
    }

//عشان اضافة اجراء على البلاغ
    public function createProcedure($report_no){
        $reports = Reports::find($report_no);
        return view('pharmacovigilanceManagement/doneReports',compact('reports'));
    }
    public function store($report_no,Request $request)
    {
        Procedures::create([
            'procedure' => $request->procedure,
            'procedure_date' => $request->procedure_date,
            'procedure_result' => $request->procedure_result,
            'report_no' => $report_no,
             ]);

         DB::table('reports')->select('reports.transfer_party')
            ->where('report_no', '=', $report_no)
            ->update(['reports.report_statues'=>'تم الانهاء']);

        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->select('reports.report_no','reports.authors_name','app_user.app_user_name',
                'reports.report_date', 'reports.report_statues', 'types_reports.type_report' )
            ->where('report_statues','!=',null)
            ->where('type_report','!=','مهرب')
            ->where('type_report','!=','مسحوب')
            ->where('type_report','!=','غير مطابق')
            ->where('type_report','!=','مستثناء')
            ->get();
        return view('pharmacovigilanceManagement/followReports',compact('reports'));

    }



}
