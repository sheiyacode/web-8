@extends('tutor.layout.main')

@section('content')
<div class="container" style="margin-top: 100px;">
    <h4 class="mb-4 text-center">✏️ Edit Materi - Minggu {{ $module->week }}</h4>

    <form action="{{ route('tutor.modules.update', [$module->course_id, $module->week]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul Materi</label>
            <input type="text" name="title" class="form-control" value="{{ $module->title }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Deskripsi</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $module->content }}</textarea>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Ganti File (opsional)</label>
            <input type="file" name="file" class="form-control">
            @if ($module->file_path)
                <small class="text-muted">File sekarang: {{ basename($module->file_path) }}</small>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('tutor.courses.modules', $module->course_id) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
