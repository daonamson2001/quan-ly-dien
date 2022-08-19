<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producer;
use App\Models\District;
use App\Http\Requests\ProducerPost;
use Illuminate\Http\Response;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Producer $producer, District $district)
    {
        $districts = $district->all();
        if(isset($_GET['query'])){
            $search = $_GET['query'];
            $datas = $producer->where('pro_name',          'LIKE', '%'.$search.'%')
                            ->orWhere('id',           'LIKE', '%'.$search.'%')
                            ->orWhere('pro_address',  'LIKE', '%'.$search.'%')
                            ->orWhere('pro_phone',    'LIKE', '%'.$search.'%')
                            ->orWhere('pro_email',    'LIKE', '%'.$search.'%')
                            ->orWhere('pro_employee', 'LIKE', '%'.$search.'%')
                            ->paginate(20);
            $datas->appends($request->all());                
            return view('danhmuc.nhasanxuat.index')->with(compact('datas'))->with(compact('districts'));            
                
        }else{
            $datas = $producer->paginate(20);
            return view('danhmuc.nhasanxuat.index')->with(compact('datas'))->with(compact('districts'));
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
    public function store(ProducerPost $request , Producer $producer)
    {
        $validated = $request->validated();
        try {
            $producer->create($request->all());
            return response()->json($request->pro_name, Response::HTTP_OK);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($request->dis_id, Response::HTTP_OK);
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
    public function edit($id, Producer $producer)
    {
        $datas = $producer->where('id' , $id)->first();
        return response()->json($datas, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Producer $producer)
    {
        $update = $request->all();

        $checkName  = $producer->where('pro_name',      $request->pro_name)
                                ->where('id', '!=',     $request->id)->count();

        $checkEmail = $producer->where('pro_email',     $request->pro_email)
                                 ->where('id', '!=',    $request->id)->count();            
        
        $checkPhone = $producer->where('pro_phone',     $request->pro_phone)
                                  ->where('id', '!=',   $request->id)->count(); 
        if($checkName == 0 && $checkEmail == 0 && $checkPhone == 0){
            $producer->where('id', $request->id)->update($update);
            return response()->json($request->pro_name, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Producer $producer)
    {
        $datas = $producer->find($id);
                 $producer->destroy($id);
        return response()->json($datas, Response::HTTP_OK); 
    }
}
