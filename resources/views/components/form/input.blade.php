@props(['name'])

<x-form.field>
  <x-form.label name="{{ $name }}" />
  <input class="border border-gray-200 p-2 w-full rounded"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }}
        >
        @error($name)
                  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
</x-form.field>
