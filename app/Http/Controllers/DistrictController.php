<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Http\Requests\DistrictPost;
use Illuminate\Http\Response;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, District $district)
    {
        if(isset($_GET['query'])){
            $search = $_GET['query'];
            $datas = $district->where('dis_name', 'LIKE', '%'.$search.'%')
                            ->orWhere('id', 'LIKE', '%'.$search.'%')
                            ->paginate(20);
            $datas->appends($request->all());                
            return view('danhmuc.khuvuc.index')->with(compact('datas'));  
        }else{
            $datas = $district->paginate(20);
            return view('danhmuc.khuvuc.index')->with(compact('datas'));
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
    public function store(DistrictPost $request, District $district)
    {
        $validated = $request->validated();
        try {
            $district->create($request->all());
            return response()->json($request->dis_name, Response::HTTP_OK);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($request->dis_name, Response::HTTP_OK);
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
    public function edit($id, District $district)
    {
        $datas = $district->where('id' , $id)->first();
        return response()->json($datas, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, District $district)
    {
        $update = $request->all();

        $x = $district->where('dis_name', $request->dis_name)
                         ->where('id', '!=', $request->id)->count();
        
        if($x == 0){
            $district->where('id', $request->id)->update($update);
            return response()->json($request->dis_name, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, District $district)
    {
        $datas = $district->find($id);
                 $district->destroy($id);
        return response()->json($datas, Response::HTTP_OK);
    }
}
