<x-layout>
  <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 border border-gray-200 rounded-xl p-6 shadow-md">
      <h1 class="text-center font-bold text-xl">Log In</h1>
      <form method="POST" action="/login" class="mt-10">
        @csrf
        <x-form-input name='email' type='email' required />
        <x-form-input name='password' type='password' required />
        <x-form-button type='submit'>
          Submit
        </x-form-button>
      </form>

    </main>
  </section>
</x-layout>