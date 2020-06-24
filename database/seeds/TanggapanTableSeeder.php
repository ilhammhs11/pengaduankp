<?php

use Illuminate\Database\Seeder;

class TanggapanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Tanggapan::create(['id_tanggapan' => 'T001',
        	'id_pengaduan' => 'P002',
        	'id_petugas' => 'PT001',
        	'tgl_tanggapan' => '2020-05-04',
        	'tanggapan' => '...'
    	]);

    	\App\Tanggapan::create(['id_tanggapan' => 'T002',
        	'id_pengaduan' => 'P004',
        	'id_petugas' => 'PT001',
        	'tgl_tanggapan' => '2020-05-06',
        	'tanggapan' => '...'
    	]);
    }
}
