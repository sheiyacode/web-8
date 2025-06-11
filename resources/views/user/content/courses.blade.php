@extends('user.layout.main')

@section('content')

<section class="section events">
    <div class="container">
        <h3 class="mb-4">Kursus Saya</h3>

        @if ($activeCourse)
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $activeCourse->title }}</h5>
                    <p class="card-text">{{ $activeCourse->description }}</p>
                    <p><strong>Progres:</strong> Modul {{ $activeCourse->pivot->progress ?? 1 }}</p>
                    <a href="#" class="btn btn-primary">Lanjutkan Belajar</a>
                </div>
            </div>

            {{-- Tabel Progres Modul --}}
            <h5 class="mt-5">Progres Modul</h5>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Modul Ke</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 12; $i++)
                        <tr>
                            <td>Modul {{ $i }}</td>
                            <td>
                                @if ($i < $activeCourse->progress)
                                    <span class="badge bg-success">Selesai</span>
                                @elseif ($i == $activeCourse->progress)
                                    <span class="badge bg-warning text-dark">Sedang Dipelajari</span>
                                @else
                                    <span class="badge bg-secondary">Terkunci</span>
                                @endif
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>

        @else
            <div class="alert alert-info">Kamu belum memilih kursus. Pilih salah satu untuk memulai belajar:</div>

            <div class="row g-4">
                @forelse ($availableCourses as $course)
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                                <form method="POST" action="{{ route('user.select.package') }}">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <button class="btn btn-outline-primary btn-sm">Pilih Kursus Ini</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Belum ada kursus yang tersedia.</p>
                @endforelse
            </div>
        @endif
    </div>
</section>

@endsection
