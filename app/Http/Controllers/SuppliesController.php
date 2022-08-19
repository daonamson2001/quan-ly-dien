<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplies;
use App\Models\Unit;
use Illuminate\Http\Response;

class SuppliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Supplies $supplies)
    {
        $units = Unit::select('id', 'unit_name')->get();
        if (isset($_GET['query'])) {
            $search = $_GET['query'];
            $datas = $supplies->where('sup_name',   'LIKE', '%' . $search . '%')
                ->orWhere('id',         'LIKE', '%' . $search . '%')
                ->orWhere('sup_amount', 'LIKE', '%' . $search . '%')
                ->paginate(20);
            $datas->appends($request->all());
            return view('danhmuc.vattu.index')->with(compact('datas', 'units'));
        } else {
            $datas = $supplies->paginate(20);
            return view('danhmuc.vattu.index')->with(compact('datas', 'units'));
        }
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
    public function store(Request $request, Supplies $supplies)
    {
        $check = $supplies->where('sup_name', $request->sup_name)->get();
        if (count($check)) {
            return response()->json('abc', Response::HTTP_OK);
        }
        try {
            $supplies->create($request->all());
            return response()->json($request->sup_name, Response::HTTP_OK);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json('abc', Response::HTTP_OK);
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
    public function edit($id, Supplies $supplies)
    {
        $datasa = $supplies->where('id', $id)->first();
        return response()->json($datasa, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Supplies $supplies)
    {
        $update = $request->all();

        try {
            $supplies->where('id', $request->id)->update($update);
            return response()->json($request->sup_name, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($update, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Supplies $supplies)
    {
        $datas = $supplies->find($id);
        $supplies->destroy($id);
        return response()->json($datas, Response::HTTP_OK);
    }
}