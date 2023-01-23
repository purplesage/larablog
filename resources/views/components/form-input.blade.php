@props(['name', 'type', 'attributes'])


<div class="mb-6">
  <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
    {{ucwords($name)}}
  </label>
  <input class="border border-gray-200 p-2 w-full focus:outline-none focus:ring" type="{{$type}}" name="{{$name}}"
    id="{{$name}}" {{$attributes(['value'=> old($name), 'required' => false]) }} />
  @error($name)
  <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
  @enderror
</div>