<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\models\profile;


class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $id=Auth::id();
        if($user->profile==null){
            $profile=Profile::create([
                'province'=>'ziad',
                'user_id'=>$id,
                'gender'=>'male',
                'bio'=>'hello world',
                'facebook'=>'http://www.facebook.com',
            ]);
        }
        return view('users.profile')->with('user', $user);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id=null)
    {
        $this->validate($request,[
        'name'=>'required',
        'province'=>'required',
        'gender'=>'required',
        'bio'=>'required',
       ]);
       $user=Auth::user();
       $user->name=$request->name;
       $user->profile->province=$request->province;
       $user->profile->gender=$request->gender;
       $user->profile->bio=$request->bio;
       $user->save();
       if($request->has("password")){
        $user->password =bycrpt( $request->password);
        $user->save();
       }
       return redirect()->back();
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
