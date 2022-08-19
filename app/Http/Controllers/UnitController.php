<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Http\Requests\UnitPost;
use Illuminate\Http\Response;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($_GET['query'])){
            $search = $_GET['query'];
            $datas = Unit::where('unit_name', 'LIKE', '%'.$search.'%')
                            ->orWhere('id', 'LIKE', '%'.$search.'%')
                            ->orWhere('unit_simplify', 'LIKE', '%'.$search.'%')
                            ->paginate(20);
            $datas->appends($request->all());                
            return view('danhmuc.donvitinh.index')->with(compact('datas'));  
        }else{
            $datas = Unit::paginate(20);
            return view('danhmuc.donvitinh.index')->with(compact('datas'));
        }
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
    public function store(UnitPost $request)
    {
        $validated = $request->validated();
        try {
            Unit::create($request->all());
            return response()->json($request->unit_name, Response::HTTP_OK);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($request->unit_name, Response::HTTP_OK);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Unit::where('id' , $id)->first();
        return response()->json($datas, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id ,Unit $unit)
    {
        $update = $request->all();

        $x = $unit->where('unit_name', $request->unit_name)
                    ->where('id', '!=', $request->id)->count();
        
        if($x == 0){
            $unit->where('id', $request->id)->update($update);
            return response()->json($request->unit_name, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Unit $unit)
    {
        $datas = $unit->find($id);
                 $unit->destroy($id);
        return response()->json($datas, Response::HTTP_OK);
    }
}
 