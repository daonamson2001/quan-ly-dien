<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Department;
use App\Http\Requests\ChangeUserPost;
use Illuminate\Http\Response;

class UserController extends Controller
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
            $datas = User::where('fullname', 'LIKE', '%'.$search.'%')
                            ->orWhere('id', 'LIKE', '%'.$search.'%')
                            ->orWhere('username', 'LIKE', '%'.$search.'%')
                            ->orWhere('phone', 'LIKE', '%'.$search.'%')
                            ->orWhere('address', 'LIKE', '%'.$search.'%')
                            ->orWhere('gender', 'LIKE', '%'.$search.'%')
                            ->paginate(20);
            $datas->appends($request->all());                
            return view('danhmuc.nhanvien.index')->with(compact('datas'));  
                        
                
        }else{
            $datas = User::paginate(20);
            return view('danhmuc.nhanvien.index')->with(compact('datas'));
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
        $data = User::where('id',$id)->with('deparment:id,dpm_name')->first();

        return response()->json($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id',$id)->first();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, ChangeUserPost $request, $id)
    {
        $validated = $request->validated();
        $update = $request->all();

        $checkEmail          = $user->where('email', $request->email)
                                    ->where('id', '!=', $request->id)->count();

        $checkIdentification = $user->where('identification', $request->identification)   
                                    ->where('id', '!=', $request->id)->count(); 
                                    
        $checkPhone          = $user->where('phone', $request->phone)   
                                    ->where('id', '!=', $request->id)->count(); 
                                    
        if($checkEmail > 0 && $checkIdentification > 0 && $checkPhone >0){  

            try {
                        $user->where('id', $request->id)->update($update);
                $data = $user->select('id')->where('id',$request->id)->first();
                //         DB::table('users')->where('id', $request->id)->update($request->all());
                // $data = DB::table('users')->select('id')->where('id',$request->id)->first();
                return response()->json($data, Response::HTTP_OK);
            } catch (\Exception $e) {
                //throw $th;
                return response()->json($e);
            }
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $datas = $user->select('fullname')->where('id',$id)->first();
        $user -> destroy($id);
        return response()->json($datas, Response::HTTP_OK);
    }


}
