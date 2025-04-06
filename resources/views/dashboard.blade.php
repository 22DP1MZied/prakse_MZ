<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="bg-white p-6 rounded shadow w-full max-w-lg">
    @if(session('status'))
        <div class="text-green-600 mb-4">
            {{ session('status') }}
        </div>
    @endif

    <h1 class="text-2xl font-bold mb-4">Welcome to your Dashboard</h1>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit" class="w-full bg-red-600 text-white p-2 rounded">Logout</button>
    </form>
</div>
</body>
</html>
