@extends('admin.layouts.main')

@section('container')
<div class="content-wrapper">
  <div class="container mt-3">
    <div class="box-header with-border">
      <h3 class="box-title">Data soal</h3>
          <a href="{{ route('add-jurusan') }}" style=" float:right;" type="button" class="btn btn-rounded btn-success mb-5">Tambah Soal</a>
    </div>
    <table id="table" class="table table-bordered ">
      <tr>
        <th>soal</th>
        <th>type</th>
        <th>jawaban 1</th>
        <th>jawaban 2</th>
        <th>jawaban 3</th>
        <th>jawaban 4</th>
        <th class="aksi">Aksi</th>
      </tr>
      @forelse($soals as $data) 
      <tr>
        <td>{{ $data->soal }}</td>
        <td>{{$data->type}}</td>
        <td>{{$data->answer1}}</td>
        <td>{{$data->answer2}}</td>
        <td>{{$data->answer3}}</td>
        <td>{{$data->answer4}}</td>
        <td class="aksi">
          <a href="{{ route('edit-soal',$data->id) }}" class="btn btn-info">Edit</a>
          <a href="{{ route('delete-jurusan',$data->id) }}" id="delete" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="6"><h3 class="text-center" style="opacity: 50%">Data Jurusan Belum Ada</h3></td>
      </tr>
      @endforelse 
    </table>
  </div>
</div>
@endsection