@extends('user.layout.main')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">My Courses</h2>

    <div class="row">
        @forelse ($courses as $course)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow">
                <img src="{{ $course->image }}" class="card-img-top" alt="{{ $course->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->title }}</h5>
                    <p class="card-text">{{ $course->description }}</p>
                </div>
                <div class="card-footer text-end">
                    <a href="#" class="btn btn-primary btn-sm">Lanjutkan</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-muted">Kamu belum memiliki kursus.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
