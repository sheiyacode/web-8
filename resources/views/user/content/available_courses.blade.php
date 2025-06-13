@extends('user.layout.main')

@section('content')
<form action="{{ route('user.select.package',$course->id)}}" method="POST">
    @csrf
    <input type="hidden" name="package" value="{{ $course->title }}">
    <button type="submit" class="btn btn-primary">Pilih kursus ini</button>
<form>
{{-- <div class="container mt-4">
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
</div> --}}
@endsection
