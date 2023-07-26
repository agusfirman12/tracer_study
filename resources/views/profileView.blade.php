@extends('layouts.main')

@section('container')
  <div class="title text-center text-white pt-5">
    <h5>Sistem Lacak Alumni</h5>
    <h3>SMK Negeri Ihya'Ulumudin</h3>
  </div>
  <div class="container py-3 "style="margin-bottom: 106px">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="upload pt-3">
            @if ($data->foto)
            <img src="{{ asset('storage/'.$data->foto) }}" class=" img-thumbnail img-fluid rounded-circle" width="120" height="120">
            @else
            <img src="{{ asset('assets/img/user.png') }}" width="120" height="120" alt="" >
            @endif
            <div class="round">
              <form action="/tracer-study/uploadImage" method="post" enctype="multipart/form-data">
                @csrf
                <input name="image" type="file" />
              <i class="bi bi-camera-fill" style="color: white"></i>
            </div>
          </div>
          <div class="card-body text-center">
            <button class="btn btn-primary btn-sm text-white" type="submit">Simpan</button>
          </div>
          </form>
          <div class="card-body text-center">
            <h5>{{ $data->name }}</h5>
            <p class="text-muted mb-1">Alumni</p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body ps-4">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nama</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $data->name }}</p>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">NISN</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $data->nisn }}</p>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
                  {{ $data->nomer }}
                  <button class="btn btn-sm text-white ms-2" data-bs-toggle="modal" data-bs-target="#exampleModalNomor"type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square text-primary" viewBox="0 0 16 16">
                      <path
                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                      />
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                  </button>
                </p>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Jurusan</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $data->jurusan->nama_jurusan }}</p>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Tahun Lulus</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $data->tahun_lulus }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-md-end">
      <button class="w-10 btn btn-md my-3 text-white shadow me-3" data-bs-toggle="modal" data-bs-target="#exampleModalLogout" style="background-color: #FFA500">Logout</button>
      <button class="w-10 btn btn-md my-3 text-white shadow" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #5F9DF7" type="submit">Mulai</button>
    </div>
  </div>

{{-- modal mulai --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Apa Anda Yakin Data Sudah Benar ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Jika Sudah Yakin, Silahkan Mulai !!!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <a href="{{ route('status') }}">
          <button type="button" class="btn btn-success">Mulai</button>
        </a>
      </div>
    </div>
  </div>
</div>
{{--end modal mulai --}}

{{-- modal logout --}}
<div class="modal fade" id="exampleModalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Apa Anda Yakin Akan Logout ?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <a href="{{ route('logout') }}">
          <button type="button" class="btn btn-danger">Logout</button>
        </a>
      </div>
    </div>
  </div>
</div>
{{--end modal logout--}}

{{-- modal edit nomor handphone --}}
<div class="modal fade" id="exampleModalNomor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah Nomor Handphone Anda!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('updateNomor') }}" method="post" >
        @csrf
      <div class="modal-body">
          <input type="number" name="nomer" class="form-control" placeholder="{{ $data->nomer }}" value="{{ $data->nomer }}"/>
      </div>
      <div class="modal-footer">
        <button class="w-3 btn btn-sm text-white shadow"style="background-color: #5F9DF7" type="submit">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>
{{-- end modal edit nomor handphone--}}
@endsection