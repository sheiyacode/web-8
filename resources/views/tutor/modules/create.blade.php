@extends('tutor.layout.main')

@section('content')
<div class="container" style="margin-top: 100px;">
    <h4 class="mb-4 text-center">📝 Upload Materi - Minggu {{ $week }}</h4>

    <form action="{{ route('tutor.modules.store', [$course->id, $week]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Materi</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Isi Materi</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Upload File</label>
            <input type="file" name="file" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Materi</button>
        <a href="{{ route('tutor.courses.modules', $course->id) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
