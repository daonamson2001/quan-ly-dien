<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Quality;
use App\Http\Requests\QualityPost;
use Illuminate\Http\Response;

class QualityController extends Controller
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
            $datas = Quality::where('qua_name', 'LIKE', '%'.$search.'%')
                            ->orWhere('id', 'LIKE', '%'.$search.'%')
                            ->paginate(20);
            $datas->appends($request->all());                
            return view('danhmuc.chatluong.index')->with(compact('datas'));  
                        
                
        }else{
            $datas = Quality::paginate(20);
            return view('danhmuc.chatluong.index')->with(compact('datas'));
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
    public function store(QualityPost $request)
    {
        $validated = $request->validated();

        try {
            Quality::create($request->all());
            return response()->json($request->qua_name, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($request->qua_name, Response::HTTP_OK);
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
    public function edit(Quality $quality, $id)
    {
        $datas = $quality->where('id' , $id)->first();
        return response()->json($datas, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Quality $quality, Request $request, $id)
    {
        $update = $request->all();

        $x = $quality->where('qua_name', $request->qua_name)
                     ->where('id', '!=', $request->id)->count();
        
        if($x == 0){
            $quality->where('id', $request->id)->update($update);
            return response()->json($request->qua_name, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quality $quality, $id)
    {
        $datas = $quality->find($id);
        $quality->destroy($id);
        return response()->json($datas, Response::HTTP_OK);
    }
}
