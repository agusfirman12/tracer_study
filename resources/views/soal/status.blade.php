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

    <div class="row d-flex justify-content-center mt-3">
        <!-- Soal Pertama -->
        <div class="card w-75 text-center">
            <form action="{{ route('proses-status') }}" method="post">
                @csrf
            <h3 class="card-header text-dark">Apa Kegiatan Anda Saat Ini ?</h3>
            <div class="card-body mt-3">
            <div class="row">
                <div class="col mb-3">
                    <div class="form-check">
                        <input type="radio" class="btn-check" name="status" id="jawabanA" autocomplete="off" value="Kuliah">
                        <label class="btn btn-outline-success pt-2 fw-semibold" id="answer" for="jawabanA">Melanjutkan Kuliah</label>  
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="form-check">
                        <input type="radio" class="btn-check" name="status" id="jawabanB" autocomplete="off" value="karyawan">
                        <label class="btn btn-outline-success pt-2 fw-semibold" id="answer" for="jawabanB">Bekerja/Karyawan</label>           
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <div class="form-check">
                        <input type="radio" class="btn-check" name="status" id="jawabanC" autocomplete="off" value="wirausaha">
                        <label class="btn btn-outline-success pt-2 fw-semibold" id="answer" for="jawabanC">Wirausaha</label>           
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="form-check">
                        <input type="radio" class="btn-check" name="status" id="jawabanD" autocomplete="off" value="belum bekerja">
                        <label class="btn btn-outline-success pt-2 fw-semibold" id="answer" for="jawabanD">Belum Bekerja</label>           
                    </div>
                </div>
            </div>
            </div>
            <!-- Tombol Previous dan Next -->
            <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('profile') }}">
                <button type="button" class="btn btn-warning">Kembali</button>
            </a>
                <button type="submit" class="btn btn-warning">Selanjutnya</button>
            </div>
        </form>
        </div>
    </div>
  </div>
@endsection