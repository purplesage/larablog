@props(['trigger'])

<div 
  @click.away="show = false" 
  x-data="{show:false}" 
  class="relative flex flex-col w-32">
  {{-- Trigger --}} 
  <div @click="show = !show">
    {{ $trigger }}
  </div>
  {{-- Links --}}
  <div 
  x-show="show" 
  class="absolute top-10 flex flex-col text-left text-sm leading-6 bg-gray-100 rounded-lg z-10 w-full overflow-auto max-h-52">
    {{ $slot }}
  </div>
</div>