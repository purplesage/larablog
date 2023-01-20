@auth
<form method="POST" action="/posts/{{$post->slug}}/comment" class="border border-gray-200 p-6 rounded-xl">
  @csrf
  <header class="flex items-center">
    <img class="rounded-full" src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="avatar" width="40" height="40">
    <h2 class="ml-4">Want to participate?</h2>
  </header>

  <div class="mt-6">
    <textarea class="w-full text-sm focus:outline-none focus:ring" name="body" rows="5"
      placeholder="Quick, think of something to say" required></textarea>
    @error('body')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
  </div>

  <x-form-button type='submit'>
    Post
  </x-form-button>

</form>
@else
<p class="font-semibold">
  <a class="hover:underline" href="/register">Register</a> or <a class="hover:underline" href="/login">Log in
  </a>to leave a comment
</p>
@endauth