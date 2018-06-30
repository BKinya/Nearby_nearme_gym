<?php

use Illuminate\Database\Seeder;
use App\Gym_users;

class Gym_UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        return factory(Gym_users::class, 5)->create();
    }
}
