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
                        <th>{{ __('wishlist.computer_name') }}</th>
                        <th>{{ __('wishlist.unit_price') }}</th>
                        <th>{{ __('wishlist.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['items'] as $item)
                        @php
                            $computer = $item->computerData ?? null;
                        @endphp
                        <tr>
                            <td>{{ $computer ? $computer->getName() : __('wishlist.unknown_computer') }}</td>
                            <td>${{ $computer ? number_format($computer->getPrice(), 2) : 'N/A' }}</td>
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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <div class="text-center mt-3">
        <a href="{{ route('computer.index') }}" class="btn btn-primary">{{ __('wishlist.add_more') }}</a>
    </div>
</div>
@endsection
