<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\InforPost;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infor_company = Information::first();
        return view('hethong.information', ["infor_company" => $infor_company]);
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
        $infor_company = Information::first();
        return view('hethong.editInformation')->with('infor_company', $infor_company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InforPost $request, $id)
    {
        $validated = $request->validated();
        try {
            //code...
            Information::where('id', 1)->update([
                'inf_name'   => $request->inf_name,
                'inf_address' => $request->inf_address,
                'inf_phone'   => $request->inf_phone,
                'inf_email'   => $request->inf_email,
                'inf_website' => $request->inf_website,
            ]);

            return redirect(route('thongtin.index'))->with('alert_success', 'Sửa Thông Tin Công Ty Thành Công!');
        } catch (\Exception $e) {
            //throw $th;
            var_dump($e);
            die;
            return redirect(route('thongtin.index'))->with('alert_error', 'Sửa Thông Tin Công Ty Thất bại!');
        }
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
}