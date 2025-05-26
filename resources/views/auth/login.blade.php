{{-- Developed by Julián Agudelo Cifuentes --}}
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">

        {{-- Header --}}
        <div class="card-header">
          {{ __('auth.login') }}
        </div>

        {{-- Body --}}
        <div class="card-body">
          <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            {{-- Email --}}
            <x-form-input
              name="email"
              label="auth.email_address"
              type="email"
              autofocus
            />

            {{-- Password --}}
            <x-form-input
              name="password"
              label="auth.password"
              type="password"
            />

            {{-- Login Button --}}
            <div class="row mb-3">
              <div class="col-md-6 offset-md-4">
                <button
                  type="submit"
                  class="btn btn-success btn-lg w-100"
                >
                  {{ __('auth.login') }}
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
                    {{ __('auth.forgot_your_password') }}
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
