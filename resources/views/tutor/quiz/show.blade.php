@extends('tutor.layout.main')

@section('content')
<div class="container" style="margin-top: 100px;">
    <h3>Quiz: {{ $course->title }} - Minggu {{ $week }}</h3>

    @if($quizzes->isEmpty())
        <p>Quiz belum tersedia.</p>
    @else
        @foreach($quizzes as $index => $quiz)
            <div class="card mb-3 p-3">
                <h5>Pertanyaan {{ $index + 1 }}</h5>
                <p>{{ $quiz->question }}</p>
                <ul>
                    <li>A: {{ $quiz->option_a }}</li>
                    <li>B: {{ $quiz->option_b }}</li>
                    <li>C: {{ $quiz->option_c }}</li>
                    <li>D: {{ $quiz->option_d }}</li>
                </ul>
                <strong>Jawaban Benar: {{ strtoupper($quiz->correct_answer) }}</strong>
            </div>
        @endforeach
    @endif
</div>
@endsection
