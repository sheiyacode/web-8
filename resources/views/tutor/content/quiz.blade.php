@extends('tutor.layout.main')

@section('content')
<div class="container" style="margin-top: 100px;">
    <h2>Daftar Quiz</h2>

    @if($courses->isEmpty())
        <p>Tidak ada kursus ditemukan.</p>
    @else
        @foreach($courses as $course)
            <div class="card mb-4 p-4">
                <h4>{{ $course->title }}</h4>

                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Minggu</th>
                            <th>Status Quiz</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($week = 1; $week <= 12; $week++)
                            @php
                                $quiz = \App\Models\Quiz::where('course_id', $course->id)
                                    ->where('week', $week)
                                    ->first();
                            @endphp
                            <tr>
                                <td>Minggu {{ $week }}</td>
                                <td>
                                    @if ($quiz)
                                        ✅ Sudah Ada
                                    @else
                                        ❌ Belum Ada
                                    @endif
                                </td>
                                <td>
                                    @if ($quiz)
                                        <a href="{{ route('tutor.quizzes.show', ['course' => $course->id, 'week' => $week]) }}" class="btn btn-sm btn-info">Lihat</a>

                                        <form action="{{ route('tutor.quizzes.destroy', ['course' => $course->id, 'week' => $week]) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus quiz minggu {{ $week }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    @else
                                        <a href="{{ route('tutor.quizzes.create', ['course' => $course->id, 'week' => $week]) }}" class="btn btn-sm btn-primary">Buat Quiz</a>
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        @endforeach
    @endif
</div>
@endsection
