{{-- Developed by Julián Agudelo Cifuentes --}}

@props(['class' => ''])

<div {{ $attributes->only('rowClass') }}>
  <div class="col-md-6 offset-md-4">
    <button
      type="submit"
      {{ $attributes->merge(['class' => "btn bg-primary text-white {$class}"]) }}
    >
      {{ $slot }}
    </button>
  </div>
</div>
