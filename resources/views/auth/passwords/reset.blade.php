{{-- Developed by Julián Agudelo Cifuentes --}}
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">

        {{-- Header --}}
        <div class="card-header">
          {{ __('auth.reset_password') }}
        </div>

        {{-- Body --}}
        <div class="card-body">
          <form method="POST" action="{{ route('password.update') }}" novalidate>
            @csrf

            {{-- Token oculto --}}
            <input type="hidden" name="token" value="{{ $token }}">

            {{-- Email --}}
            <x-form-input
              name="email"
              label="auth.email_address"
              type="email"
              :value="$email ?? old('email')"
              autofocus
            />

            {{-- New Password --}}
            <x-form-input
              name="password"
              label="auth.password"
              type="password"
            />

            {{-- Confirm Password --}}
            <x-form-input
              name="password_confirmation"
              label="auth.confirm_password"
              type="password"
            />

            {{-- Reset Button --}}
            <div class="row mb-3">
              <div class="col-md-6 offset-md-4">
                <button
                  type="submit"
                  class="btn btn-success btn-lg w-100"
                >
                  {{ __('auth.reset_password') }}
                </button>
              </div>
            </div>

          </form>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
