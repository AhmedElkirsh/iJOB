<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Jobs</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Select a Job to View Applications</h1>
        <form action="{{ route('employer.jobs.applications') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="job">Jobs:</label>
                <select name="job_id" id="job" class="form-control">
                    @foreach($jobs as $job)
                        <option value="{{ $job->id }}">{{ $job->position_title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">View Applications</button>
        </form>
    </div>
</body>
</html>
