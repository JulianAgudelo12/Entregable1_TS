{{-- Developed by Julián Agudelo Cifuentes --}}
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">

        {{-- Header --}}
        <div class="card-header">
          {{ __('auth.register') }}
        </div>

        {{-- Body --}}
        <div class="card-body">
          <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf

            {{-- Name --}}
            <x-form-input
              name="name"
              label="auth.name"
              type="text"
              autofocus
            />

            {{-- Email --}}
            <x-form-input
              name="email"
              label="auth.email_address"
              type="email"
            />

            {{-- Cellphone --}}
            <x-form-input
              name="cellphone"
              label="auth.cellphone"
              type="tel"
            />

            {{-- Password --}}
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

            {{-- Submit --}}
            <div class="row mb-3">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary btn-lg w-100">
                  {{ __('auth.register') }}
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
