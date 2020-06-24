<?php

use Illuminate\Database\Seeder;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Siswa::create([
        	'nis' => '1718102001',
        	'id_user' => 'U004',
        	'nama_lengkap' => 'Cindy Septi Agustiani',
        	'id_kelas' => 'K001',
        	'jk' => 'P',
        	'alamat' => 'Jl. Sayuran RT03/RW08 Kec. Dayeuhkolot Kab. Bandung'
        ]);

        \App\Siswa::create([
        	'nis' => '1718102002',
        	'id_user' => 'U005',
        	'nama_lengkap' => 'Septiani',
        	'id_kelas' => 'K001',
        	'jk' => 'L',
        	'alamat' => 'Jl. Sayuran RT03/RW08 Kec. Dayeuhkolot Kab. Bandung'
        ]);
    }
}
