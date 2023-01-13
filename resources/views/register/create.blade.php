<x-layout>
  <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 rounded-xl p-6">
      <h1 class="text-center font-bold text-xl">Register</h1>
      <form method="POST" action="/register" class="mt-10">
        @csrf

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
            Name
          </label>
          <input value="{{ old('name') }}" class="border border-gray-400 p-2 w-full" type="text" name="name" id="name"
            required />
          @error('name')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="userName">
            Username
          </label>
          <input value="{{ old('userName') }}" class="border border-gray-400 p-2 w-full" type="text" name="userName"
            id="userName" required />
          @error('userName')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
            Email
          </label>
          <input value="{{ old('email') }}" class="border border-gray-400 p-2 w-full" type="email" name="email"
            id="email" required />
          @error('email')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
            Password
          </label>
          <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="Password" required />
          @error('password')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
            Submit
          </button>
        </div>
      </form>
    </main>
  </section>
</x-layout>