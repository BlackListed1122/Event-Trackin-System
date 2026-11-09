@props(['id', 'name', 'label' => null, 'type' => 'text', 'value' => '', 'placeholder' => '', 'required' => false])

<div class="mb-4">
    @if ($label)
        <label class="block text-sm font-semibold text-gray-700 mb-2"
            for="{{ $id }}">{{ $label }}</label>
    @endif
    <input id="{{ $id }}" type="{{ $type }}" name="{{ $name }}"
        class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
        @error($name) border-red-500 @enderror" placeholder="{{ $placeholder }}" value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }} />
    @error($name)
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
