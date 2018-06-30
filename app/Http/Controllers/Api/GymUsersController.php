<?php

namespace App\Http\Controllers\Api;

use App\Gym_users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Gym_users as Gym_usersResource;

class GymUsersController extends Controller
{
    function __construct()
    {
        return$this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gymUsers = Gym_users::all();
        return Gym_usersResource::collection($gymUsers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * $user = User::firstOrNew(['email'=>$request->email]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

         */
        $gymUser=$request->user()->gym_users()->create($request->all());
        return new Gym_usersResource($gymUser);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gym_user = Gym_users::where('id', $id)->first();
        return new Gym_usersResource($gym_user);
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
    public function destroy(Gym_users $gym_user)
    {
        //
        if (request()->user()->id !== $gym_user->user_id){
            return response()->json(['error' => 'Unaothorized action'], 401);
        }

        $gym_user = $gym_user->delete();
        return response()->json(null, 200);
    }
}
