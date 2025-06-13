@extends('user.layout.main')

@section('content')

<section class="section events" id="my-course">
    <div class="container">
        <div class="section-heading text-center">
            <h6>Kursus Aktif</h6>
            <h2>Kursus yang Sedang Kamu Ikuti</h2>
        </div>

        @if ($activeCourse)
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <h4 class="card-title">{{ $activeCourse->title }}</h4>
                            <p class="card-text">{{ $activeCourse->description }}</p>
                            <p><strong>Progres:</strong> Modul {{ $activeCourse->pivot->progress ?? 1 }}</p>
                            <a href="#" class="btn btn-primary">Lanjutkan Belajar</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tabel Progres Modul --}}
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h5 class="mb-3">Progres Modul</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>Modul</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 12; $i++)
                                    <tr>
                                        <td>Modul {{ $i }}</td>
                                        <td>
                                            @if ($i < $activeCourse->pivot->progress)
                                                <span class="badge bg-success">Selesai</span>
                                            @elseif ($i == $activeCourse->pivot->progress)
                                                <span class="badge bg-warning text-dark">Sedang Dipelajari</span>
                                            @else
                                                <span class="badge bg-secondary">Terkunci</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        @else
            {{-- Kalau belum pilih kursus --}}
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <div class="alert alert-info mt-4">
                        Kamu belum memilih kursus. Pilih salah satu di bawah ini untuk memulai belajar.
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                @forelse ($availableCourses as $course)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow border-0">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                                <form method="POST" action="{{ route('user.select.package', $course->id) }}">
                                    @csrf
                                    <input type="hidden" name="package" value="{{ $course->title }}">
                                    <button class="btn btn-outline-primary w-100 mt-2">Ambil Kursus Ini</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted text-center">Belum ada kursus yang tersedia saat ini.</p>
                @endforelse
            </div>
        @endif
    </div>
</section>

@endsection
