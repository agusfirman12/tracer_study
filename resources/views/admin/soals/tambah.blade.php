@extends('admin.layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Pertanyaan Tracer Study</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('tambah-soal') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="soal">Teks Pertanyaan</label>
                            <textarea id="soal" class="form-control @error('soal') is-invalid @enderror" name="soal" required>{{ old('soal') }}</textarea>
                            @error('soal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">Tipe Soal</label>
                            <textarea id="type" class="form-control @error('type') is-invalid @enderror" name="type" required>{{ old('type') }}</textarea>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer1">Jawaban A</label>
                            <input type="text" id="answer1" class="form-control @error('answer1') is-invalid @enderror" name="answer1" required value="{{ old('answer1') }}">
                            @error('answer1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer2">Jawaban B</label>
                            <input type="text" id="answer2" class="form-control @error('answer2') is-invalid @enderror" name="answer2" required value="{{ old('answer2') }}">
                            @error('answer2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer3">Jawaban C</label>
                            <input type="text" id="answer3" class="form-control @error('answer3') is-invalid @enderror" name="answer3" required value="{{ old('answer3') }}">
                            @error('answer3')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="answer4">Jawaban D</label>
                            <input type="text" id="answer4" class="form-control @error('answer4') is-invalid @enderror" name="answer4" required value="{{ old('answer4') }}">
                            @error('answer4')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Pertanyaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
