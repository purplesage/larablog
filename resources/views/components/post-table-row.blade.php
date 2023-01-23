@props(['post'])

<tr>
  <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
    <div class="flex">
      <div class="ml-3">
        <a href="/post/{{$post->slug}}" class="text-gray-900 whitespace-no-wrap hover:text-blue-500">
          {{$post->title}}
        </a>
      </div>
    </div>
  </td>
  <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
    <p class="text-gray-900 whitespace-no-wrap">{{$post->author->username}}</p>
    {{-- <p class="text-gray-600 whitespace-no-wrap">{{$post->author->name}}</p> --}}
  </td>
  <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
      <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
      <span class="relative">Live</span>
    </span>
  </td>
  <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
    <p class="text-gray-900 whitespace-no-wrap">{{$post->created_at->format('F j, Y')}}</p>
  </td>

  <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
    <x-dropdown>
      <x-slot name='trigger'>
        <button type="button" class="inline-block text-blue-400 hover:text-blue-700">
          <svg class="inline-block h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z" />
          </svg>
        </button>
      </x-slot>
      <x-dropdown-item href="/admin/posts/{{$post->id}}/edit" :active="false">
        Edit
      </x-dropdown-item>
      <form class="hover:bg-blue-500 px-3 focus:bg-blue-500 hover:text-white" method="POST"
        action="/admin/posts/{{$post->id}}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
      </form>
    </x-dropdown>
  </td>
</tr>