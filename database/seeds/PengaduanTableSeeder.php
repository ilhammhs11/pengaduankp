<?php

use Illuminate\Database\Seeder;

class PengaduanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Pengaduan::create([
        	'id_pengaduan' => 'P001',
        	'id_user' => 'U002',
            'judul' => 'Kerusakan Kursi Guru',
        	'tgl_pengaduan' => '2020-05-02',
        	'isi_laporan' => '...',
            'jenis' => 'Keluhan Fasilitas Sekolah',
        	'foto' => 'pengaduan.jpg',
        	'status' => '0'
        ]);

        \App\Pengaduan::create([
        	'id_pengaduan' => 'P002',
        	'id_user' => 'U003',
            'judul' => 'Kurangnya Alat Guna Membantu Bagian Keuangan',
        	'tgl_pengaduan' => '2020-05-03',
        	'isi_laporan' => '...',
            'jenis' => 'Keluhan Fasilitas Sekolah',
        	'foto' => 'pengaduan.jpg',
        	'status' => '1'
        ]);

        \App\Pengaduan::create([
        	'id_pengaduan' => 'P003',
        	'id_user' => 'U004',
            'judul' => 'Ketidak Efektifan Belajar Di Kelas',
        	'tgl_pengaduan' => '2020-05-04',
        	'isi_laporan' => '...',
            'jenis' => 'Keluhan Pembelajaran',
        	'foto' => 'pengaduan.jpg',
        	'status' => '0'
        ]);

        \App\Pengaduan::create([
        	'id_pengaduan' => 'P004',
        	'id_user' => 'U005',
            'judul' => 'Kurangnya Tempat Siswa Membaca',
        	'tgl_pengaduan' => '2020-05-05',
        	'isi_laporan' => '...',
            'jenis' => 'Keluhan Fasilitas Sekolah',
        	'foto' => 'pengaduan.jpg',
        	'status' => '1'
        ]);
    }
}
