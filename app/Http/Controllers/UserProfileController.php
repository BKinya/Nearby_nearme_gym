<?php

namespace App\Http\Controllers;

use App\User_profile;
use Illuminate\Http\Request;
use App\Http\Resources\user_profile as user_profileResource;

class UserProfileController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$contact=$request->user()->contacts()->create($request->all());
        $user_profile = $request->gym_user()->user_profile()->create($request->all());
        return new user_profileResource($user_profile);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function show(User_profile $user_profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_profile $user_profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_profile $user_profile)
    {
        //
    }
}
