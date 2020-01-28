<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = 'admin@email.com';
        $user->username = 'admin';
        $user->password = 'rahasia';  
        $user->type = 1;
        $user->save();
    }
}
