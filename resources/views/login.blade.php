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
  </style>
</head>
<body class="bg-gradient-to-br from-blue-100 to-purple-100">
  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-2xl">
      <h2 class="text-3xl font-extrabold text-gray-900 text-center">Login</h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        Sign in to your account
      </p>
      <form method="POST" action="#" class="mt-8 space-y-6">
        <!-- @csrf -->
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email" class="sr-only">Email address</label>
            <input id="email" name="email" type="email" required autofocus 
              class="appearance-none rounded-t-md relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
              placeholder="Email address">
          </div>
          <div class="mt-4">
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password" required 
              class="appearance-none rounded-b-md relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
              placeholder="Password">
          </div>
        </div>

        <!-- Checkbox Row -->
        <div class="mt-4">
          <div class="flex items-center">
            <input id="remember_me" name="remember" type="checkbox" 
              class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
            <label for="remember_me" class="ml-2 block text-sm text-gray-700">
              Remember me
            </label>
          </div>
        </div>

        <!-- Links Row -->
        <div class="mt-2 text-center text-sm">
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
            Forgot your password?
          </a>
          <span class="mx-2 text-gray-400">|</span>
          <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">
            Create an account
          </a>
        </div>

        <div class="mt-6">
          <button type="submit"
            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-sm font-medium">
            Login
          </button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
