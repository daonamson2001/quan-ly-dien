<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Import;
use App\Models\DetailImport;
use PDF;

class InvoiceImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $import = Import::query();

        if (isset($request->start_date)) {
            $import = $import->whereDate('imp_date', '>=', $request->start_date);
        }

        if (isset($request->end_date)) {
            $import = $import->whereDate('imp_date', '<=', $request->end_date);
        }

        $import = $import->select('imports.*', 'users.fullname')
                        ->join('users', 'users.id', '=', 'imports.user_id')
                        ->orderByDesc('imports.imp_date')->paginate(4)->appends([
                            'start_date' => $request->start_date,
                            'end_date' => $request->end_date
                        ]);
                                
        return view('chucnang.invoice.import.index', [
            'import' => $import,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (DB::table('detail_exports')->where('exp_id', $id)->exists()) {
            $user = DB::table('detail_imports')
                ->select('imports.id', 'users.fullname', 'imports.imp_code', 'imports.imp_date', 'imports.imp_total')
                ->join('imports', 'imports.id', '=', 'detail_imports.imp_id')
                ->join('users', 'users.id', '=', 'imports.user_id')
                ->where('imp_id', $id)
                ->first();

            $detail_imports = DB::table('detail_imports')
                ->select('detail_imports.*', 'supplies.sup_name', 'imports.imp_code', 'producers.pro_name', 'qualities.qua_name', 'units.unit_name')
                ->join('supplies', 'supplies.id', '=', 'detail_imports.sup_id')
                ->join('imports', 'imports.id', '=', 'detail_imports.imp_id')
                ->join('producers', 'producers.id', '=', 'detail_imports.pro_id')
                ->join('qualities', 'qualities.id', '=', 'detail_imports.qua_id')
                ->join('units', 'units.id', '=', 'supplies.unit_id')
                ->where('imp_id', $id)
                ->get();
            
            // dd($user);
                
            return view('chucnang.invoice.import.details', [
                'user' => $user, 
                'detail_imports' => $detail_imports]
            );
        }
        return redirect()->back()->withErrors(['msg' => 'Không tìm thấy chi tiết hoá đơn này!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function printPDF($id)
    {
        $data['arr'] = Import::join('detail_imports', 'detail_imports.imp_id', '=', 'imports.id')
                    ->join('supplies', 'supplies.id', '=', 'detail_imports.sup_id')
                    ->select('detail_imports.id', 'supplies.sup_name', 'detail_imports.di_amount', 'detail_imports.di_price', 'detail_imports.di_into_money')
                    ->orderByDesc('imports.imp_date')
                    ->where('detail_imports.imp_id', $id)
                    ->get()
                    ->toArray();
        
        $data['info'] = Import::join('detail_imports', 'detail_imports.imp_id', '=', 'imports.id')
                    ->join('users', 'users.id', '=', 'imports.user_id')
                    ->select('imports.id', 'users.fullname', 'imports.imp_code', 'imports.imp_date', 'imports.imp_total')
                    ->where('imports.id', $id)
                    ->first()
                    ->toArray();

        $pdf = PDF::loadView('chucnang.invoice.import.print', ['data' => $data]);
    
        return $pdf->download("phieu_nhap_".$data['info']['imp_code'].".pdf");
    }
}
