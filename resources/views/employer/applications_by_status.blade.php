<!DOCTYPE html>
<html>
<head>
    <title>Applications by Status</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    @if($selectedJob)
        <h1>Applications for {{ $selectedJob->position_title }} - Status: {{ ucfirst($status) }}</h1>

        <!-- Applications table -->
        @if(!empty($applications))
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Candidate Name</th>
                        <th>Application Status</th>
                        <th>CV</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                        <tr>
                            <td>{{ $application->user->name }}</td>
                            <td>{{ $application->status }}</td>
                            <td>{{ $application->resume_file_path }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('application.view', $application->id) }}" class="btn btn-warning">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No applications found for this status.</p>
        @endif

    @else
        <p>Selected job not found or invalid status.</p>
    @endif

    <a href="{{ route('employer.showApplications', $employer->user_id) }}" class="btn btn-primary mt-3">Back to Job Applications</a>
</div>
<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
