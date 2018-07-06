<?php

namespace App\Http\Controllers;

use App\Gym_users;
use App\sessions_91247;
use Illuminate\Http\Request;

class Sessions91247Controller extends Controller
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
        $id = Gym_users::where('email', $request->email)-first();
        $workout_session = $request ->isMethod('put') ? sessions_91247::findOrFail($request->id) : new sessions_91247;
        $workout_session->gym_users_id = $id->id;
        $workout_session->date = $request->date;
        $workout_session->exercise_type_name = $request->exercise_type_name;
        $workout_session->no_of_sets = $request->no_of_sets;
        $workout_session->save;

        return $workout_session;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sessions_91247  $sessions_91247
     * @return \Illuminate\Http\Response
     */
    public function show(sessions_91247 $sessions_91247)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sessions_91247  $sessions_91247
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sessions_91247 $sessions_91247)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sessions_91247  $sessions_91247
     * @return \Illuminate\Http\Response
     */
    public function destroy(sessions_91247 $sessions_91247)
    {
        //
    }
}
