<?php

use Illuminate\Database\Seeder;

class KelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Kelas::create([
        	'id_kelas' => 'K001',
        	'nama_kelas' => '12A',
        	'keterangan' => 'Kelas 12 A'
        ]);

        \App\Kelas::create([
        	'id_kelas' => 'K002',
        	'nama_kelas' => '12B',
        	'keterangan' => 'Kelas 12 B'
        ]);

        \App\Kelas::create([
        	'id_kelas' => 'K003',
        	'nama_kelas' => '12C',
        	'keterangan' => 'Kelas 12 C'
        ]);

        \App\Kelas::create([
        	'id_kelas' => 'K004',
        	'nama_kelas' => '12D',
        	'keterangan' => 'Kelas 12 D'
        ]);

        \App\Kelas::create([
        	'id_kelas' => 'K005',
        	'nama_kelas' => '12E',
        	'keterangan' => 'Kelas 12 E'
        ]);
    }
}
