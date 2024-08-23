<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <table class="table">
        <thead>
          <tr>
            <th class="bg-dark text-white">position title</th>
            <th class="bg-dark text-white">employment type</th>
            <th class="bg-dark text-white">experience level</th>
            <th class="bg-dark text-white">industry</th>
            <th class="bg-dark text-white">job description</th>
            <th class="bg-dark text-white">location</th>
            <th class="bg-dark text-white">job status</th>
            <th class="bg-dark text-white">salary</th>
            <th class="bg-dark text-white">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>{{$job->position_title}}</th>
            <td>{{$job->employment_type}}</td>
            <td>{{$job->experience_level}}</td>
            <td>{{$job->industry}}</td>
            <td>{{$job->job_description}}</td>
            <td>{{$job->location}}</td>
            <td>{{$job->job_status}}</td>
            <td>{{$job->salary}}</td>
            <td>
                <a href="/jobs"><button class="btn btn-info">Back</button></a>
            </td>
          </tr>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
