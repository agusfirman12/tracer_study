<?php

namespace Database\Seeders;

use App\Models\major;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       major::create([
            'code_major' => '10111',
            'name_major' => 'Teknik Komputer Dan Jaringan'
        ]);
       major::create([
            'code_major' => '10112',
            'name_major' => 'Teknik Kendaraan Ringan'
        ]);
       major::create([
            'code_major' => '10113',
            'name_major' => 'Akuntansi'
        ]);
    }
}
