<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resumes</title>
</head>
<body>
    <!-- resources/views/resumes/index.blade.php -->
    @foreach ($resumes as $resume)
    <div class="bg-white p-6 rounded-lg shadow-md mb-4">
        <h2 class="text-xl font-semibold">{{ $resume->name }}</h2>
        <p>{{ $resume->email }}</p>
        <a href="{{ route('resumes.show', $resume->id) }}" class="text-blue-500 hover:underline">View Details</a>
    </div>
    @endforeach
</body>
</html>

