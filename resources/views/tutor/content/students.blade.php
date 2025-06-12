@extends('tutor.layout.main')

@section('content')
<div class="container" style="margin-top: 100px;">
    <h2>Data Siswa dan Progres</h2>

    @foreach($courses as $course)
        <div class="card mb-4 p-3">
            <h4>{{ $course->title }}</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Email</th>
                        @for ($i = 1; $i <= 12; $i++)
                            <th>M{{ $i }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach($course->students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            @for ($i = 1; $i <= 12; $i++)
                                @php
                                    $hasRead = \App\Models\ModuleProgress::where('user_id', $student->id)
                                        ->where('course_id', $course->id)
                                        ->where('week', $i)
                                        ->exists();

                                    $hasQuiz = \App\Models\QuizResult::where('user_id', $student->id)
                                        ->where('course_id', $course->id)
                                        ->where('week', $i)
                                        ->exists();
                                @endphp
                                <td>
                                    <span class="badge bg-{{ $hasRead ? 'success' : 'secondary' }}">M</span>
                                    <span class="badge bg-{{ $hasQuiz ? 'primary' : 'secondary' }}">Q</span>
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</div>
@endsection
