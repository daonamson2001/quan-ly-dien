<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Export;
use PDF;

class InvoiceExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $export = Export::query();

        if (isset($request->start_date)) {
            $export = $export->whereDate('exp_date', '>=', $request->start_date);
        }

        if (isset($request->end_date)) {
            $export = $export->whereDate('exp_date', '<=', $request->end_date);
        }

        $export = $export->select('exports.*', 'users.fullname')
                        ->join('users', 'users.id', '=', 'exports.user_id')
                        ->orderByDesc('exports.exp_date')->paginate(4)->appends([
                            'start_date' => $request->start_date,
                            'end_date' => $request->end_date
                        ]);

        return view('chucnang.invoice.export.index', [
            'export' => $export,
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
            $user = DB::table('detail_exports')
            ->select('exports.id', 'users.fullname', 'exports.exp_code', 'exports.exp_date', 'exports.exp_total')
            ->join('exports', 'exports.id', '=', 'detail_exports.exp_id')
            ->join('users', 'users.id', '=', 'exports.user_id')
            ->where('exp_id', $id)
            ->first();

            $detail_exports = DB::table('detail_exports')
                ->select('detail_exports.*', 'supplies.sup_name')
                ->join('supplies', 'supplies.id', '=', 'detail_exports.sup_id')
                ->join('exports', 'exports.id', '=', 'detail_exports.exp_id')
                ->where('exp_id', $id)
                ->get();        
                
            return view('chucnang.invoice.export.details', [
                'user' => $user, 
                'detail_exports' => $detail_exports]
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
        $data['arr'] = Export::join('detail_exports', 'detail_exports.exp_id', '=', 'exports.id')
                    ->join('supplies', 'supplies.id', '=', 'detail_exports.sup_id')
                    ->select('detail_exports.id', 'supplies.sup_name', 'detail_exports.de_amount', 'detail_exports.de_price', 'detail_exports.de_into_money')
                    ->orderByDesc('exports.exp_date')
                    ->where('detail_exports.exp_id', $id)
                    ->get();

        $data['info'] = Export::join('detail_exports', 'detail_exports.exp_id', '=', 'exports.id')
                    ->join('users', 'users.id', '=', 'exports.user_id')
                    ->select('exports.id', 'users.fullname', 'exports.exp_code', 'exports.exp_date', 'exports.exp_total')
                    ->where('exports.id', $id)
                    ->first();
                    
        $pdf = PDF::loadView('chucnang.invoice.export.print', ['data' => $data]);
    
        return $pdf->download("phieu_xuat_".$data['info']['exp_code'].".pdf");
    }
}
