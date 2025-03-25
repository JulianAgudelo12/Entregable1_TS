<!-- Developed by Julian Agudelo -->
@extends('layouts.app')

@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])

@section('content')
  <div class="container">
    <h3 class="mb-4">{{ __('order.items_in_order') }}</h3>

    @forelse ($viewData['order']->items as $item)
      <div class="card mb-3 shadow-sm">
        <div class="row g-0 align-items-center">
          <div class="col-md-2 p-2 text-center">
            @if ($item->getComponentId() && $item->component->getImage())
              <img src="data:image/jpeg;base64,{{ base64_encode($item->component->getImage()) }}" class="img-fluid rounded-start" alt="{{ $item->component->getName() }}">
            @else
              <div class="d-flex justify-content-center align-items-center bg-light text-muted" style="height: 100%; min-height: 150px;">
                <span>{{ __('order.no_image') }}</span>
              </div>
            @endif
          </div>

          <div class="col-md-7">
            <div class="card-body">
              <h5 class="card-title mb-3">
                @if ($item->getComponentId())
                  {{ $item->component->getName() }}
                @elseif ($item->getComputerId())
                  {{ $item->computer->getName() }}
                @else
                  {{ __('order.unknown_product') }}
                @endif
              </h5>

              <form method="POST" action="{{ route('items.updateQuantity', $item->getId()) }}" class="d-flex align-items-center gap-3 mb-3">
                @csrf
                @method('PUT')
                <label class="mb-0"><strong>{{ __('order.quantity') }}:</strong></label>
                <div class="input-group" style="width: 140px;">
                  <button type="submit" name="quantity" value="{{ $item->getQuantity() - 1 }}" class="btn btn-outline-secondary" @if($item->getQuantity() <= 1) disabled @endif>−</button>
                  <input type="text" class="form-control text-center" value="{{ $item->getQuantity() }}" readonly>
                  <button type="submit" name="quantity" value="{{ $item->getQuantity() + 1 }}" class="btn btn-outline-secondary">+</button>
                </div>
              </form>

              <p class="card-text mb-2">
                <strong>{{ __('order.unit_price') }}:</strong> ${{ number_format($item->getSubTotal() / $item->getQuantity(), 2) }}
              </p>
              <p class="card-text mb-3">
                <strong>{{ __('order.subtotal') }}:</strong> ${{ number_format($item->getSubTotal(), 2) }}
              </p>

              @auth
                <form method="POST" action="{{ route('order.item.remove', $item->getId()) }}" onsubmit="return confirm('{{ __('order.confirm_delete') }}')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-trash"></i> {{ __('order.remove') }}
                  </button>
                </form>
              @endauth
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="alert alert-info text-center">
        {{ __('order.no_items') }}
      </div>
    @endforelse

    <div class="text-end mt-4">
      <h4>{{ __('order.total') }}: ${{ number_format($viewData['order']->getPrice(), 2) }}</h4>
    </div>

    <div class="text-center mt-4">
      <a href="{{ route('home.index') }}" class="btn btn-success">
        <i class="bi bi-house-door-fill"></i> {{ __('order.back_home') }}
      </a>
    </div>
  </div>
@endsection
