@extends('admin.layout.main')

@section('content')
<div class="container" style="margin-top: 100px;">
    <h2>Edit Kursus</h2>

    <form action="{{ route('admin.course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $course->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $course->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar (Kosongkan jika tidak diubah)</label><br>
            @if($course->image)
                <img src="{{ asset('storage/' . $course->image) }}" width="100" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Pilih Tutor</label>
            <select name="tutor_id" class="form-select" required>
                @foreach($tutors as $tutor)
                    <option value="{{ $tutor->id }}" {{ $course->tutor_id == $tutor->id ? 'selected' : '' }}>
                        {{ $tutor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Kursus</button>
    </form>
</div>
@endsection
