@extends('admin.layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-between mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Pertanyaan Tracer Study</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('proses-add-soal') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="soal">Teks Pertanyaan</label>
                            <textarea id="soal" class="form-control" name="soal" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="type">Tipe Soal</label>
                            <textarea id="type" class="form-control" name="type" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="answer1">Jawaban A</label>
                            <input type="text" id="answer1" class="form-control " name="answer1" required value="">
                        </div>

                        <div class="form-group">
                            <label for="answer2">Jawaban B</label>
                            <input type="text" id="answer2" class="form-control" name="answer2" required value="">
                        </div>

                        <div class="form-group">
                            <label for="answer3">Jawaban C</label>
                            <input type="text" id="answer3" class="form-control" name="answer3" required value="">
                        </div>

                        <div class="form-group">
                            <label for="answer4">Jawaban D</label>
                            <input type="text" id="answer4" class="form-control" name="answer4" required value="">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Tambah Pertanyaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
