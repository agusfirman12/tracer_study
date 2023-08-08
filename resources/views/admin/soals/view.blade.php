@extends('admin.layouts.main') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                            @foreach ($soals as $soal)
                                <tr>
                                    <td>{{ $soal->soal }}</td>
                                    <td>{{ $soal->type }}</td>
                                    <td>{{ $soal->answer1 }}</td>
                                    <td>{{ $soal->answer2 }}</td>
                                    <td>{{ $soal->answer3 }}</td>
                                    <td>{{ $soal->answer4 }}</td>
                                    
                                    {{-- <td>{{ $loop->iteration }}</td>
                                    <td>{{ $question->question_text }}</td>
                                    <td>
                                        @foreach ($question->options as $option)
                                            {{ $option }}<br>
                                        @endforeach
                                    </td>
                                    <td>{{ $question->options[$question->correct_option] }}</td> --}}
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
