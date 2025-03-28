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
      <h2 class="text-3xl font-extrabold text-gray-900 text-center">Edit Info</h2>
     
      <form method="POST" action="/users/{{ $user->id }}" class="mt-8 space-y-6 ">
        @csrf
        @method('PATCH')
        <div class="rounded-md shadow-sm -space-y-px py-15">
          <!-- Name Field -->
          <div>
            <label for="first_name" class="sr-only">FirstName</label>
            <input id="first_name" name="first_name" type="text" required autofocus value="{{ $user->first_name }}"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
              placeholder="Jon">
          </div>
          <p class="mt-2 text-red-600 text-sm">
            @error('first_name')
              {{ $message }}
            @enderror
          </p>
          <div>
            <label for="last_name" class="sr-only">LastName</label>
            <input id="name" name="last_name" type="text" required autofocus value="{{ $user->last_name }}"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
              placeholder="Doe">
          </div>
            <p class="mt-2 text-red-600 text-sm">
            @error('last_name')
              {{ $message }}
            @enderror
            </p>
          <!-- Email Field -->
          <div class="mt-4">
            <label for="email" class="sr-only">Email address</label>
            <input id="email" name="email" type="email" value="{{ $user->email }}"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
              placeholder="Email address">
          </div>
            <p class="mt-2 text-red-600 text-sm">
            @error('email')
              {{ $message }}
            @enderror
            </p>
          <!-- Password Field -->
          <div class="mt-4">
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password" required 
            value={{ $user->password }}
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
              placeholder="Password">
          </div>
          <p class="mt-2 text-red-600 text-sm">
            @error('password')
            {{ $message }}
          @enderror
          </p>
    
        </div>

        <div>
          <button type="submit"
            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-sm font-medium">
            Update
          </button>
        </div>
      </form>
     
    </div>
  </div>
</body>
</html>
