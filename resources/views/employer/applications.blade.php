<!DOCTYPE html>
<html>
<head>
    <title>Employer Jobs and Applications</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Manage Your Jobs and Applications</h1>

    <!-- Job selection dropdown -->
    <form method="GET" action="{{ route('employer.showApplications', $employer->user_id) }}">
        <div class="mb-3">
            <label for="jobSelect" class="form-label">Select Job</label>
            <select class="form-select" id="jobSelect" name="job_id" onchange="this.form.submit()">
                <option value="">-- Select a Job --</option>
                @foreach($jobs as $job)
                    <option value="{{ $job->id }}" {{ $selectedJobId == $job->id ? 'selected' : '' }}>
                        {{ $job->position_title }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <!-- Applications table -->
    @if($selectedJobId && !empty($applications))
        @php
            $selectedJob = $jobs->find($selectedJobId);
        @endphp

        @if($selectedJob)
            <h2>Applications for {{ $selectedJob->position_title }}</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Candidate Name</th>
                    <th>Application Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    <tr>
                        <td>{{ $application->candidate->user->name }}</td>
                        <td>{{ $application->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Selected job not found.</p>
        @endif
    @elseif($selectedJobId)
        <p>No applications found for the selected job.</p>
    @else
        <p>Please select a job to view applications.</p>
    @endif
</div>
<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
