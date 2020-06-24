<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(KelasTableSeeder::class);
        $this->call(PengaduanTableSeeder::class);
        $this->call(PetugasTableSeeder::class);
        $this->call(SiswaTableSeeder::class);
        $this->call(StafTableSeeder::class);
        $this->call(TanggapanTableSeeder::class);
    }
}
