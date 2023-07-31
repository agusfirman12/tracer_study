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
            "soal" => "Apa alasan Anda melanjutkan studi? ",
            "type" => "kuliah",
            "answer1" => "Tuntutan profesi",
            'answer2' => "Kesempatan beasiswa",
            "answer3" => "Prestasi",
            "answer4" => "Belum ingin bekerja"
        ]);
        DB::table('bank_soals')->insert([
            "soal" => "Kapan anda melanjutkan studi setelah lulus ?",
            "type" => "kuliah",
            "answer1" => "tahun pertama kelulusan",
            'answer2' => "tahun kedua setelah kelulusan",
            "answer3" => "tahun ketiga setelah kelulusan",
            "answer4" => "belum mendapatkan perkerjaan"
        ]);
        DB::table('bank_soals')->insert([
            "soal" => "Darimanakah sumber biaya studi lanjut anda?",
            "type" => "kuliah",
            "answer1" => "Biaya sendiri",
            'answer2' => "Dibiayai perusahaan",
            "answer3" => "Beasiswa pemerintah",
            "answer4" => "Beasiswa swasta"
        ]);
        DB::table('bank_soals')->insert([
            "soal" => "Seberapa erat hubungan bidang studi lanjutan anda dengan kompetensi keahlian anda semasa SMK?",
            "type" => "Kuliah",
            "answer1" => "sangat erat",
            "answer2" => "Erat",
            "answer3" => "Kurang Erat",
            "answer4" => "Tidak sama sekali"
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
            "soal" => "Kapan anda medapatkan perkerjaan setelah lulus ?",
            "type" => "karyawan",
            "answer1" => "tahun pertama kelulusan",
            'answer2' => "tahun kedua setelah kelulusan",
            "answer3" => "tahun ketiga setelah kelulusan",
            "answer4" => "belum mendapatkan perkerjaan"
        ]);

        DB::table('bank_soals')->insert([
            "soal" => "berapa gaji yang diterima pada saat berkerja? ",
            "type" => "karyawan",
            "answer1" => "500.000-1.000.000",
            'answer2' => "1.000.000-2.500.000",
            "answer3" => "2.500.000 - 5.000.000",
            "answer4" => "lebih dari 5.000.000"
        ]);
        DB::table('bank_soals')->insert([
            "soal" => "Bidang wirausaha apa yang ada jalankan saat ini ? ",
            "type" => "wirausaha",
            "answer1" => "bidang jasa",
            'answer2' => "bidang makanan",
            "answer3" => "bidang retail",
            "answer4" => "lainya"
        ]);

        DB::table('bank_soals')->insert([
            "soal" => "kesulitan apa yang membuat anda belum bekerja ? ",
            "type" => "belum bekerja",
            "answer1" => "sulitnya mendapatkan informasi lowongan",
            'answer2' => "transportasi",
            "answer3" => "persaingan kerja yang ketat",
            "answer4" => "lainya"
        ]);
    }
}
