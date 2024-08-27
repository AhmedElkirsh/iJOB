<!-- resources/views/admin/employers/index.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1>Employers</h1>
    <a href="{{ route('admin.employers.create') }}" class="btn btn-primary">Create New Employer</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th>Location</th>
                <th>Website</th>
                <th>Bio</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employers as $employer)
                <tr>
                    <td>{{ $employer->user_id }}</td>
                    <td>{{ $employer->employer_type }}</td>
                    <td>{{ $employer->location }}</td>
                    <td>{{ $employer->website_url }}</td>
                    <td>{{ $employer->bio }}</td>
                    <td>
                        <a href="{{ route('admin.employers.show', $employer) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('admin.employers.edit', $employer) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.employers.destroy', $employer) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
