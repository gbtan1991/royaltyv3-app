<div class="mb-4">
    <label for="{{ $name }}" class="block font-medium mb-1">{{ $label }}:</label>
    <input 
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        class="w-full border rounded p-2"
    >
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>