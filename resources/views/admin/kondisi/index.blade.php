@extends('admin.layouts.main')

<style>
  @media print{
    .aksi{
      display: none;
    } 

    #cetak,#navbar{
      display: none;
    }
  }
</style>

@section('container')
<div class="content-wrapper">
  <div class="container mt-3">
    <div class="row">
      <div class=" box-header with-border">
        <h3 class="box-title">Data Alumni Yang {{ $kondisi }}</h3>
            <a href="" style=" float:right;" id="cetak" type="button" class="btn btn-rounded btn-success mb-5">Cetak Daftar</a>
      </div>
    </div>
    <div class="row table-responsive">
      <table id="table" class="table table-bordered text-center">
        <tr>
          <th>No</th>
          <th>Nisn</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Tahun Lulus</th>
          <th>Jurusan</th>
          <th>Nomor Hp</th>
        </tr>
        @forelse($student as $key => $data) 
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{$data->student->nisn }}</td>
            <td>{{$data->student->full_name}}</td>
            <td>{{$data->student->email}}</td>
            <td>{{$data->student->end_date}}</td>
            <td>{{$data->student->major->name_major }}</td>
            <td>{{$data->student->mobile_phone}}</td>
          </tr>
        @empty
        <tr>
          <td colspan="6"><h3 class="text-center" style="opacity: 50%"> Belum Ada Data Alumni</h3></td>
        </tr>
        @endforelse 
      </table>
    </div>
    <div class="d-flex justify-content-center" id="paginate">                        
      {{ $student->links() }}
    </div>
  </div>
</div>
@endsection