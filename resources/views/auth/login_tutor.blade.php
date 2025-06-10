@extends('tutor.layout.mainlogin')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="contact-us section d-flex align-items-center justify-content-center" id="contact" style="min-height:100vh">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        <div class="section-heading mb-4">
          <h1>Login Here!</h1>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="contact-us-content">
          <form id="contact-form" action="{{ route('login.user') }}" method="POST">
            @csrf
            <input type="hidden" name="role" value="tutor">

            <div class="row">
              <div class="col-lg-12 mb-3">
                <input type="email" name="email" class="form-control" placeholder="Your E-mail..." required value="{{ old('email') }}">
              </div>

              <div class="col-lg-12 mb-3">
                <input type="password" name="password" class="form-control" placeholder="Your Password..." required>
              </div>

              <div class="col-lg-12">
                <button type="submit" class="orange-button w-100">Login</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
