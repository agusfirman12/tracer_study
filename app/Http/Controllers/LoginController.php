<?php

namespace App\Http\Controllers;

use App\Models\major;
use App\Models\student;
use Illuminate\Http\Request;
use App\Models\trc_Tracer_answer;

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

        $nisn = student::where('nisn', '=', $credentials)->first();
        $nik = student::where('nik', '=', $credentials)->first();
        $identity_number = student::where('identity_number', '=', $credentials)->first();

        if ($nisn) {
            $request->session()->put('userId', $nisn);
            return redirect()->route('auth-login');
        } elseif ($nik) {
            $request->session()->put('userId', $nik);
            return redirect()->route('auth-login');
        } elseif ($identity_number) {
            $request->session()->put('userId', $identity_number);
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
        $finish =  trc_Tracer_answer::where('student_id', $key->id)->first();

        //bila mana $finis  null maka kita membuat pengimputan data baru
        if ($finish == null) {
            $key = $request->session()->get('userId');
            $result = major::where('id', $key->major_id)->first();
            $request->session()->put('major', $result);
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
        $request->session()->forget('major');
        $request->Session()->forget('start');
        $request->session()->forget('key');
        $request->session()->forget('userId');
        return redirect()->route('landing');
    }
}
