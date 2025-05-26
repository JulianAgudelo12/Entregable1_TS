{{-- Developed by Julián Agudelo Cifuentes --}}
@props([
    'name',
    'label',
    'type' => 'text',
])

<div class="row mb-3">
    <label for="{{ $name }}" class="col-md-4 col-form-label text-md-end">
        {{ __($label) }}
    </label>

    <div class="col-md-6">
        <input
            id="{{ $name }}"
            type="{{ $type }}"
            name="{{ $name }}"
            value="{{ old($name) }}"
            required
            autocomplete="{{ $name }}"
            @class([
                'form-control',
                'is-invalid' => $errors->has($name),
            ])
            {{ $attributes }}
        >

        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
