<?php
namespace App\Http\Controllers\pharmacyManagement;

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
use PharIo\Manifest\Type;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //////////////// [ Show .. بلاغات وارده ]  ////////////////
    public function newReports(){
        $reports=DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site','reports.site_no','=','site.site_no')
            ->select('reports.report_no','app_user.app_user_name','reports.state',
                'reports.report_date','reports.transfer_party', 'types_reports.type_report','.site.pharmacy_name')
            ->where('type_report','!=','اعراض جانبية')
            ->where('state','=',1)
            ->where('transfer_party','=','ادارة الصيدلة')
            ->where('type_report','!=','جودة')
            ->get();

        return view('pharmacyManagement/newReports',compact('reports'));
    }

    //////////////// [ Show .. متابعة البلاغات الوارده ]  ////////////////
    public function followReports(){
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')
            ->select('reports.report_no','reports.authors_name','app_user.app_user_name',
                'reports.report_date', 'reports.transfer_date','reports.transfer_party',
                'reports.report_statues' , 'types_reports.type_report','site.pharmacy_name')
//            ->where('report_statues','=','قيد المتابعة','تمت المتابعة')
//            ->where('report_statues','=','تمت المتابعة')
            ->where('transfer_party','!=',null)
            ->where('state','=',2)
            ->where('type_report','!=','اعراض جانبية')
            ->where('type_report','!=','جودة')
            ->get();

        return view('pharmacyManagement/followReports',compact('reports'));
    }




    //////////////// [ Follow .. متابعة بلاغ وارد ]  ////////////////
    public function followNewReport($report_no){
        $report = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$report)
            return redirect()->back();

        $update = DB::table('reports')->where('report_no','=', $report_no)
            ->update(['reports.report_statues'=>'قيد المتابعة','state'=>2]);


        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')

            ->select('reports.report_no','reports.authors_name','reports.authors_phone',
                'app_user.app_user_name','app_user.app_user_phone','reports.commercial_name'
                ,'site.pharmacy_name','types_reports.type_report','reports.report_date')

            ->where('report_no','=', $report_no)->get();

        return view('pharmacyManagement/follow',compact('reports'));
    }

    //////////////// [ Follow .. إنهاء البلاغ ]  ////////////////
    public function endFollowUp($report_no)
    {
        $report = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();
        if (!$report)
            return redirect()->back();


        $reports=DB::table('reports')
            ->select('reports.report_no','reports.report_statues')
            ->where('report_no','=', $report_no)->update(['report_statues'=>'تمت المتابعة']);

        return redirect()->back()->with(['saved'=>'تم التعديل']);
    }

    //////////////// [ Follow ..  اضافة إجراء ]  ////////////////
    public function addProcedure(Request $request,$report_no): \Illuminate\Http\RedirectResponse
    {
        DB::table('procedures')->insert([
            'procedure_date'=>Carbon::now()->toDateTimeString(),
            'procedure'=>$request->input('procedure'),
            'procedure_result'=>$request->input('procedure_result'),
            'report_no'=>$report_no]);

        return redirect()->back();

    }




    //////////////// [ Drug ..   ]  ////////////////
    public function drug(){
        $agents = DB::table('agents')->select('agents.agent_name','agents.agent_no')->get();

        $companies = DB::table('companies')->select('companies.company_name','companies.company_no')->get();

        $materials = DB::table('effective_material')->select('effective_material.material_no','effective_material.material_name')->get();

        $drug=Commercial_drugs::orderByDesc('drug_no')->first('drug_no');
        $shipment=Shipments::orderByDesc('shipment_no')->first('shipment_no');


        return view('pharmacyManagement/addDrug',compact('agents','companies','materials','drug','shipment'));
    }

    //////////////// [ Drug ..  اضافة دواء ]  ////////////////
    public function addDrug(Request $request){
-
        $drugs = DB::table('commercial_drug')->insert([
            'drug_name'=>$request->drug_name,
            'register_no'=>$request->register_no,
            'drug_entrance'=>'احلام',
            'drug_photo'=>'ااا',
            'how_to_use'=>$request->how_to_use,
            'drug_form'=>$request->drug_form,
            'side_effects'=>$request->side_effects,
            'agent_no'=>$request->agent_no,
            'company_no'=>$request->company_no]);

        $combination = DB::table('combination')->insert([
            'material_no'=>$request->material_no,
            'drug_no'=>$request->drug_no,
            'con'=>$request->con]);

        $shipments = DB::table('shipments')->insert([
            'production_date'=>$request->production_date,
            'expiry_date'=>$request->expiry_date,
            'quantity'=>$request->quantity,
            'price'=>$request->price
        ]);

        $batch_number = DB::table('batch_number')->insert([
            'batch_num'=>$request->batch_num,
            'barcode'=>$request->barcode,
            'drug_no'=>$request->drug_no,
            'shipment_no'=>$request->shipment_no
        ]);

        return redirect()->back();
    }




    //////////////// [ Details ..  بلاغ وارد ]  ////////////////
    public function detailsReport($report_no){
        $report = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();

        if (!$report)
            return redirect()->back();

        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')
            ->join('commercial_drug', 'reports.drug_no', '=', 'commercial_drug.drug_no')

            ->select('reports.report_no','reports.drug_picture','reports.notes_user', 'reports.report_date'
                , 'reports.commercial_name', 'reports.material_name', 'reports.agent_name', 'reports.company_name',
                'app_user.app_user_name', 'app_user.app_user_phone', 'app_user.adjective', 'app_user.age','app_user.report_count',
                'site.pharmacy_name', 'site.street_name', 'site.site_dec', 'types_reports.type_report',
                'commercial_drug.drug_no', 'commercial_drug.drug_name', 'commercial_drug.drug_photo',
                'commercial_drug.how_to_use','commercial_drug.side_effects','commercial_drug.drug_no')
            ->where('report_no', '=', $report_no)->get();

//        return $reports;
        return view('pharmacyManagement.detailsReport', compact('reports'));

    }

    //////////////// [ Details ..  دواء ]  ////////////////
    public function detailsDrug($drug_no){
        $reports = DB::table('commercial_drug')
            ->join('combination', 'combination.drug_no', '=','commercial_drug.drug_no')
            ->join('effective_material', 'combination.material_no', '=', 'effective_material.material_no')
            ->join('batch_number', 'batch_number.drug_no', '=','commercial_drug.drug_no')
            ->join('shipments', 'batch_number.shipment_no', '=', 'shipments.shipment_no')
            ->join('agents', 'commercial_drug.agent_no', '=', 'agents.agent_no')
            ->join('companies', 'commercial_drug.company_no', '=', 'companies.company_no')

            ->select('commercial_drug.drug_name','commercial_drug.how_to_use','commercial_drug.side_effects','commercial_drug.drug_form','commercial_drug.register_no'
                ,'agents.agent_name','agents.agent_phone','agents.agent_email','agents.agent_address'
                ,'effective_material.material_name','effective_material.indications_for_use','combination.con',
                'companies.company_name','companies.company_country','batch_number.batch_num',
                'shipments.production_date','shipments.expiry_date','shipments.price','shipments.exception',
                'shipments.shipment_drawn','shipments.quantity')
            ->where('commercial_drug.drug_no','=',$drug_no)
            ->get();

        return view('pharmacyManagement/detailsDrug',compact('reports'));
    }

    //////////////// [ Details ..  تفاصيل المتابعة ]  ////////////////
    public function detailsFollow($report_no){
        $report = DB::table('reports')->select('reports.report_no')
            ->where('report_no','=', $report_no)->get();  // search in given table id only
        if (!$report)
            return redirect()->back();


        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site', 'reports.site_no', '=', 'site.site_no')

            ->select('reports.report_no','reports.authors_name','reports.authors_phone',
                'app_user.app_user_name','app_user.app_user_phone','reports.commercial_name'
                ,'site.pharmacy_name','types_reports.type_report','reports.report_date','reports.report_statues')

            ->where('report_no','=', $report_no)->get();

       $procedures= DB::table('procedures')
           ->select('procedures.report_no','procedures.procedure_result','procedures.procedure','procedures.procedure_date')
           ->where('report_no','=',$report_no)->get();

        return view('pharmacyManagement/follow',compact('reports','procedures'));
    }




    //////////////// [ Filter .. البلاغات المهربه ]  ////////////////
    public function newSmuggledReports()
    {
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site','reports.site_no','=','site.site_no')
            ->select('reports.report_no','app_user.app_user_name'
                , 'reports.report_date','reports.transfer_party', 'types_reports.type_report','.site.pharmacy_name')
            ->where('state','=',1)
            ->where('transfer_party','=','ادارة الصيدلة')
            ->where('type_report','=','مهرب')
            ->get();
        return view('pharmacyManagement.newReports', compact('reports'));
    }

    //////////////// [ Filter .. البلاغات المسحوبه ]  ////////////////
    public function newDrownReports()
    {
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site','reports.site_no','=','site.site_no')
            ->select('reports.report_no','app_user.app_user_name'
                , 'reports.report_date','reports.transfer_party', 'types_reports.type_report','.site.pharmacy_name')
            ->where('state','=',1)
            ->where('transfer_party','=','ادارة الصيدلة')
            ->where('type_report','=','مسحوب')
            ->get();
        return view('pharmacyManagement.newReports', compact('reports'));
    }

    //////////////// [ Filter .. البلاغات الغير مطابقة ]  ////////////////
    public function newDifferentReports()
    {
        $reports = DB::table('reports')
            ->join('types_reports', 'reports.type_report_no', '=', 'types_reports.type_report_no')
            ->join('app_user', 'reports.app_user_no', '=', 'app_user.app_user_no')
            ->join('site','reports.site_no','=','site.site_no')
            ->select('reports.report_no','app_user.app_user_name'
                , 'reports.report_date','reports.transfer_party', 'types_reports.type_report','.site.pharmacy_name')
            ->where('state','=',1)
            ->where('type_report','=','غير مطابق')
            ->where('transfer_party','=','ادارة الصيدلة')
            ->get();
        return view('pharmacyManagement.newReports', compact('reports'));
    }

}
