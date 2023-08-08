@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="image-section justify-content-center d-flex mt-3">
        <img class="mb-4" src="{{ asset('assets/img/logo-img.png') }}" width="120px">
    </div>
    <div class="title text-center text-white">
        <h2>Selamat Datang, Admin</h2>
        <h5>Di Sistem Lacak Alumni SMK Negeri Ihya'Ulumudin</h5>
    </div>
 
    <div class="col-md-4 mt-3">
        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <main class="form-signin bg-white px-3 py-4 rounded-3 shadow" style="margin-bottom: 90px">
            <form action="{{ route('loginAdmin') }}" method="post">
                @csrf
                <div class="d-flex justify-content-center">
                    <h6>Silahkan Masukkan Username/Password Anda</h6>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="floatingInput" placeholder="35xxxxxxx" required value="{{ old('username') }}">
                    <label for="floatingInput">Username</label>
                    @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingInput" placeholder="35xxxxxxx" required value="{{ old('password') }}">
                    <label for="floatingInput">Password</label>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg my-3 text-white shadow" style="background-color: #154286" type="submit">Login</button>
            </form>
        </main>
    </div>
</div>
@endsection