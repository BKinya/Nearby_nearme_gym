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
    public function update(Request $request, Gym_users $gym_users)
    {
        /**
         *
         * if($request->user()->id !== $contact->user_id){
        return response()->json(['error'=>'Unauthorized action'],401);
        }
        $contact->update($request->all());
        return new ContactResource($contact);
         */
        if($request->user->id !== $gym_users->user_id){
            return response() ->json(['error' => 'Unauthorized action'], 401);
        }

        return "Beatrice";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gym_users  $gym_users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gym_users $gym_users)
    {

        /**
         * if(request()->user()->id !== $contact->user_id){
        return response()->json(['error'=>'Unauthorized action'],401);
        }
        $contact=$contact->delete();
        return response()->json(null,200);
         */
        return $gym_users->user_id;
    }
}
