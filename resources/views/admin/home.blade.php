@extends('layouts.app')

@section('content')
  <main class="vh-100 bg-dark-subtle">
    <div class="container py-4">
      <h2 class="fs-4 text-secondary mb-4">
        {{ __('Dashboard') }}
      </h2>
      <div class="row justify-content-center">
        <div class="col">
          <div class="card shadow-sm">
            <div class="card-header">{{ __('User Dashboard') }}</div>

            <div class="card-body">
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
              @endif

              Benvenuto nella dashboard, <span class="fw-bold">{{ Auth::user()->name }}</span>!
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
