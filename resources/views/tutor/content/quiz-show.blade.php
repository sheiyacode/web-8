@extends('tutor.layout.main')

@section('content')
    <h2 class="container" style="margin-top: 100px;">Quiz Minggu {{ $quiz->week }}</h2>
    <p><strong>Kursus ID:</strong> {{ $quiz->course_id }}</p>

    @foreach($quiz->questions as $index => $q)
        <div class="card mb-3 p-3">
            <h5>Pertanyaan {{ $index + 1 }}</h5>
            <p>{{ $q->question }}</p>
            <ul>
                <li>A. {{ $q->option_a }}</li>
                <li>B. {{ $q->option_b }}</li>
                <li>C. {{ $q->option_c }}</li>
                <li>D. {{ $q->option_d }}</li>
            </ul>
            <p><strong>Jawaban Benar:</strong> {{ strtoupper($q->correct_answer) }}</p>
        </div>
    @endforeach

    <a href="{{ route('tutor.quizzes.create', ['course' => $quiz->course_id, 'week' => $quiz->week]) }}" class="btn btn-warning">
        Edit / Ganti Quiz
    </a>
@endsection
