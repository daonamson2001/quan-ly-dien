<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Producer;
use App\Models\Supplies;
use App\Models\Unit;
use App\Models\Quality;
use App\Models\Export;
use App\Models\DetailExport;
use PDF;


class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exps  = Export::all();
        // $pros  = Producer:: select('id','pro_name')  ->get();
        $sups  = Supplies::all();
        // $quas  = Quality::  select('id', 'qua_name') ->get();
        // $datas = $quas;
        return view('chucnang.xuat.index')->with(compact('exps',  'sups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $sup = Supplies::find($request->sup_id);
            $amount = $sup->sup_amount - $request->de_amount;
            if ($amount < 0) {
                $err = 1;
                return response()->json($err, Response::HTTP_OK);
            } else {
                $exp_code = Export::where('exp_code', $request->exp_code)->first();
                $err = 0;

                if (!($exp_code)) {
                    $exp_code = Export::create([
                        'exp_code' => $request->exp_code,
                        'exp_date' => $request->exp_date,
                        'user_id' => $request->user_id,
                        'exp_total' => $request->exp_total,
                    ]);
                }
                
                DetailExport::create([
                    'de_amount' => $request->de_amount,
                    'de_price' => $request->de_price,
                    'de_into_money' => $request->de_into_money,
                    'sup_id' => $request->sup_id,
                    'exp_id' => $exp_code->id,
                ]);
            
                $sup_total = $sup->sup_total - $request->de_into_money;
                Supplies::where('id', $request->sup_id)->update([
                    'sup_amount' => $amount,
                    'sup_total' => $sup_total
                ]);
                return response()->json($err, Response::HTTP_OK);
            }
        } catch (\Throwable $th) {
            $err = 2;
            return response()->json($th, Response::HTTP_OK);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Export::where('exp_code', $id)->update(['exp_total' => $request->exp_total]);
        return response()->json($request->exp_total, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exp_code = Export::where('exp_code', $id)->first();
        $delete_Row = DetailExport::where('exp_id', $exp_code->id)->get();
        try {
            for ($i = 1; $i <= count($delete_Row); $i++) {
                $data = DetailExport::where('id', $delete_Row[$i - 1]->id)->first();
                $sup_id = $data->sup_id;
                $sup = Supplies::where('id', $sup_id)->first();
                $sup_amount = $sup->sup_amount + $data->de_amount;
                $sup_total = $sup->sup_total + $data->de_into_money;
                Supplies::where('id', $sup_id)->update([
                    'sup_amount' => $sup_amount,
                    'sup_total' => $sup_total,
                ]);
            }

            DetailExport::where('exp_id', $exp_code->id)->delete();
            Export::where('exp_code', $id)->delete();
            return response()->json($exp_code, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_OK);
        }
    }

    public function deleteRow(Request $request)
    {
        $r = $request->all();
        $exp_code = Export::where('exp_code', $request->exp_code)->first();
        $delete_Row = DetailExport::where('exp_id', $exp_code->id)->get();
        for ($i = 1; $i <= count($delete_Row); $i++) {
            if ($i == $request->index) {
                $data = DetailExport::where('id', $delete_Row[$i - 1]->id)->first();
                // $de_amount = $data->de_amount;
                // $de_into_money = $data->de_into_money;
                $sup_id = $data->sup_id;
                $sup = Supplies::where('id', $sup_id)->first();
                $sup_amount = $sup->sup_amount + $data->de_amount;
                try {
                    $sup_total = $sup->sup_total + $data->de_into_money;
                    Supplies::where('id', $sup_id)->update([
                        'sup_amount' => $sup_amount,
                        'sup_total' => $sup_total,
                    ]);

                    $de_id = DetailExport::where('id', $delete_Row[$i - 1]->id)->delete();
                    return response()->json($de_id, Response::HTTP_OK);
                } catch (\Throwable $th) {
                    return response()->json($th, Response::HTTP_OK);
                }
            }
        }
        return response()->json($r, Response::HTTP_OK);
    }

    public function printPDF(Request $request)
    {
        $exp_code = $request->exp_code;
        $exps = Export::where('exp_code', $exp_code)->first();
        $detail = DetailExport::where('exp_id', $exps->id)->get();
        $pdf = app('dompdf.wrapper');
        $pdf = $pdf->loadView('chucnang.xuat.printPDF', compact('exps', 'detail'));
        return $pdf->download($exp_code . '.pdf');
        // return View::make($pdf->download($exp_code.'.pdf'));
        // return $pdf->stream();
        // return view('chucnang.nhap.printPDF')->with(compact('exps', 'detail'));
        // var_dump($abc);die;
    }
}