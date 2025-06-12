@extends('tutor.layout.main') {{-- jika kamu punya layout khusus tutor --}}

@section('content')
<section class="main-banner" style="background-size: cover; background-position: center; padding: 100px 0;">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12 text-center">
                <h2 class="display-5 fw-bold text-white">Selamat datang, {{ $tutor->name }}!</h2>
                <p class="lead text-white">Semoga harimu menyenangkan & produktif 🎯</p>
                <p class="mt-1 text-white">
                    {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                </p>
            </div>
        </div>
    </div>
</section>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">

<section class="py-5">
    <div class="container">
        <div class="row text-center g-4">

            <!-- Jumlah Kursus Diampu -->
            <div class="col-md-3">
                <div class="p-4 shadow rounded bg-white">
                    <h5 class="mb-2 text-primary">Kursus Diampu</h5>
                    <h6>{{ $jumlahKursus }} kursus</h6>
                </div>
            </div>

            <!-- Total Siswa -->
            <div class="col-md-3">
                <div class="p-4 shadow rounded bg-white">
                    <h5 class="mb-2 text-success">Total Siswa</h5>
                    <h6>{{ $totalSiswa }} siswa</h6>
                </div>
            </div>

            <!-- Jumlah Quiz Dibuat -->
            <div class="col-md-3">
                <div class="p-4 shadow rounded bg-white">
                    <h5 class="mb-2 text-warning">Quiz Dibuat</h5>
                    <h6>{{ $totalQuiz }} quiz</h6>
                </div>
            </div>

            <!-- Kursus Terakhir Diupdate -->
            <div class="col-md-3">
                <div class="p-4 shadow rounded bg-white">
                    <h5 class="mb-2 text-danger">Update Terakhir</h5>
                    <h6>
                        {{ $kursusTerakhir ? $kursusTerakhir->title : '-' }}<br>
                        <small class="text-muted">
                            {{ $kursusTerakhir ? $kursusTerakhir->updated_at->format('d M Y') : '' }}
                        </small>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Kiri: Daftar Kursus -->
            <div class="col-md-6">
                <h4 class="mb-4 fw-bold text-center">📚 Kursus Diampu</h4>
                @if($courses->count())
                    @foreach($courses as $course)
                        <div class="card mb-3 shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $course->title }}</h5>
                                <p class="mb-1"><strong>🧑‍🎓 Siswa:</strong> {{ $course->users->count() }}</p>
                                <p class="mb-1"><strong>📘 Modul:</strong> {{ $course->modules->count() }}</p>
                                <p class="mb-1"><strong>📝 Quiz:</strong> {{ $course->quizzes->count() }}</p>
                                <p class="mb-0 text-muted"><small>📅 Diperbarui: {{ $course->updated_at->format('d M Y') }}</small></p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-info text-center">Belum ada kursus yang diampu.</div>
                @endif
            </div>

            <!-- Kanan: Siswa Terbaru -->
            <div class="col-md-6">
                <h4 class="mb-4 fw-bold text-center">🧑‍🎓 Siswa Terbaru</h4>
                @if($siswaTerbaru->count())
                    @foreach($siswaTerbaru as $siswa)
                        <div class="card mb-3 shadow-sm border-0">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title">{{ $siswa['name'] }}</h5>
                                    <p class="mb-1"><strong>Kursus:</strong> {{ $siswa['course'] }}</p>
                                </div>
                                <div class="mt-2">
                                    <span class="badge bg-success">
                                        📅 {{ \Carbon\Carbon::parse($siswa['registered_at'])->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning text-center">Belum ada siswa baru.</div>
                @endif
            </div>
        </div>
    </div>
</section>
<section class="py-4">
    <div class="container">
        <h4 class="mb-4 fw-bold text-center">📅 Tabel Modul Mingguan</h4>
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle shadow-sm">
                <thead style="background-color: #7a6ad8; color: white;">
                    <tr>
                        <th>Kursus</th>
                        <th>Minggu</th>
                        <th>Judul Modul</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        @forelse ($course->modules as $module)
                            <tr>
                                <td class="fw-bold text-primary">{{ $course->title }}</td>
                                <td>Minggu {{ $module->week ?? '-' }}</td>
                                <td>{{ $module->title }}</td>
                                <td>
                                    @if($module->content)
                                        <span class="badge bg-success">✅ Diunggah</span>
                                    @else
                                        <span class="badge bg-danger">❌ Belum</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-muted">Belum ada modul di kursus <strong>{{ $course->title }}</strong>.</td>
                            </tr>
                        @endforelse
                    @empty
                        <tr>
                            <td colspan="4" class="text-muted">Belum ada kursus yang diampu.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@if($modulBelumLengkap)
<div class="alert alert-warning shadow-sm mt-3">
    🔔 Beberapa kursus belum memiliki modul untuk minggu ini. Silakan unggah segera.
</div>
@endif

@endsection
