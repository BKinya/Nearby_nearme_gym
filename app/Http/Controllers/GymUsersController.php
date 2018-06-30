<?php

namespace App\Http\Controllers;

use App\Gym_users;
use Illuminate\Http\Request;
use App\Http\Resources\Gym_users as Gym_usersResource;

class GymUsersController extends Controller
{

    function __construct()
    {
        return $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gym_users = Gym_users::all();

        return Gym_usersResource::collection($gym_users);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gym_user = $request->user()->gym_users();
        //->gym_users()-create($request->all());
        return $gym_user;


        //return new Gym_usersResource($gym_user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gym_users  $gym_users
     * @return \Illuminate\Http\Response
     */
    public function show(Gym_users $gym_users)
    {
        //
        return new Gym_usersResource($gym_users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gym_users  $gym_users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gym_users $gym_users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gym_users  $gym_users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gym_users $gym_users)
    {
        //
    }
}
