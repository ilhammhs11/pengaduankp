<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        	'id_user' => 'U001',
        	'username' => 'Admin',
            'foto' => 'avatar.png',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('admin'),
            'telp' => '089626077978',
        	'level' => '0'
        ]);

        \App\User::create([
        	'id_user' => 'U002',
        	'username' => 'Staf',
            'foto' => 'avatar.png',
        	'email' => 'staf@gmail.com',
        	'password' => bcrypt('staf'),
            'telp' => '0859121383981',
        	'level' => '1'
        ]);

        \App\User::create([
        	'id_user' => 'U003',
        	'username' => 'Staf2',
            'foto' => 'avatar.png',
        	'email' => 'staf2@gmail.com',
        	'password' => bcrypt('staf2'),
            'telp' => '089607726978',
        	'level' => '1'
        ]);

        \App\User::create([
        	'id_user' => 'U004',
        	'username' => 'Cindy Septi Agustiani',
            'foto' => 'avatar.png',
        	'email' => 'cindysepti20@gmail.com',
        	'password' => bcrypt('cindy'),
            'telp' => '089626079787',
        	'level' => '2'
        ]);

        \App\User::create([
        	'id_user' => 'U005',
        	'username' => 'Septiani',
            'foto' => 'avatar.png',
        	'email' => 'septi@gmail.com',
        	'password' => bcrypt('septi'),
            'telp' => '089677260978',
        	'level' => '2'
        ]);
    }
}
