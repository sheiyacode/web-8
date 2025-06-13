@extends('user.layout.main')

@section('content')
<div class="section events" id="course">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="section-heading">
          <h6>Mulai Belajar Sekarang</h6>
          <h2>Pilih Paket Belajar Sesuai Targetmu</h2>
          <p>Sesuaikan level belajarmu dengan tujuan dan kebutuhanmu.</p>
        </div>
      </div>

      @forelse($availableCourses as $course)
      <div class="col-lg-12 col-md-6 mb-4">
        <div class="item">
          <div class="row">
            <div class="col-lg-3">
              <div class="image">
                {{-- Gambar default jika tidak ada --}}
                <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}">
              </div>
            </div>
            <div class="col-lg-9">
              <ul>
                <li>
                  <span class="category">{{ $course->title }}</span>
                  <h4>12 Modul Mingguan</h4>
                </li>
                <li>
                  <span>Bonus:</span>
                  <h6>Quiz {{ $course->quizzes_count ??}} Kali</h6>
                  <h6>Sertifikat Digital</h6>
                </li>
                <li>
                  <span>Durasi:</span>
                  <h6>{{ $course->duration ?? }}</h6>
                </li>
                <li>
                  <h4>FREE</h4>
                </li>
              </ul>
              <form method="POST" action="{{ route('user.select.package', $course->id) }}">
                @csrf
                <input type="hidden" name="package" value="{{ $course->title }}">
                <button class="btn btn-primary btn-sm">Pilih Paket Ini</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @empty
      <p class="text-muted text-center">Belum ada paket kursus yang tersedia saat ini.</p>
      @endforelse

    </div>
  </div>
</div>
@endsection
