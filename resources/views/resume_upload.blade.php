<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>resume upload</title>
</head>
<body>
    <form action="/upload-resume" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="resume" accept=".pdf">
        <button type="submit">Upload Resume</button>
    </form>
    
</body>
</html>