<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trogiup.phanhoi.feedback');
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
        if($request->hid_user == "on"){
            $user = 'InPrivate';
            // var_dump($user);die;
        }else{
            // var_dump("abc");die;
            $user = $request->session()->get('fullname'); 
        }
        
        $datas = [
            'user'            => $user,
            'rdGiaodien'      => $request->rdGiaodien,
            'rdToiUu'         => $request->rdToiUu,
            'rdChucnang'      => $request->rdChucnang,
            'rdPhanHoi'       => $request->rdPhanHoi,
            'rdTruyCap'       => $request->rdTruyCap,
            'rdThieuChucNang' => $request->rdThieuChucNang,
            'msg'             => $request->msg,
        ];
        // var_dump($datas);die;
        Mail::send('trogiup.phanhoi.sendEmail',$datas ,function($mail) use($request, $datas){
            $mail->from('abc2012199@gmail.com', $datas['user']);
            $mail->to('abc2012199@gmail.com', 'Support')->subject('Notification email');
        });

        return back()->with('success', 'Yêu cầu của bạn đã được gửi!');
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
