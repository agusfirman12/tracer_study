@extends('layouts.main')
<style>
.container{
    height: 85vh;
}

    .container .text-center {
  /* background-color: aliceblue; */
  border-radius: 10px;
  padding: 10px;
  color: white;
}
.card {
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  padding: 20px;
}
.btn-primary {
  background-color: #f39422;
  border-color: #f39422;
}
.btn-primary:hover {
  background-color: #ffac41;
  border-color: #ffac41;
}
.form-check #answer{
        width: 300px;
        height: 50px;
    }
@media(max-width: 500px){
    .form-check #answer{
        width: 200px;
    }
}

@media(max-width: 300px){
    .form-check #answer{
        width: 150px;
    }
}

</style>

@section('container')
<div class="container justify-content-center mt-5">
    <!-- Header -->
    <div class="row">
        <div class="col title text-center text-white">
            <h2>Sistem Lacak Alumni</h2>
            <h5>SMK Negeri Ihya'Ulumudin Singojuruh</h5>
        </div>
    </div>    
    @foreach ($data as $key => $item)

    <div class="row d-flex justify-content-center">
      <div class="col-4">
          @if (session()->has('jawabanError')) 
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('jawabanError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
      </div>
    </div>

    <div class="row d-flex justify-content-center">
        <!-- menampilkan soal -->
        <div class="card w-75 text-center">
            <form action="/tracer-study/proses-soal" method="post">
                @csrf
            <h3 class="card-header text-dark">{{ $number-1}}. {{ $item->soal }}</h3>
            <div class="card-body mt-3">
            <div class="row">
                <div class="col mb-3">
                    <div class="form-check">
                        <input type="radio" class="btn-check" name="answer" id="answer1" autocomplete="off" value="{{ $item->answer1 }}">
                        <label class="btn btn-outline-success pt-2 fw-semibold" id="answer" for="answer1">{{ $item->answer1 }}</label>  
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="form-check">
                        <input type="radio" class="btn-check" name="answer" id="answer2" autocomplete="off" value="{{ $item->answer2 }}">
                        <label class="btn btn-outline-success pt-2 fw-semibold" id="answer" for="answer2">{{ $item->answer2 }}</label>           
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <div class="form-check">
                        <input type="radio" class="btn-check" name="answer" id="answer3" autocomplete="off" value="{{ $item->answer3 }}">
                        <label class="btn btn-outline-success pt-2 fw-semibold" id="answer" for="answer3">{{ $item->answer3 }}</label>           
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="form-check" data-bs-toggle="modal" data-bs-target="#exampleModalLainnya">
                        <input type="radio" class="btn-check" name="answer" id="answer4" autocomplete="off" value="{{ $item->answer4 }}">
                        <label class="btn btn-outline-success pt-2 fw-semibold" id="answer" for="answer4">{{ $item->answer4 }}</label>           
                    </div>
                </div>
              </div>
            </div>
             <!-- Tombol Previous dan Next -->
             <div class="card-footer d-flex justify-content-between">
              @if ($number == 3)
              <a href="{{ route('viewSoal',['number' => $number-2]) }}">
                <button type="button" class="btn btn-warning">Kembali</button>
              </a>
              @else                  
              <a href="{{ route('status') }}">
                <button type="button" class="btn btn-warning">Kembali</button>
              </a>
              @endif
                  <button type="submit" id="nextButton" class="btn btn-warning">Selanjutnya</button>
              </div>
          </form>
        </div>
      </div>
      @endforeach
    </div>
    
    {{-- modal jawaban lainya --}}
<div class="modal fade" id="exampleModalLainnya" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Jawaban Lainya</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/tracer-study/proses-soal" method="post">
          @csrf
        <div class="form-floating mx-3 my-1">
            <input type="text" name="answer" class="form-control" id="floatingInput" placeholder="35xxxxxxx" required>
            <label for="floatingInput">Silahkan Tulis Jawaban Anda</label>
        </div>
        <div class="modal-footer">
          <button class="w-3 btn btn-sm text-white shadow"style="background-color: #5F9DF7" type="submit">Simpan</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  {{-- end modal jawaban lainya--}}

  {{-- modal finish --}}
<div class="modal fade" id="exampleModalFinish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Apa Anda Yakin Dengan Jawaban Anda ?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <a href="">
            <button type="button" class="btn btn-danger">Selesai</button>
          </a>
        </div>
      </div>
    </div>
  </div>
  {{--end modal finish--}}

   {{-- onclick js --}}
   <script>
    const  nextButton = document.getElementById('nextButton');
    const  ansewer1= document.getElementById('ansewer1');
    const  answer2 = document.getElementById('answer2');
    const  answer3 = document.getElementById('answer3');

    function nextPage(){
      nextButton.click();
    }

    answer1.onclick = nextPage;
    answer2.onclick = nextPage;
    answer3.onclick = nextPage;
  </script>
@endsection