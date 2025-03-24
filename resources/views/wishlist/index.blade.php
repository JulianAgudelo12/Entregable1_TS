<!-- Developed by Santiago Rodriguez Mojica -->
@extends('layouts.app')

@section('title',$viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="container">
  
    @if ($viewData['items']->isEmpty())
        <p class="text-center">{{ __('wishlist.empty') }}</p>
    @else
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>{{ __('wishlist.computer_name') }}</th>
                    <th>{{ __('wishlist.unit_price') }}</th>
                    <th>{{ __('wishlist.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['items'] as $item)
                    <tr>
                        <td>{{ $item->computer->getName() }}</td>
                        <td>${{ number_format($item->computer->getPrice(), 2) }}</td>
                        <td>
                            <form action="{{ route('wishlist.remove', $item->getId()) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('wishlist.remove') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('computer.index') }}" class="btn btn-primary mt-3">{{ __('wishlist.add_more') }}</a>
</div>
@endsection
