<!-- Developed by Santiago Rodriguez Mojica -->
@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="container mt-4">
    @if ($viewData['items']->isEmpty())
        <p class="text-center text-muted">{{ __('wishlist.empty') }}</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>{{ __('wishlist.item_name') }}</th>
                        <th>{{ __('wishlist.type') }}</th>
                        <th>{{ __('wishlist.unit_price') }}</th>
                        <th>{{ __('wishlist.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['items'] as $item)
                        @php
                            $computer = $item->computer;
                            $component = $item->component;
                            $name = $computer ? $computer->getName() : ($component ? $component->getName() : __('wishlist.unknown_item'));
                            $type = $computer ? __('wishlist.computer') : ($component ? __('wishlist.component') : '');
                            $price = $computer ? $computer->getPrice() : ($component ? $component->getPrice() : 0);
                        @endphp
                        <tr>
                            <td>{{ $name }}</td>
                            <td>{{ $type }}</td>
                            <td>${{ number_format($price, 2) }}</td>
                            <td>
                                <a href="{{ route('computer.show', ['id' => $computer ? $computer->getId() : '']) }}" 
                                   class="btn btn-info btn-sm" 
                                   {{ $computer ? '' : 'disabled' }}>
                                    {{ __('wishlist.view') }}
                                </a>

                                <form action="{{ route('wishlist.remove', $item->getId()) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{ __('wishlist.remove') }}
                                    </button>
                                </form>
                                <a href="{{ $computer ? route('computer.show', $computer->getId()) : route('component.show', $component->getId()) }}" class="btn btn-info btn-sm ms-1">
                                    {{ __('wishlist.view') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="text-center mt-3">
        <a href="{{ route('computer.index') }}" class="btn btn-primary me-2">{{ __('wishlist.add_computers') }}</a>
        <a href="{{ route('component.index') }}" class="btn btn-primary">{{ __('wishlist.add_components') }}</a>
    </div>
</div>
@endsection
