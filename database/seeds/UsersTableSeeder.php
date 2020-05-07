<?php

use App\User;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash; //get this from Auth\RegisterController if you want to hash your password

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'bernaldezsay@gmail.com')->first();

        if (!$user)
        {
            User::create([
                'name' => 'Charles',
                'email' => 'bernaldezsay@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('6730682-C'), //If you want to hash your password
            ]);
        }
    }
}
