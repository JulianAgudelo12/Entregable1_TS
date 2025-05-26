{{-- Developed by Julián Agudelo Cifuentes --}}
@props(['name', 'label'])

<div class="form-check">
  <input
    class="form-check-input @error($name) is-invalid @enderror"
    type="checkbox"
    name="{{ $name }}"
    id="{{ $name }}"
    {{ old($name) ? 'checked' : '' }}
  >
  <label class="form-check-label" for="{{ $name }}">
    {{ __($label) }}
  </label>

  @error($name)
    <span class="invalid-feedback d-block" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
</div>
