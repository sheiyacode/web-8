@extends('user.layout.mainlogin')

@section('content')

<div class="contact-us section" id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 center">
        <div class="section-heading">
          <h6>Join Wordella Now!</h6>
          <h2>Register Now to Start Your Learning Journey</h2>
          <p>Sign up to access free and premium English courses tailored to your goals. Learn Grammar, Vocabulary, Writing, anywhere.</p>
        </div>
      </div>
      <div class="col-lg-6 center">
        <div class="contact-us-content">
          <form id="contact-form" action="{{ route('register') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="full_name" id="full_name" placeholder="Your Name..." value="{{ old('full_name') }}" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail..." value="{{ old('email') }}" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="password" name="password" id="password" placeholder="Your Password..." autocomplete="on" required>
                  @error('password')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password..." autocomplete="on" required>
                  @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </fieldset>
              </div>

              <div class="col-lg-12">
                <a href="{{ url('/login/user') }}" class="orange-button d-block text-center mb-3 text-white">Sudah Punya Akun?</a>
              </div>

              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" class="orange-button w-100">Submit</button>
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
