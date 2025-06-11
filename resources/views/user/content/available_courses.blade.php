@extends('user.layout.main')

@section('content')
<div class="container mt-4">
    <h2>Daftar Kursus Tersedia</h2>
    <div class="row">
        @foreach($courses as $course)
        <div class="col-md-4">
            <div class="card mb-3">
                @if($course->image)
                    <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $course->title }}</h5>
                    <p class="card-text">Tutor: {{ $course->tutor->name ?? '-' }}</p>
                    <a href="#" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
