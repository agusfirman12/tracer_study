<?php

namespace Database\Seeders;

use App\Models\student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        student::create([
            'major_id' => 1,
            'nisn' => 1234567890,
            'nik' => 1234567890123456,
            'identity_number' => 1234,
            'full_name' => 'Mohamad Agus Firmansah',
            'email' => 'firman@gmail.com',
            'mobile_phone' => 6286473890647,
            'end_date' => 2020,
        ]);
        student::create([
            'major_id' => 2,
            'nisn' => 1234567899,
            'nik' => 1234567890123465,
            'identity_number' => 1243,
            'full_name' => 'Wahyu Sahri Ramadhan',
            'email' => 'wahyu@gmail.com',
            'mobile_phone' => 6286473826472,
            'end_date' => 2020,
        ]);
        student::create([
            'major_id' => 3,
            'nisn' => 1234567888,
            'nik' => 1234567890123444,
            'identity_number' => 1222,
            'full_name' => 'Jaki Daniyudin',
            'email' => 'jaki@gmail.com',
            'mobile_phone' => 6286473826472,
            'end_date' => 2020,
        ]);
    }
}
