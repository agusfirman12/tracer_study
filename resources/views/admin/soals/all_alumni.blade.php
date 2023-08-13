@extends('admin.layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Semua Alumni</div>

                <div class="card-body">
                    <h3>Alumni yang Telah Melakukan Tracer</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Nomor</th>
                                <th>Tahun Lulus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumniTraced as $key => $alumni)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $alumni->nisn }}</td>
                                    <td>{{ $alumni->name }}</td>
                                    <td>{{ $alumni->nomer }}</td>
                                    <td>{{ $alumni->tahun_lulus }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <ul>
                        @foreach ($alumniTraced as $alumni)
                            <li>{{ $alumni->name }}</li>
                        @endforeach
                    </ul> --}}

                    <h3>Alumni yang Belum Melakukan Tracer</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Nomor</th>
                                <th>Tahun Lulus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumniNotTraced as $key => $alumni)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $alumni->nisn }}</td>
                                    <td>{{ $alumni->name }}</td>
                                    <td>{{ $alumni->nomer }}</td>
                                    <td>{{ $alumni->tahun_lulus }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <ul>
                        @foreach ($alumniNotTraced as $alumni)
                            <li>{{ $alumni->name }}</li>
                        @endforeach
                    </ul> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
