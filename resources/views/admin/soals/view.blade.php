@extends('admin.layouts.main') 

@section('container')
<div class="container">
    <div class="row justify-content-between mt-3">
        <div class="box-header with-border">
            <h3 class="box-title">Data Soal</h3>
                <a href="{{ route('tambah-soal') }}" style=" float:right;" type="button" class="btn btn-rounded btn-success mb-5">Tambah Soal</a>
          </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Pertanyaan Tracer Study</div>            

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Type</th>
                                <th>Answer1</th>
                                <th>Answer2</th>
                                <th>Answer3</th>
                                <th>Answer4</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($soals as $key => $soal)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $soal->soal }}</td>
                                    <td>{{ $soal->type }}</td>
                                    <td>{{ $soal->answer1 }}</td>
                                    <td>{{ $soal->answer2 }}</td>
                                    <td>{{ $soal->answer3 }}</td>
                                    <td>{{ $soal->answer4 }}</td>
                                    <td>
                                        <a href="{{ route('edit-soal', $soal->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete-soal', $soal->id) }}" id="delete" class="btn btn-danger">Delete</a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
