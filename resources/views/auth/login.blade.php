{{-- Developed by Julián Agudelo Cifuentes --}}
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">

        <div class="card-header">
          {{ __('Login') }}
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            {{-- Email --}}
            <x-form-input
              name="email"
              label="Email Address"
              type="email"
              autofocus
            />

            {{-- Password --}}
            <x-form-input
              name="password"
              label="Password"
              type="password"
            />

            {{-- Login Button (same width as inputs) --}}
            <div class="row mb-3">
              <div class="col-md-6 offset-md-4">
                <button
                  type="submit"
                  class="btn btn-success btn-lg w-100"
                >
                  {{ __('Login') }}
                </button>
              </div>
            </div>

            {{-- Forgot Password --}}
            @if (Route::has('password.request'))
              <div class="row">
                <div class="col-md-6 offset-md-4 text-center">
                  <a
                    href="{{ route('password.request') }}"
                    class="text-decoration-none small"
                  >
                    {{ __('Forgot Your Password?') }}
                  </a>
                </div>
              </div>
            @endif

          </form>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
