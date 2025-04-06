<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<form method="POST" action="/reset-password" class="bg-white p-6 rounded shadow w-full max-w-sm">
    @csrf
    <h2 class="text-xl font-bold mb-4">Reset Password</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-500 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <input type="hidden" name="token" value="{{ $token }}">

    <input type="email" name="email" placeholder="Email" class="w-full border p-2 rounded mb-4" required>
    <input type="password" name="password" placeholder="New Password" class="w-full border p-2 rounded mb-4" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full border p-2 rounded mb-4" required>

    <button class="w-full bg-green-600 text-white p-2 rounded">Reset Password</button>
</form>
</body>
</html>
