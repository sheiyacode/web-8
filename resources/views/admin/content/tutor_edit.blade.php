@extends('admin.layout.main')

@section('content')
<div class="container" style="margin-top: 100px;">
  <h3>Edit Tutor</h3>

    <form action="{{ route('admin.tutor.update', $tutor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="{{ $tutor->name }}" required>
        </div>
        <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $tutor->email }}" required>
        </div>
        <div class="mb-3">
        <label>Password (isi jika ingin mengubah)</label>
        <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.tutors') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
