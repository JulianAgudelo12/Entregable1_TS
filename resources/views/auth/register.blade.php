{{-- Developed by Julián Agudelo Cifuentes --}}
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Name --}}
            <x-form-input
              name="name"
              label="{{ __('Name') }}"
              type="text"
              autofocus
            />

            {{-- Email --}}
            <x-form-input
              name="email"
              label="{{ __('Email Address') }}"
              type="email"
            />

            {{-- Cellphone --}}
            <x-form-input
              name="cellphone"
              label="{{ __('Cellphone') }}"
              type="tel"
            />

            {{-- Password --}}
            <x-form-input
              name="password"
              label="{{ __('Password') }}"
              type="password"
            />

            {{-- Confirm Password --}}
            <x-form-input
              name="password_confirmation"
              label="{{ __('Confirm Password') }}"
              type="password"
            />

            {{-- Submit --}}
            <div class="row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn bg-primary text-white">
                  {{ __('Register') }}
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
