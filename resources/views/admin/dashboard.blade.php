<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center">
    <div class="relative bg-white p-8 rounded-lg shadow-lg w-full h-full max-w-full max-h-full">
        <h1 class="text-2xl font-semibold mb-6 text-start">Dashboard</h1>
        
        <!-- Your dashboard content here -->

        <!-- Logout Form -->
        <form action="{{ route('admin.logout') }}" method="POST" class="absolute top-4 right-4">
            @csrf
            <button type="submit" class="text-sm bg-red-600 text-white py-1 px-3 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Logout
            </button>
        </form>
    </div>
</body>

</html>
