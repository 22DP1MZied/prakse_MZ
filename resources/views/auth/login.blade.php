<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<form method="POST" action="/login" class="bg-white p-6 rounded shadow w-full max-w-sm">
    @csrf
    <h2 class="text-xl font-bold mb-4">Login</h2>

    @if(session('status'))
        <div class="mb-4 text-green-600">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 text-red-500 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <input type="email" name="email" placeholder="Email" class="w-full border p-2 rounded mb-4" required>
    <input type="password" name="password" placeholder="Password" class="w-full border p-2 rounded mb-4" required>
    <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Login</button>

    <div class="mt-4">
        <a href="{{ route('password.request') }}" class="text-sm text-blue-600">Forgot Password?</a>
    </div>

    <div class="mt-4">
        <a href="{{ route('register') }}" class="text-sm text-blue-600">Don't have an account? Sign Up</a>
    </div>
</form>
</body>
</html>
