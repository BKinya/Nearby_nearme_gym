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
        //$contacts=request()->user()->contacts;
        $gym_users = request()->user()->gym_users;

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
        $gym_user = $request->user()->gym_users()->create($request->all());
        //->gym_users()-create($request->all());
        return new Gym_usersResource($gym_user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gym_users  $gym_users
     * @return \Illuminate\Http\Response
     */
    public function show(Gym_users $gym_users)
    {
        return $gym_users;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gym_users  $gym_users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gym_user = new Gym_users();
        $user_id = Gym_users::where('id', $id)->first();
        /**
         * check if the user exists
         */
        if (request()->user()->id  !== $user_id->user_id){
            return response()->json(['error'=>'Unauthorized action'],401);
        }

        //$contact->update($request->all());

        $user_id->update($request->all());
        return $user_id;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = Gym_users::where('id', $id)->first();
        /**
         * check if the user exists
         */
        if (request()->user()->id  !== $user_id->user_id){
            return response()->json(['error'=>'Unauthorized action'],401);
        }

        $user = Gym_users::find($id);
        $user->delete();
        return response()->json(null,200);
    }
}
