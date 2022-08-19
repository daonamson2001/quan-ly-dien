<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Producer;
use App\Models\Supplies;
use App\Models\Unit;
use App\Models\Quality;
use App\Models\Import;
use App\Models\DetailImport;
use App\Http\Requests\ImportPost;
use PDF;



class ImportController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imps = Import::all();
        $pros  = Producer::select('id', 'pro_name')->get();
        $sups  = Supplies::all();
        $quas  = Quality::select('id', 'qua_name')->get();
        $datas  = $quas;
        return view('chucnang.nhap.index')->with(compact('imps', 'pros', 'sups', 'quas', 'datas'));
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
        $pro_id = Producer::where('pro_name', $request->pro_name)->first();
        $qua_id = Quality::where('qua_name', $request->qua_name)->first();
        $imp_code = Import::where('imp_code', $request->imp_code)->first();
        // $x = $imp_code.length();
        // return response()->json($imp_code->imp_code, Response::HTTP_OK);
        try {
            if (!($imp_code)) {
                Import::create([
                    'imp_code' => $request->imp_code,
                    'imp_date' => $request->imp_date,
                    'user_id' => $request->user_id,
                    'imp_total' => $request->imp_total,
                ]);
            }

            $imp_code = Import::where('imp_code', $request->imp_code)->first();

            try {
                DetailImport::create([
                    'di_amount' => $request->di_amount,
                    'di_price' => $request->di_price,
                    'di_into_money' => $request->di_into_money,
                    'sup_id' => $request->sup_id,
                    'imp_id' => $imp_code->id,
                    'pro_id' => $pro_id->id,
                    'qua_id' => $qua_id->id,
                ]);

                $sup = Supplies::find($request->sup_id);
                $amount = $sup->sup_amount + $request->di_amount;
                $sup_total = $sup->sup_total + $request->di_into_money;
                Supplies::where('id', $request->sup_id)->update([
                    'sup_amount' => $amount,
                    'sup_total' => $sup_total
                ]);

                return response()->json($imp_code, Response::HTTP_OK);
            } catch (\exception $e) {
                return response()->json('abc', Response::HTTP_OK);
            }
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_OK);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Supplies $supplies)
    {
        $datas = $supplies->where('id', $id)->with('unit:id,unit_name')->first();
        return response()->json($datas, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        Import::where('imp_code', $id)->update(['imp_total' => $request->imp_total]);
        return response()->json($id, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imp_code = Import::where('imp_code', $id)->first();
        $delete_Row = DetailImport::where('imp_id', $imp_code->id)->get();
        for ($i = 1; $i <= count($delete_Row); $i++) {
            $data = DetailImport::where('id', $delete_Row[$i - 1]->id)->first();
            $sup_id = $data->sup_id;
            $sup = Supplies::where('id', $sup_id)->first();
            $sup_amount = $sup->sup_amount - $data->di_amount;
            $sup_total = $sup->sup_total - $data->di_into_money;
            Supplies::where('id', $sup_id)->update([
                'sup_amount' => $sup_amount,
                'sup_total' => $sup_total,
            ]);
        }

        DetailImport::where('imp_id', $imp_code->id)->delete();
        Import::where('imp_code', $id)->delete();
        return response()->json($imp_code, Response::HTTP_OK);
    }

    public function deleteRow(Request $request)
    {
        $r = $request->all();
        $imp_code = Import::where('imp_code', $request->imp_code)->first();
        $delete_Row = DetailImport::where('imp_id', $imp_code->id)->get();
        for ($i = 1; $i <= count($delete_Row); $i++) {
            if ($i == $request->index) {
                $data = DetailImport::where('id', $delete_Row[$i - 1]->id)->first();
                // $di_amount = $data->di_amount;
                // $di_into_money = $data->di_into_money;
                $sup_id = $data->sup_id;
                $sup = Supplies::where('id', $sup_id)->first();
                $sup_amount = $sup->sup_amount - $data->di_amount;
                $sup_total = $sup->sup_total - $data->di_into_money;
                Supplies::where('id', $sup_id)->update([
                    'sup_amount' => $sup_amount,
                    'sup_total' => $sup_total,
                ]);

                $di_id = DetailImport::where('id', $delete_Row[$i - 1]->id)->delete();
                return response()->json($di_id, Response::HTTP_OK);
            }
        }
        return response()->json($r, Response::HTTP_OK);
    }

    public function printPDF(Request $request)
    {
        $imp_code = $request->imp_code;
        $imps = Import::where('imp_code', $imp_code)->first();
        $detail = DetailImport::where('imp_id', $imps->id)->get();
        $pdf = app('dompdf.wrapper');
        $pdf = $pdf->loadView('chucnang.nhap.printPDF', compact('imps', 'detail'));
        return $pdf->download($imp_code . '.pdf');
        // return View::make($pdf->download($imp_code.'.pdf'));
        // return $pdf->stream();
        // return view('chucnang.nhap.printPDF')->with(compact('imps', 'detail'));
        // var_dump($abc);die;
    }
}
