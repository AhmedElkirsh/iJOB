@extends('layouts.app')

@section('content')
    <h1>Filtered Jobs</h1>
    @if($jobs->isEmpty())
        <p>No jobs found matching your criteria.</p>
    @else
        <ul>
            @foreach($jobs as $job)
                <li>{{ $job->title }} - {{ $job->location }} - {{ $job->salary }}</li>
            @endforeach
        </ul>
    @endif
@endsection
