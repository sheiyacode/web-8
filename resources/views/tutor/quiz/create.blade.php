@extends('tutor.layout.main')

@section('content')
<div class="container" style="margin-top: 100px;">
<h2>Buat Quiz - {{ $course->title }} (Minggu {{ $week }})</h2>

<form action="{{ route('tutor.quizzes.store', ['course' => $course->id, 'week' => $week]) }}" method="POST">
    @csrf
    <input type="hidden" name="course_id" value="{{ $course->id }}">
    <input type="hidden" name="week" value="{{ $week }}">
    

    @for ($i = 1; $i <= 5; $i++)
        <div class="mb-4">
            <label>Pertanyaan {{ $i }}</label>
            <input type="text" name="questions[{{ $i }}][question]" class="form-control" required>

            <div class="row mt-2">
                <div class="col">
                    <input type="text" name="questions[{{ $i }}][option_a]" placeholder="Opsi A" class="form-control" required>
                </div>
                <div class="col">
                    <input type="text" name="questions[{{ $i }}][option_b]" placeholder="Opsi B" class="form-control" required>
                </div>
                <div class="col">
                    <input type="text" name="questions[{{ $i }}][option_c]" placeholder="Opsi C" class="form-control" required>
                </div>
                <div class="col">
                    <input type="text" name="questions[{{ $i }}][option_d]" placeholder="Opsi D" class="form-control" required>
                </div>
            </div>

            <select name="questions[{{ $i }}][correct_answer]" class="form-control mt-2" required>
                <option value="">Pilih Jawaban Benar</option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
            </select>
        </div>
        <hr>
    @endfor

    <button type="submit" class="btn btn-primary">Simpan Quiz</button>
</form>
</div>
@endsection
