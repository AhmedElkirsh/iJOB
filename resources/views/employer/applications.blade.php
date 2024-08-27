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
    <form method="GET" action="{{ route('employer.showApplications', ['user_id' => $employer->user_id, 'status' => $status]) }}">
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


<!-- Inside the 'applications' view -->
<section>
    <div class="d-flex justify-content-center bg-gray" style="padding: 25px;">
        <a href="{{ route('employer.showApplicationsByStatus', ['user_id' => $employer->user_id, 'status' => 'active','job_id' => $selectedJobId]) }}" class="mx-5 text-decoration-none text-dark">Active</a>
        <a href="{{ route('employer.showApplicationsByStatus', ['user_id' => $employer->user_id, 'status' => 'awaiting_review','job_id' => $selectedJobId]) }}" class="mx-5 text-decoration-none text-dark">Awaiting Review</a>
        <a href="{{ route('employer.showApplicationsByStatus', ['user_id' => $employer->user_id, 'status' => 'reiviewed','job_id' => $selectedJobId ]) }}" class="mx-5 text-decoration-none text-dark">Reviewed</a>
        <a href="{{ route('employer.showApplicationsByStatus', ['user_id' => $employer->user_id, 'status' => 'contacted','job_id' => $selectedJobId]) }}" class="mx-5 text-decoration-none text-dark">Reject</a>
    </div>
</section>


  
   <!-- Applications table -->
@if($selectedJobId && !empty($applications))
    @php
        $selectedJob = $jobs->find($selectedJobId);
    @endphp

    @if($selectedJob)
        <h2>Applications for {{ $selectedJob->position_title }} ({{ ucfirst($status) }} Applications)</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Candidate Name</th>
                <th>Application Status</th>
                <th>CV</th>
                <th>Actions</th>
                <th>Chat</th>
            </tr>
            </thead>
            <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>{{ $application->user->name }}</td>
                    <td>{{ $application->status }}</td>
                    <td><a href="{{ route('resumes.show', basename($application->id)) }}" target="_blank">View Resume</a></td>
                    <td class="d-flex gap-2">
                        <form method="POST" action="{{ route('employer.acceptApplication', $application->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-info">Accept</button>
                        </form>
                        <form method="POST" action="{{ route('employer.rejectApplication', $application->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                        <a href="{{ route('application.view', $application->id) }}" class="btn btn-warning">View</a>
                    </td>
                    <td><a href="#" class="btn btn-info">Chat</a></td>
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
