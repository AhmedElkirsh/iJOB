<!-- resources/views/resumes/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Details</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Resume Details</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Resume Information</h2>
            @dd($resume)
            <p><strong>File Path:</strong> {{ $resume->file_path }}</p>
            <p><strong>Name:</strong> {{ $resume->name }}</p>
            <p><strong>Email:</strong> {{ $resume->email }}</p>
            <p><strong>Phone:</strong> {{ $resume->phone }}</p>
            
            <h3 class="text-lg font-semibold mt-4 mb-2">Education:</h3>
            <p>{{ $resume->education }}</p>

            <h3 class="text-lg font-semibold mt-4 mb-2">Experience:</h3>
            <p>{{ $resume->experience }}</p>

            <h3 class="text-lg font-semibold mt-4 mb-2">Skills:</h3>
            <p>{{ $resume->skills }}</p>

            <h3 class="text-lg font-semibold mt-4 mb-2">Extracted Text:</h3>
            <pre class="bg-gray-200 p-4 rounded-lg">{{ $resume->extracted_text }}</pre>
        </div>
    </div>
</body>
</html>
