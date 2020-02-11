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
        
        if(DB::table('users')->get()->count() == 0){

            DB::table('users')->insert([
                [
                    'id' => 1,
                    'email' => 'admin@email.com',
                    'username' => 'admin',
                    'password' => app('hash')->make('admin'),
                    'type' => 1,
                ],
                [
                    'id' => 2,
                    'email' => 'dosen@email.com',
                    'username' => 'dosen',
                    'password' => app('hash')->make('dosen'),
                    'type' => 2,
                ],
                [
                    'id' => 3,
                    'email' => 'mahasiswa@email.com',
                    'username' => 'mahasiswa',
                    'password' => app('hash')->make('mahasiswa'),
                    'type' => 3,
                ],
                [
                    'id' => 4,
                    'email' => 'staff@email.com',
                    'username' => 'staff',
                    'password' => app('hash')->make('staff'),
                    'type' => 4,
                ]

            ]);

            DB::table('lectures')->insert([
                [
                    'id'=> '2',
                    'name'=> 'dosen',
                    'nik'=> '123123',
                    'nip'=> '42342342'
                ]
            ]);

            DB::table('staff')->insert([
                [
                    'id'=> '4',
                    'name'=> 'staff',
                    'nik'=> '123123',
                    'npwp'=> '42342342'
                ]
            ]);

            DB::table('students')->insert([
                [
                    'id'=> '3',
                    'name'=> 'mahasiswa',
                    'nim'=> '161152',
                    'year'=> '2016'
                ]
            ]);
        } 
    }
}
