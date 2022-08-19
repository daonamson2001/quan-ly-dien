<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailExport;
use App\Models\Export;
use App\Models\Import;
use App\Models\DetailImport;
use App\Models\Supplies;
use App\Models\Producer;
use App\Models\Quality;
use PDF;
use Carbon\Carbon;

class NotifiExportController extends Controller
{
    public function notifi()
    {
        return view('chucnang.baocao.xuatkho.index');
    }

    public function getNotifi(Request $request)
    {
        $select = $request->notifi_select;
        switch ($select) {
            case '1':
                $sup = Supplies::first();
                $sups = Supplies::all();
                $datas = DetailExport::where('sup_id', $sup->id)->get();
                return view('chucnang.baocao.xuatkho.listSupplies')->with(compact('datas', 'sups'));
                break;

            case '2':
                $detail = DetailExport::first();
                $exp_code = Export::select('exp_code')->get();
                $datas = DetailExport::where('exp_id', $detail->exp_id)->get();
                return view('chucnang.baocao.xuatkho.listExportCode')->with(compact('datas', 'exp_code'));
                break;
            
            case '3':
                $today = Carbon::now()->toDateString();
                $exps = Export::where('exp_date', $today)->get();
                $datas = [];
                foreach ($exps as $exp) {
                    $export = DetailExport::where('exp_id', $exp->id)->get();
                    array_push($datas, $export);      
                }   
                return view('chucnang.baocao.xuatkho.listExportDate')->with(compact('datas'));
                break;  
        }           
    }

    public function postExportDate(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $today = Carbon::now()->toDateString(); 
        $datas = [];
        if($from_date > $to_date){
            $datas = 1;
            return view('chucnang.baocao.xuatkho.listExportDate')->with(compact('datas'));
        }else{
            $exps = Export::where('exp_date','>=', $from_date)
                            ->where('exp_date','<=', $to_date)
                            ->get();
            foreach ($exps as $exp) {
            $export = DetailExport::where('exp_id', $exp->id)->get();
            array_push($datas, $export);
            }

            return view('chucnang.baocao.xuatkho.listExportDate')->with(compact('datas'));     
        } 
    }

    public function postSuplies(Request $request)
    {   
        $sup_id = $request->sup_id;
        $sups = Supplies::all();
        $datas = DetailExport::where('sup_id', $sup_id)->get();
        return view('chucnang.baocao.xuatkho.listSupplies')->with(compact('datas' , 'sups'));     
    }

    public function postExportCode(Request $request)
    {   
        $exp_code = Export::select('exp_code')->get();
        $exps = Export::where('exp_code' , $request->exp_code)->first();
        $datas = DetailExport::where('exp_id', $exps->id)->get();

        // view()->share('datas', $datas);
        // $pdf = PDF::loadView('chucnang.baocao.xuatkho.exportPDF', $datas);
        // $d = $pdf->download('pdf.pdf');

        return view('chucnang.baocao.xuatkho.listExportCode')->with(compact( 'datas' , 'exp_code'));     
    }

}