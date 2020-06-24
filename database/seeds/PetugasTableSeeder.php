<?php

use Illuminate\Database\Seeder;

class PetugasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Petugas::create([
        	'id_petugas' => "PT001",
        	'id_user' => 'U001',
        	'nama_lengkap' => 'Cindy Septi Agustiani',
        	'jabatan' => 'Bagian Konseling'
        ]);
    }
}
