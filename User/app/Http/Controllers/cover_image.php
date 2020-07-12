<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
class cover_image extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //  $save = new user;
//    $save->product_name = $request->product_name;
//      $save->product_description = $request->product_description;
//        $save->product_price = $request->product_price;
 //$save->product_vendor = $request->product_vendor;
 //$save->image = $path;
 //$save->save();
 //return redirect('welcome')->with('status','image added successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_avatar(Request $request)
    {
        if($request->hasfile('avatar')){
          $avatar = $request->file('avatar');
          $filename = time().'.'. $avatar->getClientOriginalExtension();
          $avatar->move('public/storage',$filename);
          $user=Auth::user();
          $user->avatar = $filename;
          $user->save();
        }
        return view('/Editprofile',array('user'=>Auth::user()));
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
