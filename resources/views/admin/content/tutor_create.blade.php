@extends('admin.layout.main') {{-- Pastikan layout ini sudah meng-include CSS Scholar --}}

@section('content')

@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

<div class="contact-us section" id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 center">
        <div class="section-heading">
          <h6>Tambah Tutor Baru</h6>
          <h2>Masukkan data untuk membuat akun tutor</h2>
          <p>Tutor yang didaftarkan akan dapat login dan mengelola materi serta kuis untuk siswa.</p>
        </div>
      </div>
      <div class="col-lg-6 center">
        <div class="contact-us-content">
          <form id="contact-form" action="{{ route('admin.tutor.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="name" id="name" placeholder="Nama Lengkap..." value="{{ old('full_name') }}" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email Tutor..." value="{{ old('email') }}" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="password" name="password" id="password" placeholder="Password..." autocomplete="on" required>
                  @error('password')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </fieldset>
              </div>

              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" class="orange-button w-100">Tambah Tutor</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
