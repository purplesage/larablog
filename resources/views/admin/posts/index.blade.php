<x-layout>
  <div class="w-full flex justify-center items-start mt-10 relative">
    <x-admin-menu />
    <x-dashboard-post-table :posts="$posts" />
  </div>
</x-layout>