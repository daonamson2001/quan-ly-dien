<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Http\Requests\RegistrationPost;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hethong.registration');
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
    public function store(RegistrationPost $request)
    {
        $validated = $request->validated();

        $fullname     = $request->old('fullname');
        $gender       = $request->old('gender');
        $birth        = $request->old('birth');
        $address      = $request->old('address');
        $cmnd         = $request->old('cmnd');
        $phone_number = $request->old('phone_number');
        $email        = $request->old('email');
        $position     = $request->old('position');
        $username     = $request->old('username');
        
        switch ($request->position) {
            case 'admin':
                # code...
                $dpm_id = 1;
                break;
            
            case 'lanhdao':
                # code...
                $dpm_id = 2;
                break;

            case 'quanli':
                # code...
                $dpm_id = 3;
                break;

            default:
                # code...
                $dpm_id = 4;
                break;
        } 
        
        try {
            $user = User::create([
                'username'       => $request->username,
                'password'       => bcrypt($request->password),
                'fullname'       => $request->fullname,
                'gender'         => $request->gender,
                'birth'          => $request->birth,
                'address'        => $request->address,
                'identification' => $request->cmnd,
                'phone'          => $request->phone_number,
                'email'          => $request->email,
                'joining'        => $request->date_joining,
                'dpm_id'         => $dpm_id,
            ]);

            return redirect(route('dangky.index'))->with('alert_success','Thêm Người Dùng Thành Công!');
        } catch (\Exception $e) {
            //throw $th;
            return redirect(route('dangky.index'))->with('alert_error','Thêm Người Dùng Thất Bại! '. $e);
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
}
