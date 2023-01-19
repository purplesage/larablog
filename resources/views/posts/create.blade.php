<x-layout>
  <div class="border border-gray-200 p-6 rounded-xl mt-10 w-1/3 mx-auto">
    <section class="col-span-8 col-start-5 space-y-6">
      <h1 class="text-center font-bold text-xl">Create Post</h1>
      <form action="/admin/posts" method="post">
        @csrf

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
            title
          </label>
          <input value="{{ old('title') }}" class="border border-gray-400 p-2 w-full" type="text" name="title"
            id="title" required />
          @error('title')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
            Excerpt
          </label>
          <textarea class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt"
            required>{{ old('excerpt') }}</textarea>
          @error('excerpt')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
            Body
          </label>
          <textarea class="border border-gray-400 p-2 w-full" name="body" id="body"
            required>{{ old('body') }}</textarea>
          @error('body')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

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

        <div class="flex justify-start mt-6 pt-6 border-t border-gray-200">
          <button
            class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 "
            type="submit">Publish</button>
        </div>
      </form>
    </section>
  </div>
</x-layout>