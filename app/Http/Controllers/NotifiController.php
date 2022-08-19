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
use Carbon\Carbon;

class NotifiController extends Controller
{
    public function notifi()
    {
        return view('chucnang.baocao.nhapkho.index');
    }

    public function getNotifi(Request $request)
    {
        $select = $request->notifi_select;
        switch ($select) {
            case '1':
                $sup = Supplies::first();
                $sups = Supplies::all();
                $datas = DetailImport::where('sup_id', $sup->id)->get();
                return view('chucnang.baocao.nhapkho.listSupplies')->with(compact('datas', 'sups'));
                break;

            case '2':
                $detail = DetailImport::first();
                $imp_code = Import::select('imp_code')->get();
                $datas = DetailImport::where('imp_id', $detail->imp_id)->get();
                return view('chucnang.baocao.nhapkho.listImportCode')->with(compact('datas', 'imp_code'));
                break;
            
            case '3':
                $today = Carbon::now()->toDateString();
                $imps = Import::where('imp_date', $today)->get();
                $datas = [];
                foreach ($imps as $imp) {
                    $import = DetailImport::where('imp_id', $imp->id)->get();
                    array_push($datas, $import);      
                }   
                return view('chucnang.baocao.nhapkho.listImportDate')->with(compact('datas'));
                break;

            case '4':
                $pro = Producer::first();
                $pros = Producer::all();
                $datas = DetailImport::where('pro_id', $pro->id)->get();
                return view('chucnang.baocao.nhapkho.listProducer')->with(compact('datas', 'pros'));
                break;

            case '5':
                $qua = Quality::first();
                $quas = Quality::all();
                $datas = DetailImport::where('qua_id', $qua->id)->get();
                return view('chucnang.baocao.nhapkho.listQuality')->with(compact('datas', 'quas'));
                break;    
        }           
    }

    public function postImportDate(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $today = Carbon::now()->toDateString(); 
        $datas = [];
        if($from_date > $to_date){
            $datas = 1;
            return view('chucnang.baocao.nhapkho.listImportDate')->with(compact('datas'));
        }else{
            $imps = Import::where('imp_date','>=', $from_date)
                            ->where('imp_date','<=', $to_date)
                            ->get();
            foreach ($imps as $imp) {
            $import = DetailImport::where('imp_id', $imp->id)->get();
            array_push($datas, $import);
            }

            return view('chucnang.baocao.nhapkho.listImportDate')->with(compact('datas'));     
        } 
    }

    public function postSuplies(Request $request)
    {   
        $sup_id = $request->sup_id;
        $sups = Supplies::all();
        $datas = DetailImport::where('sup_id', $sup_id)->get();
        return view('chucnang.baocao.nhapkho.listSupplies')->with(compact('datas' , 'sups'));     
    }

    public function postImportCode(Request $request)
    {   
        $imp_code = Import::select('imp_code')->get();
        $imps = Import::where('imp_code' , $request->imp_code)->first();
        $datas = DetailImport::where('imp_id', $imps->id)->get();
        return view('chucnang.baocao.nhapkho.listImportCode')->with(compact('datas' , 'imp_code'));     
    }

    public function postProducer(Request $request)
    {   
        $pros = Producer::all();
        $datas = DetailImport::where('pro_id', $request->pro_id)->get();
        return view('chucnang.baocao.nhapkho.listProducer')->with(compact('datas' , 'pros'));     
    }

    public function postQuality(Request $request)
    {   
        $quas = Quality::all();
        $datas = DetailImport::where('qua_id', $request->qua_id)->get();
        return view('chucnang.baocao.nhapkho.listQuality')->with(compact('datas' , 'quas'));     
    }
}