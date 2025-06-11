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
        <th>Dibuat Pada</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tutors as $tutor)
        <tr>
          <td>{{ $tutor->name }}</td>
          <td>{{ $tutor->email }}</td>
          <td>{{ $tutor->created_at->format('d M Y') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection