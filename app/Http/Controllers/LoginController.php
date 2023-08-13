<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumni;
use App\Models\jurusan;
use App\Models\Tracer_answer;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('login.loginView');
    }

    public function loginProcess(Request $request)
    {
        //nisn apakah terdaftar di database
        $credentials = $request->validate([
            'nisn' => 'required|min:4',
        ]);

        $nisn = alumni::where('nisn', '=', $credentials)->first();
        $nik = alumni::where('nik', '=', $credentials)->first();
        $nis = alumni::where('nis', '=', $credentials)->first();

        if ($nisn) {
            $request->session()->put('userId', $nisn);
            return redirect()->route('auth-login');
        } elseif ($nik) {
            $request->session()->put('userId', $nik);
            return redirect()->route('auth-login');
        } elseif ($nis) {
            $request->session()->put('userId', $nis);
            return redirect()->route('auth-login');
        }
        // userId adalah session yang diberikan

        return back()->with('loginError', 'Data anda Tidak Ditemukan');
    }

    public function authenticateSiswa(Request $request)
    {
        // pertama kita check dulu apakah user benar belum pernah mengisi
        //mengambil data sesion apakah yang diminta sesuai
        $key = $request->session()->get('userId');
        //kita check di database apakah ada nimnya
        $finish =  Tracer_answer::where('alumni_id', $key->id)->first();

        //bila mana $finis  null maka kita membuat pengimputan data baru
        if ($finish == null) {
            $key = $request->session()->get('userId');
            $result = Jurusan::where('id', $key->jurusan_id)->first();
            $request->session()->put('jurusan', $result);
            return redirect()->route('profile');
        }elseif($finish->pengerjaan == 'finish') {
            //misalnya user melakukan pengisian maka akan dilempar ke menu login kembali 
            //kemudian dilakukan penghapusan session
            $request->session()->forget('key');
            return redirect()->route('landing')->with('loginError', 'Maaf Anda Telah Mengisi');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('jurusan');
        $request->Session()->forget('start');
        $request->session()->forget('key');
        $request->session()->forget('userId');
        return redirect()->route('landing');
    }
}
