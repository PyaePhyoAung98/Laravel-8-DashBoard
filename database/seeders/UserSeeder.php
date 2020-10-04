<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name'=>'admin',

                'email' => 'admin@gmail.com',
                'image'=>'',
                'password'=>bcrypt('password')
            ],
            [
                'name'=>'user',
                'email' => 'user@gmail.com',
                'image'=>'',
                'password'=>bcrypt('password')
            ],
        ];
        foreach($users as $user)
        {
            User::create($user);
        }
    }
}
