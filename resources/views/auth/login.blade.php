<x-layout>
  <section class="min-h-screen flex items-center justify-center px-4 bg-gray-900">
    <div class="max-w-md w-full bg-gray-800 p-8 rounded-xl shadow-2xl animate-fadeInUp">
      <h2 class="text-3xl font-extrabold text-white text-center">Login</h2>
      <p class="mt-2 text-center text-sm text-gray-400">
        Sign in to your account
      </p>

      <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
        @csrf
        <div>
          <x-form-label for="email">Email address</x-form-label>
          <x-form-input id="email" name="email" type="email" required autofocus placeholder="Email address" />
          <x-form-error name="email" />
        </div>

        <div class="mt-4">
          <x-form-label for="password">Password</x-form-label>
          <x-form-input id="password" name="password" type="password" required placeholder="Password" />
          <x-form-error name="password" />
        </div>

        <div class="mt-4 text-center text-sm">
          <a href="" class="text-indigo-400 hover:text-indigo-300">Forgot password?</a>
          <span class="mx-2 text-gray-500">|</span>
          <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300">Create account</a>
        </div>

        <div class="mt-6">
          <button type="submit"
            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-sm font-medium transition duration-300">
            Login
          </button>
        </div>
      </form>
    </div>
  </section>
</x-layout>
