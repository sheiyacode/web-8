@extends('admin.layout.main')

@section('content')
<div class="container" style="margin-top: 100px;">
    <h2 class="mb-4">Data Siswa</h2>
    <div class="table-responsive bg-white shadow rounded p-4">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Course</th>
                    <th>Daftar Pada</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->course->title ?? 'Belum Memilih' }}</td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td>
                            @if($user->has_completed_course)
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-warning text-dark">Belum Selesai</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
