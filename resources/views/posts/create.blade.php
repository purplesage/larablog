<x-layout>
  <div class="border border-gray-200 p-6 rounded-xl mt-10 w-1/3 mx-auto">
    <section class="col-span-8 col-start-5 space-y-6">
      <h1 class="text-center font-bold text-xl">Create Post</h1>
      <form action="/admin/posts" method="post" enctype="multipart/form-data">
        @csrf
        <x-form-input name='title' type='text' />
        <x-form-input name='thumbnail' type='file' />
        <x-form-textarea name='excerpt' />
        <x-form-textarea name='body' />

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
            Category
          </label>
          <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
            <option {{old('category_id')==$category->id ? 'selected' : ''}}
              value="{{$category->id}}">{{ucwords($category->name)}}</option>
            @endforeach
          </select>
          @error('body')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <x-form-button type='submit'>
          Publish
        </x-form-button>
      </form>
    </section>
  </div>
</x-layout>