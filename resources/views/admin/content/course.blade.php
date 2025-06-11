@extends('admin.layout.main')

@section('content')
<div class="container" style="margin-top: 100px;">
    <h2>Daftar Kursus</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('admin.course.create') }}" class="btn btn-primary">+ Tambah Kursus</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tutor</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->tutor->name ?? '-' }}</td>
                    <td>{{ Str::limit($course->description, 50) }}</td>
                    <td>
                        @if($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" alt="Gambar Kursus" width="100">
                        @else
                            -
                        @endif
                    </td>
                        <td>
                            <a href="{{ route('admin.course.edit', $course->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('admin.course.destroy', $course->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus kursus ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada kursus.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
