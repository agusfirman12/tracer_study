@extends('admin.layouts.main') 

@section('container')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Alumni dengan Status: {{ $status }}</div>

                <div class="card-body">
                    <ul>
                        @foreach ($alumniByStatus as $alumni)
                            <li>{{ $alumni->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
