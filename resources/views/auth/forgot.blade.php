<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<form method="POST" action="/forgot-password" class="bg-white p-6 rounded shadow w-full max-w-sm">
    @csrf
    <h2 class="text-xl font-bold mb-4">Forgot Password</h2>

    @if (session('status'))
        <div class="mb-4 text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <input type="email" name="email" placeholder="Enter your email" class="w-full border p-2 rounded mb-4" required>
    <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Send Reset Link</button>
</form>
</body>
</html>
