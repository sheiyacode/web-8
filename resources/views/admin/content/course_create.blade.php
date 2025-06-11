@extends('admin.layout.main')

@section('content')
<div class="container" style="margin-top: 100px;">
    <h2>Tambah Kursus Baru</h2>
    <p>Masukkan detail kursus dan pilih tutor yang bertanggung jawab.</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.course.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Kursus</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar (Opsional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="tutor_id" class="form-label">Pilih Tutor</label>
            <select name="tutor_id" class="form-select" required>
                <option value="">-- Pilih Tutor --</option>
                @foreach($tutors as $tutor)
                    <option value="{{ $tutor->id }}" {{ old('tutor_id') == $tutor->id ? 'selected' : '' }}>
                        {{ $tutor->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Kursus</button>
    </form>
</div>
@endsection
