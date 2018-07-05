<?php

namespace App\Http\Controllers;

use App\Gym_users;
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
        $user_profile = User_profile::all();
        return user_profileResource::collection($user_profile);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = Gym_users::where('email', $request->email)->first();
        $user_profile = $request ->isMethod('put') ? User_profile::findOrFail($request->id) : new User_profile;
        $user_profile->gym_users_id = $id->id;
        $user_profile->name = $request->name;
        $user_profile->email = $request->email;
        $user_profile->phone = $request->phone;
        $user_profile->gender = $request->gender;
        $user_profile->age = $request->age;
        $user_profile->current_weight = $request->current_weight;
        $user_profile->target_weight= $request->target_weight;
        $user_profile->save();

        return new user_profileResource($user_profile);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User_profile  $user_profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User_profile::where('email', $id)->first();

        return new user_profileResource($user);
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
