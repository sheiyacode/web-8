@extends('user.layout.main')

@section('content')
<div class="container" style="margin-top: 100px;">
  <h2>Welcome, {{ $user->name }}</h2>
  <p>You're now on your Wordella learning dashboard!</p>
</div>
@endsection
