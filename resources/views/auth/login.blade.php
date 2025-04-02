<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - WealthTrack</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeInUp {
      animation: fadeInUp 0.8s ease-out forwards;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-purple-50">
  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-md w-full bg-white dark:bg-gray-800 p-8 rounded-xl shadow-2xl animate-fadeInUp">
      <h2 class="text-3xl font-extrabold text-gray-900 dark:text-gray-100 text-center">
        Login
      </h2>
      <p class="mt-2 text-center text-sm text-gray-600 dark:text-gray-300">
        Sign in to your account
      </p>
      <form method="POST" action="/login" class="mt-8 space-y-6">
        @csrf 
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <x-form-label for="email" >Email address</x-form-label>
            <x-form-input id="email" name="email" type="email" required autofocus 
              placeholder="Email address" />
            <x-form-error name="email" :value="old('email')" />
          </div>
          <div class="mt-4">
            <x-form-label for="password" >Password</x-form-label>
            <x-form-input id="password" name="password" type="password" required 
              placeholder="Password" />
            <x-form-error name="password" />
          </div>
        </div>

        <!-- Links Row -->
        <div class="mt-4 text-center text-sm">
          <a href="#" class="font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500">
            Forgot your password?
          </a>
          <span class="mx-2 text-gray-400">|</span>
          <a href="/register" class="font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500">
            Create an account
          </a>
        </div>

        <div class="mt-6">
          <button type="submit"
            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-sm font-medium transition duration-300">
            Login
          </button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
