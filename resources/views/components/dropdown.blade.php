<div @click.away="show = false" x-data="{show:false}" class="relative flex flex-col w-32">
  {{-- Trigger --}}
  <button class="flex lg:inline-flex appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold lg:w-full" @click="show = !show">
    {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}

    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
       height="22" viewBox="0 0 22 22">
      <g fill="none" fill-rule="evenodd">
          <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
          </path>
          <path fill="#222"
                d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
      </g>
  </svg> 
  </button>
  {{-- Links --}}
  <div x-show="show" class="absolute top-10 flex flex-col text-left text-sm leading-6 bg-gray-100 rounded-lg z-10 w-full">
    {{$slot}}
  </div>
</div>