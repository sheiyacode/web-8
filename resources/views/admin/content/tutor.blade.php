@extends('admin.layout.main')

@section('content')
<div class="container" style="margin-top: 100px;">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
    <h3>Daftar Tutor</h3>
      <a href="{{ route('admin.tutor.create') }}" class="btn btn-primary mb-3">+ Tambah Tutor Baru</a>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Kursus</th>
              <th>Dibuat Pada</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tutors as $tutor)
              <tr>
                <td>{{ $tutor->name }}</td>
                <td>{{ $tutor->email }}</td>
                <td>
                  @if ($tutor->courses->count())
                    {{ $tutor->courses->pluck('title')->join(', ') }}
                  @else
                    <em>Belum ada kursus</em>
                  @endif
                </td>
                <td>{{ $tutor->created_at->format('d M Y') }}</td>
                <td>
                  <a href="{{ route('admin.tutor.edit', $tutor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('admin.tutor.delete', $tutor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus tutor ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection
