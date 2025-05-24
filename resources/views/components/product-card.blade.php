<!-- Developed by Julián Agudelo Cifuentes -->
@props(['route', 'name', 'price', 'image', 'noImageLabel' => 'No Image'])

<a href="{{ $route }}" style="text-decoration: none; color: inherit;">
  <div class="card mb-4">
    @if($image)
      <img src="{{ asset('storage/' . $image) }}" class="card-img-top" alt="{{ $name }}">
    @else
      <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $noImageLabel }}">
    @endif
    <div class="card-body text-center">
      <h5 class="card-title">{{ $name }}</h5>
      <p class="card-text">{{ __('pc_component.price') }}: ${{ $price }}</p>
    </div>
  </div>
</a>
