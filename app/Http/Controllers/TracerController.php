<?php

namespace App\Http\Controllers;

use App\Models\alumni;
use App\Models\bankSoal;
use Illuminate\Http\Request;
use App\Models\Tracer_answer;
use Illuminate\Support\Facades\Session;

class TracerController extends Controller
{
    public function profile(Request $request)
    {
        $session = $request->session()->get('userId');
        if ($session == null) {
            return redirect()->route('landing');
        }
        $data = alumni::where('id',$session->id)->first();
        return view('profileView', ['data' => $data]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|file|max:2024'
        ]);
        $key = $request->session()->get('userId');
        if ($key == !null) {
            $path = $request->file('image')->store('img_alumni');
            $modal =  alumni::where('id', $key->id)->first();
            $modal->foto =  $path;
            $modal->save();

            return redirect()->route('profile')->with('success', 'new image has been added!!');
        } else {
            return redirect()->route('landing');
        }
    }

    public function updateNomor(Request $request)
    {
        $request->validate([
            'nomer' => 'required'
        ]);
        $key = $request->session()->get('userId');
        $modal =  alumni::where('id', $key->id)->first();
        $modal->nomer = $request->nomer;
        $modal->save();
        
        return redirect()->route('profile')->with('success', 'new image has been added!!');
    }


    public function status(Request $request)
    {
        $data = $request->session()->get('userId');
        if ($data == null) {
            return redirect()->route('landing');
        }
        return view('soal/status');
    }

    public function prosesStatus(Request $request){
        $data = $request->session()->get('userId');
        if ($data == null) {
            return redirect()->route('landing');
        }

        if($request->status == null){
            return back()->with('jawabanError', 'Silahkan Masukkan Jawaban Anda !!');
        }

        $request->validate([
            'status' =>'required'
        ]);
        $request->session()->put('status',$request->status);

        if(Tracer_answer::where('alumni_id',$data->id)->first() == !null){
            $answer = Tracer_answer::where('alumni_id', $data->id)->first();
            $answer->status = $request->status;
            $answer->save();

            $data = alumni::where('id', $data->id)->first();
            $data->tracer_answer_id = $answer->id;
            $data->save();

            return redirect()->route('viewSoal',['number' => 1]);
        }else if (Tracer_answer::where('alumni_id', $data->id)->first() == null) {
            $answer = new Tracer_answer();
            $answer->alumni_id = $data->id;
            $answer->nisn = $data->nisn;
            $answer->status = $request->status;
            $answer->save();

            $data = alumni::where('id', $data->id)->first();
            $data->tracer_answer_id = $answer->id;
            $data->save();

            return redirect()->route('viewSoal',['number' => 1]);
        }
    }

    public function viewSoal(Request $request,$number){
        $data = $request->session()->get('userId');
        $status = $request->session()->get('status');
        if ($data == null) {
            return redirect()->route('landing');
        }
        
        $soalChose = new BankSoalController();
        $skip = $number-1;
        $resultSoal = $soalChose->store($status,$skip);

        $soalNumber = $number;
        $soalNumber++;
        $request->session()->put('number',$soalNumber);

        foreach ($resultSoal as $idSoal) {
            $request->session()->put('id_soal',$idSoal);
        }
        return view('soal/soal',['data' => $resultSoal,'number' => $soalNumber]);
    }

    public function storeSoal(Request $request){        
        if($request->answer == null){
            return back()->with('jawabanError', 'Silahkan Masukkan Jawaban Anda !!');
        }
        
        $request->validate([
            'answer' =>'required'
        ]);

        $number = $request->session()->get('number');
        $noAnswer = $number-1;
        $id_soal = 'soal'.$noAnswer;
        $answer = [$id_soal => $request->answer];

        $data = $request->session()->get('userId');
        Tracer_answer::where('alumni_id',$data->id)->update($answer);


        return redirect(route('viewSoal',['number' => $number]));
    }
}
