<?php

use Illuminate\Database\Seeder;

class StafTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Staf::create([
        	'id_staf' => 'S001',
        	'id_user' => 'U002',
        	'nama_lengkap' => 'Cindy Septi Agustiani',
        	'bagian' => 'administrasi'
        ]);

        \App\Staf::create([
        	'id_staf' => 'S002',
        	'id_user' => 'U003',
        	'nama_lengkap' => 'Septi Agustiani',
        	'bagian' => 'keuangan'
        ]);
    }
}
