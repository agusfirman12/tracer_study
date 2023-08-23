@extends('admin.layouts.main') 

@section('container')
<div class="container">
    <div class="row justify-content-between mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Pertanyaan Tracer Study</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('update-soal', $soal->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="soal">Teks Pertanyaan</label>
                            <input type="text" id="soal" class="form-control" name="soal" required value="{{ $soal->soal }}" placeholder="{{ $soal->soal }}" ></input>
                        </div>

                        <div class="form-group">
                            <label for="type">Tipe Soal</label>
                            <input type="text" id="type" class="form-control" name="type"  required value="{{ $soal->type }}" placeholder="{{ $soal->type }}"></input>
                        </div>

                        <div class="form-group">
                            <label for="answer1">Jawaban A</label>
                            <input type="text" id="answer1" class="form-control " name="answer1" required value="{{ $soal->answer1 }}" placeholder="{{ $soal->answer1 }}">
                        </div>

                        <div class="form-group">
                            <label for="answer2">Jawaban B</label>
                            <input type="text" id="answer2" class="form-control" name="answer2" required value="{{ $soal->answer2 }}" placeholder="{{ $soal->answer2 }}">
                        </div>

                        <div class="form-group">
                            <label for="answer3">Jawaban C</label>
                            <input type="text" id="answer3" class="form-control" name="answer3" required value="{{ $soal->answer3 }}" placeholder="{{ $soal->answer3 }}">
                        </div>

                        <div class="form-group">
                            <label for="answer4">Jawaban D</label>
                            <input type="text" id="answer4" class="form-control" name="answer4" required value="{{ $soal->answer4 }}" placeholder="{{ $soal->answer4 }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-3">Update Pertanyaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
