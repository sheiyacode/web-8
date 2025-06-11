@extends('user.layout.main')

@section('content')

<!-- ====== Hero Banner ====== -->
<section class="main-banner" style="background-size: cover; background-position: center; padding: 100px 0;">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12 text-center">
                <h2 class="display-5 fw-bold text-white">Selamat Datang, {{ $user->name }}</h2>
                <p class="lead text-white">Lanjutkan perjalanan belajarmu hari ini 🎓</p>
            </div>
        </div>
    </div>
</section>

<!-- ====== Stats Section ====== -->
<section class="py-5">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="p-4 shadow rounded bg-white">
                    <h5 class="mb-2 text-primary">Kursus Aktif</h5>
                    <h6>{{ $activeCourse ? $activeCourse->course->title : 'Belum Ada' }}</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 shadow rounded bg-white">
                    <h5 class="mb-2 text-success">Progress Modul</h5>
                    <h6>{{ $activeCourse ? 'Modul ' . $activeCourse->progress : '-' }}</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 shadow rounded bg-white">
                    <h5 class="mb-2 text-danger">Total Quiz</h5>
                    <h6>{{ $quizResults->count() }} dikerjakan</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ====== Course Section ====== -->
<section class="py-5 bg-light">
    <div class="container">
        @if($activeCourse)
            <div class="card shadow-sm mb-4 border-0">
                <div class="card-body">
                    <h5 class="card-title">{{ $activeCourse->course->title }}</h5>
                    <p class="card-text">{{ $activeCourse->course->description }}</p>
                    <a href="#" class="btn btn-primary">Lanjut Belajar</a>
                </div>
            </div>
        @else
            <h4 class="mb-3">Pilih Kursus yang Tersedia</h4>
            <div class="row g-4">
                @forelse($availableCourses as $course)
                    <div class="col-md-6">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->title }}</h5>
                                <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                                <form method="POST" action="{{ route('user.select.package') }}">
                                    @csrf
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    <button class="btn btn-outline-primary btn-sm">Ambil Kursus Ini</button>
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

<!-- ====== Quiz Summary ====== -->
<section class="py-5">
    <div class="container">
        <h4 class="mb-3">Ringkasan Quiz</h4>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                @forelse($quizResults as $result)
                    <p>
                        <strong>{{ $result->quiz->title ?? 'Quiz' }}</strong> — Skor: <span class="text-success">{{ $result->score }}</span>
                    </p>
                @empty
                    <p class="text-muted">Belum ada quiz yang dikerjakan.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- ====== Daily Vocab & Grammar ====== -->
<section class="py-5 bg-light">
    <div class="container">
        <h4 class="mb-3">Daily Vocab & Grammar</h4>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                @if($dailyContent)
                    <h5>📚 Vocab: <strong>{{ $dailyContent->vocab }}</strong></h5>
                    <p>Meaning: {{ $dailyContent->meaning }}</p>
                    <hr>
                    <h5>🧠 Grammar: {{ $dailyContent->grammar }}</h5>
                    <p>{{ $dailyContent->explanation }}</p>
                @else
                    <p class="text-muted">Konten harian belum tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
