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
      <form method="POST" action="/register" class="mt-8 space-y-6 ">
        @csrf
        <div class="rounded-md shadow-sm -space-y-px py-15">
          <!-- Name Field -->
          <div>
            <x-form-label for="first_name"></x-form-label>
            <x-form-input id="first_name" name="first_name" type="text" required autofocus  placeholder="Jon" />
          </div>
          <x-form-error name="first_name" />
          <div>
            <x-form-label for="first_name" ></x-form-label>
            <x-form-input id="name" name="last_name" type="text" required autofocus  placeholder="Doe" />
          </div>
           <x-form-error name="last_name" />

          <!-- Email Field -->
          <div class="mt-4">
            <x-form-label for="email"></x-form-label>
            <x-form-input id="email" name="email" type="email"  placeholder="Email address"  />
          </div>
           <x-form-error name="email" />

          <!-- Password Field -->
          <div class="mt-4">
            <x-form-label for="password" ></x-form-label>
            <x-form-input id="password" name="password" type="password" required  placeholder="Password" />
          </div>
          <x-form-error name="password" />

          <!-- Confirm Password Field -->
          <div class="mt-4">
            <x-form-label for="password_confirmation" class="sr-only"></x-form-label>
            <x-form-input id="password_confirmation" 
              name="password_confirmation" type="password" 
              required placeholder="Confirm Password" />
          </div>
        </div>
        <x-form-error name="password_confirmation" />
        
        <div>
          <button type="submit"
            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-sm font-medium">
            Register
          </button>
        </div>
      </form>
      <p class="mt-6 text-center text-sm text-gray-600">
        Already have an account? 
        <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">
          Sign in
        </a>
      </p>
    </div>
  </div>
</body>
</html>
