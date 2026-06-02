@props(['name', 'label'])

<div class="mb-4">
    <label for="{{ $name }}" class="form-field-label">{{ $label }}</label>
    
    {{ $slot }}

    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
