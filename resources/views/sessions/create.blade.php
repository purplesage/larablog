<x-layout>
  <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 rounded-xl p-6">
      <h1 class="text-center font-bold text-xl">Register</h1>

      <form method="POST" action="/login" class="mt-10">
        @csrf
        <x-form-input name='email' type='email' />
        <x-form-input name='password' type='password' />
        <x-form-button type='submit'>
          Log In
        </x-form-button>
      </form>

    </main>
  </section>
</x-layout>