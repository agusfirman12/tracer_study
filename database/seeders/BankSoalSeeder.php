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
            "answer2" => "Perguruan Tinggi Swsata",
            "answer3" => "Sekolah Tinggi Kedinasan",
            "answer4" => "Lainya"
        ]);
        DB::table('bank_soals')->insert([
            "soal" => "Apa alasan Anda melanjutkan studi? ",
            "type" => "Kuliah",
            "answer1" => "Tuntutan profesi",
            'answer2' => "Kesempatan beasiswa",
            "answer3" => "Prestasi",
            "answer4" => "Belum ingin bekerja"
        ]);
        DB::table('bank_soals')->insert([
            "soal" => "Kapan anda melanjutkan studi setelah lulus ?",
            "type" => "Kuliah",
            "answer1" => "Tahun pertama kelulusan",
            'answer2' => "Tahun kedua setelah kelulusan",
            "answer3" => "Tahun ketiga setelah kelulusan",
            "answer4" => "Belum mendapatkan pekerjaan"
        ]);
        DB::table('bank_soals')->insert([
            "soal" => "Darimanakah sumber biaya studi lanjut anda?",
            "type" => "Kuliah",
            "answer1" => "Biaya sendiri",
            'answer2' => "Dibiayai perusahaan",
            "answer3" => "Beasiswa pemerintah",
            "answer4" => "Beasiswa swasta"
        ]);
        DB::table('bank_soals')->insert([
            "soal" => "Seberapa erat hubungan bidang studi lanjutan anda dengan kompetensi keahlian anda semasa SMK?",
            "type" => "Kuliah",
            "answer1" => "Sangat Erat",
            "answer2" => "Erat",
            "answer3" => "Kurang Erat",
            "answer4" => "Tidak Sama Sekali"
        ]);
        DB::table('bank_soals')->insert([
            "soal" => "Bekerja Sebagai Apa Anda Saat Ini ? ",
            "type" => "Karyawan",
            "answer1" => "Karyawan Swasta",
            "answer2" => "PNS",
            "answer3" => "Karyawan",
            "answer4" => "Lainya"
        ]);
        DB::table('bank_soals')->insert([
            "soal" => "Kapan anda medapatkan pekerjaan setelah lulus ?",
            "type" => "Karyawan",
            "answer1" => "Tahun pertama kelulusan",
            'answer2' => "Tahun kedua setelah kelulusan",
            "answer3" => "Tahun ketiga setelah kelulusan",
            "answer4" => "Belum mendapatkan perkerjaan"
        ]);

        DB::table('bank_soals')->insert([
            "soal" => "berapa gaji yang diterima pada saat berkerja? ",
            "type" => "Karyawan",
            "answer1" => "500.000-1.000.000",
            'answer2' => "1.000.000-2.500.000",
            "answer3" => "2.500.000 - 5.000.000",
            "answer4" => "lebih dari 5.000.000"
        ]);
        DB::table('bank_soals')->insert([
            "soal" => "Bidang wirausaha apa yang ada jalankan saat ini ? ",
            "type" => "Wirausaha",
            "answer1" => "Bidang Jasa",
            'answer2' => "Bidang Makanan",
            "answer3" => "Bidang Retail",
            "answer4" => "Lainya"
        ]);

        DB::table('bank_soals')->insert([
            "soal" => "kesulitan apa yang membuat anda belum bekerja ? ",
            "type" => "belum bekerja",
            "answer1" => "Sulitnya mendapatkan informasi lowongan",
            'answer2' => "Transportasi",
            "answer3" => "Persaingan kerja yang ketat",
            "answer4" => "Lainya"
        ]);
    }
}
