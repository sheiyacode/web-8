@extends('admin.layout.main')

@section('content')
<div class="container" style="margin-top: 100px;">
    <h2>Welcome Back, Admin!</h2>

<div class="container my-5">
  <div class="row text-center">
    <!-- Total Users -->
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="bg-white shadow rounded p-4">
        <h5 class="text-muted">Total Students</h5>
        <h2 class="text-primary fw-bold">{{ $totalUsers }}</h2>
        <a href="{{ route('admin.users') }}" class="btn btn-sm btn-outline-primary mt-2">Lihat</a>
      </div>
    </div>

    <!-- Total Tutors -->
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="bg-white shadow rounded p-4">
        <h5 class="text-muted">Total Tutors</h5>
        <h2 class="text-success fw-bold">{{ $totalTutors }}</h2>
        <a href="{{ route('admin.tutors') }}" class="btn btn-sm btn-outline-success mt-2">Lihat</a>
      </div>
    </div>

    <!-- Total Courses -->
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="bg-white shadow rounded p-4">
        <h5 class="text-muted">Total Courses</h5>
        <h2 class="text-warning fw-bold">{{ $totalCourses }}</h2>
        <a href="{{ route('admin.course') }}" class="btn btn-sm btn-outline-warning mt-2">Lihat</a>
      </div>
    </div>

    <!-- Total Quizzes -->
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="bg-white shadow rounded p-4">
        <h5 class="text-muted">Total Quizzes</h5>
        <h2 class="text-danger fw-bold">{{ $totalQuizzes }}</h2>
        <a href="{{ route('admin.quizzes') }}" class="btn btn-sm btn-outline-danger mt-2">Lihat</a>
      </div>
    </div>
  </div>
</div>

<!-- Line Chart -->
      <div class="bg-white rounded-lg shadow p-4 text-center">
          <h3 class="text-lg font-bold mb-2">Students Registrations per Month</h3>
          <div class="relative h-[300px]">
              <canvas id="lineChart" class="absolute top-0 left-0 w-full h-full"></canvas>
          </div>
      </div>

<!-- Pie Chart -->
      <div class="bg-white rounded-lg shadow p-4 text-center">
          <h3 class="text-lg font-bold mb-2">Students per Course</h3>
          <div class="relative h-[300px]">
              <canvas id="pieChart" class="absolute top-0 left-0 w-full h-full"></canvas>
          </div>
      </div>

<!-- Tabel Ringkasan Kursus -->
<div class="bg-white p-4 rounded shadow mt-5 text-center">
    <h3 class="text-lg font-semibold mb-3">Ringkasan Kursus</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Judul Kursus</th>
                    <th>Jumlah Siswa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->users_count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white p-4 rounded shadow mt-4 text-center">
    <h3 class="text-lg font-semibold mb-3">Quick Actions</h3>
    <div class="d-flex justify-content-center flex-wrap gap-2">
        <a href="{{ route('admin.tutor.create') }}" class="btn btn-info">Tambah Tutor</a>
        <a href="{{ route('admin.course.create') }}" class="btn btn-info">Tambah Kursus</a>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const lineChart = new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode($lineLabels) !!},
            datasets: [{
                label: 'User Registrations',
                data: {!! json_encode($lineData) !!},
                borderColor: '#4F46E5',
                backgroundColor: 'rgba(79,70,229,0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    const pieChart = new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: {!! json_encode($pieLabels) !!},
            datasets: [{
                data: {!! json_encode($pieData) !!},
                backgroundColor: [
                    '#6366F1', '#F97316', '#10B981', '#EAB308', '#EC4899', '#3B82F6'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>
@endpush
