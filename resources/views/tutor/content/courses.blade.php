@extends('tutor.layout.main')
@section('content')

<section class="py-5">
    <div class="container" style="margin-top: 100px;">
         @foreach($courses as $course)
        <h4 class="mb-4 text-center">📘 Materi Kursus: 
            <span>{{ $course->title }}</span>
        </h4>
        {{-- Info ringkas kursus --}}
        <div class="mb-4">
            <p><strong>Durasi:</strong> {{ $course->duration }}</p>
            <p><strong>Total Siswa:</strong> {{ $course->users->count() }}</p>
        </div>
        {{-- Tabel modul --}}
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title mb-4">📅 Daftar Materi Mingguan</h5>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-info">
                            <tr>
                                <th>Minggu</th>
                                <th>Judul Materi</th>
                                <th>File</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i <= 12; $i++)
                                @php
                                    $modul = $course->modules->firstWhere('week', $i);
                                @endphp
                                <tr class="{{ $modul ? '' : 'table-light' }}">
                                    <td>
                                        Minggu {{ $i }}
                                        @if($modul)
                                            <span>✅</span>
                                        @else
                                            <span>❌</span>
                                        @endif
                                    </td>
                                    <td>{{ $modul->title ?? '-' }}</td>
                                    <td>
                                        @if($modul && $modul->file_path)
                                            <a href="{{ asset('storage/' . $modul->file_path) }}" target="_blank" class="btn btn-sm btn-success">Lihat File</a>
                                        @else
                                            <span class="text-muted">Belum ada</span>
                                        @endif
                                    </td>
                                    <td>{{ $modul->content ?? '-' }}</td>
                                    <td class="d-flex justify-content-center gap-2">
                                        @if($modul)
                                            <a href="{{ route('tutor.modules.edit', [$course->id, $i]) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                            <form action="{{ route('tutor.modules.destroy', $modul->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                            </form>
                                        @else
                                            <a href="{{ route('tutor.modules.create', [$course->id, $i]) }}" class="btn btn-sm btn-outline-primary">Upload</a>
                                        @endif
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection
