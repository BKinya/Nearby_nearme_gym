<?php

namespace App\Http\Controllers;

use App\Gym_users;
use Illuminate\Http\Request;
use App\Http\Resources\Gym_users as Gym_usersResource;
//use phpseclib\Crypt\Hash;
use Illuminate\Support\Facades\Hash;


class GymUsersController extends Controller
{

//    function __construct()
//    {
//        return $this->middleware('auth:api');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
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
     * @param  \Illuminate\Http\Request $request
     * @return Gym_usersResource
     */
    public function store(Request $request)
    {
        $gym_user = $request->isMethod('put') ? Gym_users::findOrFail($request->id) : new Gym_users;
        $gym_user->name = $request->name;
        $gym_user->email = $request->email;
        $gym_user->password = bcrypt($request->password);
        $gym_user->save();
        return new Gym_usersResource($gym_user);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Gym_usersResource
     */
    public function show($id)
    {
        $gym_user = Gym_users::where('id', $id)->first();
        return new Gym_usersResource($gym_user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gym_user = new Gym_users();
        $user_id = Gym_users::where('id', $id)->first();
        /**
         * check if the user exists
         */
        if (request()->user()->id !== $user_id->user_id) {
            return response()->json(['error' => 'Unauthorized action'], 401);
        }

        //$contact->update($request->all());

        $user_id->update($request->all());
        return new Gym_usersResource($user_id);

    }

    public function login($email, $password){

        //check if the user exists
        $user = Gym_users::where('email', $email)->first();

        if (!$user){
            return response()->json(["mesage", "user does not exist"]);
        }

        if (Hash::check($password, $user->password)){
            return response()->json(["mesage", "invalid login"]);
        }

        return response()->json(["mesage", "success"]);
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
        if (request()->user()->id !== $user_id->user_id) {
            return response()->json(['error' => 'Unauthorized action'], 401);
        }

        $user = Gym_users::find($id);
        $user->delete();
        return response()->json(null, 200);
    }
}
