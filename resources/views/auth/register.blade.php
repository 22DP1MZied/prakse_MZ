<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<form method="POST" action="/register" class="bg-white p-6 rounded shadow w-full max-w-sm">
    @csrf
    <h2 class="text-xl font-bold mb-4">Register</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-500 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <input type="text" name="name" placeholder="Name" class="w-full border p-2 rounded mb-4" required>
    <input type="email" name="email" placeholder="Email" class="w-full border p-2 rounded mb-4" required>
    <input type="password" name="password" placeholder="Password" class="w-full border p-2 rounded mb-4" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full border p-2 rounded mb-4" required>
    <button type="submit" class="w-full bg-green-600 text-white p-2 rounded">Register</button>

    <div class="mt-4">
        <a href="{{ route('login') }}" class="text-sm text-blue-600">Already have an account? Login</a>
    </div>
</form>
</body>
</html>
