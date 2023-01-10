<x-dropdown>
  <x-slot name='trigger'>
    <button 
      class="flex lg:inline-flex appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold lg:w-full">
        {{isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}

      <x-down-arrow class="absolute pointer-events-none" style="right: 12px;" />
    </button>

  </x-slot>
  <x-dropdown-item :active="request()->routeIs('home')" href="/">
    All
  </x-dropdown-item>

  @foreach ($categories as $category)
  <x-dropdown-item 
  :active="request()->is('/?category=' . $category->slug)" 
  href="?category={{$category->slug}}">
    {{ucwords($category->name)}}
  </x-dropdown-item>
  

    @endforeach
</x-dropdown>