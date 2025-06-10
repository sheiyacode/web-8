@extends('user.layout.main')

@section('content')
<div class="section events" id="course">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="section-heading">
          <h6>Mulai Belajar sekarang</h6>
          <h2>Pilih Paket Belajar Sesuai Targetmu</h2>
          <p>Sesuaikan level belajarmu dengan tujuan dan kebutuhanmu.</p>
        </div>
      </div>

      @php
        $packages = [
          ['title' => 'Basic', 'quiz' => 2, 'duration' => '3 Bulan', 'image' => 'level2.jpeg'],
          ['title' => 'Intermediate', 'quiz' => 4, 'duration' => '3 Bulan', 'image' => 'level3.jpeg'],
          ['title' => 'Advanced', 'quiz' => 6, 'duration' => '3 Bulan', 'image' => 'level4.jpeg'],
        ];
      @endphp

      @foreach($packages as $package)
      <div class="col-lg-12 col-md-6 mb-4">
        <div class="item">
          <div class="row">
            <div class="col-lg-3">
              <div class="image">
                <img src="{{ asset('scholar/assets/images/' . $package['image']) }}" alt="{{ $package['title'] }}">
              </div>
            </div>
            <div class="col-lg-9">
              <ul>
                <li>
                  <span class="category">{{ $package['title'] }}</span>
                  <h4>12 Modul Mingguan</h4>
                </li>
                <li>
                  <span>Bonus:</span>
                  <h6>Quiz {{ $package['quiz'] }} Kali</h6>
                  <h6>Sertifikat Digital</h6>
                </li>
                <li>
                  <span>Durasi:</span>
                  <h6>{{ $package['duration'] }}</h6>
                </li>
                <li>
                  <h4>FREE</h4>
                </li>
              </ul>
              <form method="POST" action="{{ route('user.select.package') }}">
                @csrf
                <input type="hidden" name="package" value="{{ $package['title'] }}">
                <button class="btn btn-primary btn-sm">Pilih Paket Ini</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</div>
@endsection
