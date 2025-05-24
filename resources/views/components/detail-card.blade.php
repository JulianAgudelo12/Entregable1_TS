<!-- Developed by Julián Agudelo Cifuentes -->
<div class="detail-card bg-white p-4 rounded shadow-sm">
  <div class="row align-items-center">
    <div class="col-md-4">
      @if(isset($image) && $image)
        <img src="{{ asset('storage/' . $image) }}" class="img-fluid" alt="{{ $name ?? '' }}">
      @else
        <img src="https://via.placeholder.com/300x200" class="img-fluid" alt="No Image">
      @endif
    </div>
    <div class="col-md-8">
      <h3>{{ $name ?? '' }}</h3>
      @foreach($attributes as $label => $value)
        @if($value !== null && $value !== '')
          <p>
            <strong>{{ $label }}:</strong>
            @if($label === __('pc_component.price'))
              ${{ $value }}
            @else
              {{ $value }}
            @endif
          </p>
        @endif
      @endforeach
    </div>
  </div>
</div>
