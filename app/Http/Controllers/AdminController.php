<?php

namespace App\Http\Controllers;

use App\Models\major;
use App\Models\student;
use App\Models\trc_bankSoal;
use Illuminate\Http\Request;
use App\Models\trc_Tracer_Answer;
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
        $viewStudent = student::latest()->paginate(5);
        $student = student::count();
        $bekerja = trc_Tracer_Answer::where('status', 'karyawan')->count();
        $belumBekerja = trc_Tracer_answer::where('status', 'belum bekerja')->count();
        $wirausaha = trc_Tracer_answer::where('status', 'wirausaha')->count();
        $kuliah = trc_Tracer_answer::where('status', 'kuliah')->count();

        return view('admin.index', [
            'viewStudent' => $viewStudent,
            'student' => $student,
            'bekerja' => $bekerja,
            'belumBekerja' => $belumBekerja,
            'wirausaha' => $wirausaha,
            'kuliah' => $kuliah

        ]);
    }

    public function kondisiAlumni($kondisi)
    {
        $student = trc_Tracer_answer::where('status', $kondisi)->paginate(10);
        return view('admin.kondisi.index', ['student' => $student, 'kondisi' => $kondisi]);
    }

    public function viewAlumni($major)
    {

        $student['student'] = student::where('major_id', $major)->paginate(10);
        $title['title'] = major::where('id', $major)->get();
        return view('admin.alumni.index', $student, $title);
    }


    public function ubahAlumni($id)
    {
        $student['student'] = student::find($id);
        return view('admin.jurusan.ubah', $student);
    }


    public function updtAlumni(Request $request, $id)
    {
        $request->validate([
            'code_major' => 'required|max:5',
            'name_major' => 'required'
        ]);

        $data = major::find($id);
        $data->code_major = $request->code_major;
        $data->name_major = $request->name_major;
        $data->save();

        return redirect()->route('view-jurusan');
    }

    public function deleteAlumni($id)
    {
        $deleteData = major::find($id);
        $deleteData->delete();
        return redirect()->route('view-jurusan')->with('info', 'Data Berhasil Dihapus');
    }

    public function viewJurusan()
    {
        $major['major'] = major::all();
        return view('admin.jurusan.index', $major);
    }

    public function addJurusan()
    {
        return view('admin.jurusan.tambah');
    }

    public function ProcessAddJurusan(Request $request)
    {
        $request->validate([
            'code_major' => 'required|max:5',
            'name_major' => 'required'
        ]);

        $data = new major();
        $data->code_major = $request->code_major;
        $data->name_major = $request->name_major;
        $data->save();

        return redirect()->route('view-jurusan');
    }

    public function ubahJurusan($id)
    {
        $major['major'] = major::find($id);
        return view('admin.jurusan.ubah', $major);
    }

    public function updtJurusan(Request $request, $id)
    {
        $request->validate([
            'code_major' => 'required|max:5',
            'name_major' => 'required'
        ]);

        $data = major::find($id);
        $data->code_major = $request->code_major;
        $data->name_major = $request->name_major;
        $data->save();

        return redirect()->route('view-jurusan');
    }

    public function deleteJurusan($id)
    {
        $deleteData = major::find($id);
        $deleteData->delete();
        return redirect()->route('view-jurusan')->with('info', 'Data Berhasil Dihapus');
    }

    public function lihatSoal()
    {
        $soals =trc_bankSoal::all(); // Mengambil semua pertanyaan dari database
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
        $soals = new trc_bankSoal();
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
        $soals = trc_bankSoal::findOrFail($id);
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
        $soals = trc_bankSoal::findOrFail($id);
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
        $soals = trc_bankSoal::findOrFail($id);
        $soals->delete();

        return redirect()->route('lihat-soal')
            ->with('success', 'Pertanyaan Tracer Study berhasil dihapus.');
    }

    public function alumniTraced()
    {
        $alumniTraced = student::whereNotNull('trc_tracer_answer_id')->get();
        return view('admin.alumni.alumni_traced', ['alumniTraced' => $alumniTraced]);
    }

    public function alumniNotTraced()
    {
        $alumniNotTraced = student::whereNull('trc_tracer_answer_id')->get();
        return view('admin.alumni.alumni_not_traced', ['alumniNotTraced' => $alumniNotTraced]);
    }

    public function showAllAlumni()
    {
        $alumniTraced = student::whereNotNull('trc_tracer_answer_id')->get();
        $alumniNotTraced = student::whereNull('trc_tracer_answer_id')->get();

        return view('admin.alumni.all_alumni', [
            'alumniTraced' => $alumniTraced,
            'alumniNotTraced' => $alumniNotTraced,
        ]);
    }
}
