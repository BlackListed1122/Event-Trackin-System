@props(['id', 'name', 'label' => null, 'value' => '', 'placeholder' => '', 'rows' => 7, 'cols' => 30])

<div class="mb-4">
    @if ($label)
        <label class="block text-gray-700" for="{{ $id }}">{{ $label }}</label>
    @endif
    <textarea cols="{{ $cols }}" rows="{{ $rows }}" id="{{ $id }}" value="{{ old($name, $value) }}"
        name="{{ $name }}"
        class="w-full border border-gray-300 rounded-2xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
        @error($name) border-red-500 @enderror" placeholder="{{ $placeholder }}">{{ old($name, $value) }}</textarea>
    @error($name)
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
</div>
