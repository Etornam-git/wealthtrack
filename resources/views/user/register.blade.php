<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - WealthTrack</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100">
  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-lg">
      <h2 class="text-3xl font-extrabold text-gray-900 text-center">Create an Account</h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        Sign up to get started with WealthTrack
      </p>
      <form method="POST" action="/user" class="mt-8 space-y-6 ">
        @csrf
        <div class="rounded-md shadow-sm -space-y-px py-15">
          <!-- Name Field -->
          <div>
            <label for="first_name" class="sr-only">FirstName</label>
            <input id="first_name" name="first_name" type="text" required autofocus 
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
              placeholder="Jon">
          </div>
          <p>
            @error('first_name')
              {{ $message }}
            @enderror
          </p>
          <div>
            <label for="first_name" class="sr-only">LastName</label>
            <input id="name" name="last_name" type="text" required autofocus 
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
              placeholder="Doe">
          </div>
          <p>
            @error('last_name')
              {{ $message }}
            @enderror
          </p>
          <!-- Email Field -->
          <div class="mt-4">
            <label for="email" class="sr-only">Email address</label>
            <input id="email" name="email" type="email"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
              placeholder="Email address">
          </div>
          <p>
            @error('email')
            {{ $message }}
          @enderror
          </p>
          <!-- Password Field -->
          <div class="mt-4">
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password" required 
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
              placeholder="Password">
          </div>
          <p>
            @error('password')
            {{ $message }}
          @enderror
          </p>
          <!-- Confirm Password Field -->
          {{-- <div class="mt-4">
            <label for="password_confirmation" class="sr-only">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required 
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
              placeholder="Confirm Password">
          </div> --}}
        </div>

        <div>
          <button type="submit"
            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-sm font-medium">
            Register
          </button>
        </div>
      </form>
      <p class="mt-6 text-center text-sm text-gray-600">
        Already have an account? 
        <a href="/user/login" class="font-medium text-indigo-600 hover:text-indigo-500">
          Sign in
        </a>
      </p>
    </div>
  </div>
</body>
</html>
