<?php

namespace App\Http\Controllers;

use App\Models\alumni;
use App\Models\jurusan;
use App\Models\bankSoal;
use Illuminate\Http\Request;
use App\Models\Tracer_answer;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        return view('admin.login');
    }

    public function processLogin(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($credentials) == true) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed! Username atau Password Salah');
    }

    public function logout()
    {
        Auth::logout(); 

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login-admin');
    }

    public function dashboard(Request $request)
    {
        $viewAlumni = alumni::latest()->paginate(5);
        $alumni = alumni::count();
        $bekerja = Tracer_answer::where('soal1', 'Bekerja (fulltime/part time)')->count();
        $wirausaha = Tracer_answer::where('soal1', 'Wiraswasta')->count();
        $kuliah = Tracer_answer::where('soal1', 'Melanjutkan Pendidikan')->count();

        return view('admin.index', [
            'viewAlumni' => $viewAlumni,
            'alumni' => $alumni,
            'bekerja' => $bekerja,
            'wirausaha' => $wirausaha,
            'kuliah' => $kuliah

        ]);
    }

    public function kondisiAlumni($kondisi)
    {
        $alumni = Tracer_answer::where('soal1', $kondisi)->paginate(10);
        return view('admin.kondisi.index', ['alumni' => $alumni, 'kondisi' => $kondisi]);
    }

    public function viewAlumni($jurusan)
    {

        $alumni['alumni'] = alumni::where('jurusan_id', $jurusan)->paginate(10);
        $title['title'] = jurusan::where('id', $jurusan)->get();
        return view('admin.alumni.index', $alumni, $title);
    }


    public function ubahAlumni($id)
    {
        $alumni['alumni'] = alumni::find($id);
        return view('admin.jurusan.ubah', $alumni);
    }


    public function updtAlumni(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|max:5',
            'jurusan' => 'required'
        ]);

        $data = jurusan::find($id);
        $data->kode_jurusan = $request->kode;
        $data->nama_jurusan =  $request->jurusan;
        $data->save();

        return redirect()->route('view-jurusan');
    }

    public function deleteAlumni($id)
    {
        $deleteData = jurusan::find($id);
        $deleteData->delete();
        return redirect()->route('view-jurusan')->with('info', 'Data Berhasil Dihapus');
    }

    public function viewJurusan()
    {
        $jurusan['jurusan'] = Jurusan::all();
        return view('admin.jurusan.index', $jurusan);
    }

    public function addJurusan()
    {
        return view('admin.jurusan.tambah');
    }

    public function ProcessAddJurusan(Request $request)
    {
        $request->validate([
            'kode' => 'required|max:5',
            'jurusan' => 'required'
        ]);

        $data = new jurusan();
        $data->kode_jurusan = $request->kode;
        $data->nama_jurusan =  $request->jurusan;
        $data->save();

        return redirect()->route('view-jurusan');
    }

    public function ubahJurusan($id)
    {
        $jurusan['jurusan'] = jurusan::find($id);
        return view('admin.jurusan.ubah', $jurusan);
    }

    public function updtJurusan(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|max:5',
            'jurusan' => 'required'
        ]);

        $data = jurusan::find($id);
        $data->kode_jurusan = $request->kode;
        $data->nama_jurusan =  $request->jurusan;
        $data->save();

        return redirect()->route('view-jurusan');
    }

    public function deleteJurusan($id)
    {
        $deleteData = jurusan::find($id);
        $deleteData->delete();
        return redirect()->route('view-jurusan')->with('info', 'Data Berhasil Dihapus');
    }

    public function lihatSoal()
    {
        $soals =bankSoal::all(); // Mengambil semua pertanyaan dari database
        // dd($soals);
        return view('admin.soals.view', ['soals' => $soals]);
    }


    public function AddSoal() {
        return view('admin.soals.tambah');
    }

    public function soalStore(Request $request) {
        // Validasi data yang diterima dari form
        $this->validate($request, [
            'soal' => 'required|string',
            'type' => 'required|string',
            'answer1' => 'required|string',
            'answer2' => 'required|string',
            'answer3' => 'required|string',
            'answer4' => 'required|string',
        ]);

        // Membuat objek pertanyaan baru
        $soals = new bankSoal();
        $soals->soal = $request->input('soal');
        $soals->type = $request->input('type');
        $soals->answer1 = $request->input('answer1');
        $soals->answer2 = $request->input('answer2');
        $soals->answer3 = $request->input('answer3');
        $soals->answer4 = $request->input('answer4');

        // Menyimpan pertanyaan ke database
        $soals->save();

        return redirect()->route('lihat-soal')
            ->with('success', 'Pertanyaan Tracer Study berhasil ditambahkan.');
    }

    public function editSoal($id)
    {
        $soals = bankSoal::findOrFail($id);
        return view('admin.soals.edit', ['soal' => $soals]);
    }

    public function updateSoal(Request $request, $id)
    {

        // Validasi data yang diterima dari form
        $this->validate($request, [
            'soal' => 'required|string',
            'type' => 'required|string',
            'answer1' => 'required|string',
            'answer2' => 'required|string',
            'answer3' => 'required|string',
            'answer4' => 'required|string',
        ]);

        // Membuat objek pertanyaan baru
        $soals = bankSoal::findOrFail($id);
        $soals->soal = $request->input('soal');
        $soals->type = $request->input('type');
        $soals->answer1 = $request->input('answer1');
        $soals->answer2 = $request->input('answer2');
        $soals->answer3 = $request->input('answer3');
        $soals->answer4 = $request->input('answer4');

        // Menyimpan pertanyaan ke database
        $soals->save();

        return redirect()->route('lihat-soal')
            ->with('success', 'Pertanyaan Tracer Study berhasil diperbarui.');
    }

    public function deleteSoal($id)
    {
        $soals = bankSoal::findOrFail($id);
        $soals->delete();

        return redirect()->route('lihat-soal')
            ->with('success', 'Pertanyaan Tracer Study berhasil dihapus.');
    }

    public function alumniTraced()
    {
        $alumniTraced = alumni::whereNotNull('tracer_answer_id')->get();
        return view('admin.soals.alumni_traced', ['alumniTraced' => $alumniTraced]);
    }

    public function alumniNotTraced()
    {
        $alumniNotTraced = alumni::whereNull('tracer_answer_id')->get();
        return view('admin.soals.alumni_not_traced', ['alumniNotTraced' => $alumniNotTraced]);
    }

    public function showAllAlumni()
    {
        $alumniTraced = alumni::whereNotNull('tracer_answer_id')->get();
        $alumniNotTraced = alumni::whereNull('tracer_answer_id')->get();

        return view('admin.soals.all_alumni', [
            'alumniTraced' => $alumniTraced,
            'alumniNotTraced' => $alumniNotTraced,
        ]);
    }

    // public function showAlumniByStatus($status)
    // {
    //     $alumniByStatus = alumni::where('tracer_answer_id', $status)->get();

    //     return view('admin.soals.alumni_by_status', [
    //         'alumniByStatus' => $alumniByStatus,
    //         'status' => $status,
    //     ]);
    // }
}
