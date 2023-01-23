<x-layout>
  <h1 class="text-center font-bold text-xl">Edit Post</h1>
  <div class="border border-gray-200 p-6 rounded-xl mt-6 w-1/3 mx-auto shadow-md"">
    <section class=" col-span-8 col-start-5 space-y-6">
    <form action="/admin/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
      @csrf
      @method("PATCH")
      <x-form-input name='title' type='text' :value="old('title', $post->title)" />
      <div>
        <x-form-input name='thumbnail' type='file' :value="old('thumbnail', $post->thumbnail)" />
        <img src="{{asset('storage/' . $post->thumbnail)}}" alt="Blog Post illustration" class="rounded-xl mb-5">
      </div>

      <x-form-textarea name='excerpt' :value="old('excerpt', $post->excerpt)" />
      <x-form-textarea name='body' :value="old('body', $post->body)" />

      <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
          Category
        </label>
        <select class="p-1" name="category_id" id="category_id" required>
          @foreach ($categories as $category)
          <option {{old('category_id', $post->category_id)==$category->id ? 'selected' : ''}}
            value="{{$category->id}}">{{ucwords($category->name)}}</option>
          @endforeach
        </select>
        @error('body')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <x-form-button type='submit'>
        Update
      </x-form-button>
    </form>
    </section>
  </div>
</x-layout>