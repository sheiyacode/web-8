@extends('tutor.layout.main')

@section('content')
<div class="container mt-5">
    <h2>Manajemen Quiz</h2>

    @foreach($courses as $course)
        <div class="card mb-4 p-3">
            <h4>{{ $course->title }}</h4>

            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th>Minggu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for($week = 1; $week <= 12; $week++)
                        @php
                            $key = $course->id . '-' . $week;
                            $quizExists = isset($quizMap[$key]);
                        @endphp
                        <tr>
                            <td>Minggu {{ $week }}</td>
                            <td>
                                @if($quizExists)
                                    <span class="badge bg-success">Sudah Dibuat</span>
                                @else
                                    <span class="badge bg-secondary">Belum Ada</span>
                                @endif
                            </td>
                            <td>
                                @if(!$quizExists)
                                    <a href="{{ route('tutor.quizzes.create', ['course' => $course->id, 'week' => $week]) }}" class="btn btn-sm btn-primary">
                                        Buat Quiz
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    @endforeach
</div>
@endsection
