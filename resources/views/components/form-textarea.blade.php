@props(['name', 'value'])

<div class="mb-6">
  <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="{{$name}}">
    {{ucwords($name)}}
  </label>
  <textarea class="border border-gray-200 p-2 w-full focus:outline-none focus:ring" name="{{$name}}" id="{{$name}}"
    required>{{ $value }}</textarea>
  @error($name)
  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
  @enderror
</div>