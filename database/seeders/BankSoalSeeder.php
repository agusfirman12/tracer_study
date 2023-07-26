<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bank_soals')->insert([
            "soal" => "Saat Ini Anda Berkuliah Di Mana ?",
            "type" => "Kuliah",
            "answer1" => "Perguruan Tinggi Negeri",
            "answer2" => "perguruan Tinggi Swsata",
            "answer3" => "Sekolah Tinggi Kedinasan",
            "answer4" => "lainya"
        ]);
        DB::table('bank_soals')->insert([
            "soal" => "Bekerja Sebagai Apa Anda Saat Ini ? ",
            "type" => "karyawan",
            "answer1" => "karyawan swasta",
            "answer2" => "pns",
            "answer3" => "karyawan",
            "answer4" => "lainya"
        ]);
        DB::table('bank_soals')->insert([
            "soal" => "wirausaha apa yang ada jalankan saat ini ? ",
            "type" => "wirausaha",
        ]);
        DB::table('bank_soals')->insert([
            "soal" => "kesulitan apa yang membuat anda belum bekerja ? ",
            "type" => "belum bekerja",
        ]);
    }
}
