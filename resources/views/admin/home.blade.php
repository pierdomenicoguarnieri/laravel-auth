@extends('layouts.admin')

@section('content')

  <div class="container py-4">
    <h2 class="fs-4 text-secondary mb-4">
      Dashboard Home
    </h2>
    <div class="row justify-content-center">
      <div class="col">
        <div class="card shadow-sm">
          <div class="card-header">Message</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            Benvenuto nella home della dashboard, <span class="fw-bold">{{ Auth::user()->name }}</span>!
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
