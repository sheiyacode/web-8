@extends('admin.layout.main')

@section('title', 'Edit Siswa')

@section('content')
<div class="container" style="margin-top: 100px;">
    <h2>Edit Data Siswa</h2>

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        {{-- Tambahkan kolom lain jika perlu, misalnya role, kelas, dsb --}}

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.users') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
