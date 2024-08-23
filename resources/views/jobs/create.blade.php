<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">New Job</h1>
    <form class="m-auto w-50 border p-5" action="/jobs" method="POST">
        @csrf
        <div class="mb-3">
            <label for="postionTitle" class="form-label">Postion Title</label>
            <input type="text" class="form-control" id="postionTitle" placeholder="Postion Title" name="position_title">
        </div>
        @error('position_title')
            <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label class="form-label">Employement Type</label>
            <div>
                <input type="radio" name="employment_type" value="fullTime">
                <label>full time</label>
            </div>
            <div>
                <input type="radio" name="employment_type" value="partTime">
                <label>part-time</label>
            </div>
            <div>
                <input type="radio" name="employment_type" value="contract">
                <label>contract</label>
            </div>
            <div>
                <input type="radio" name="employment_type" value="freelance">
                <label>freelance</label>
            </div>
            <div>
                <input type="radio" name="employment_type" value="internship">
                <label>internship</label>
            </div>
        </div>
        @error('employment_type')
            <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label class="form-label">Experience Level</label>
            <div>
                <input type="radio" name="experience_level" value="junior">
                <label>Junior</label>
            </div>
            <div>
                <input type="radio" name="experience_level" value="senior">
                <label>Senior</label>
            </div>
            <div>
                <input type="radio" name="experience_level" value="expert">
                <label>Expert</label>
            </div>
        </div>
        @error('experience_level')
            <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label for="industry" class="form-label">Industry</label>
            <input type="text" class="form-control" id="industry" placeholder="Industry" name="industry">
        </div>
        @error('industry')
             <p class="alert alert-danger">{{$message}}</p>
         @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label for="description" class="form-label">Job Description</label>
            <input type="text" class="form-control" id="description" placeholder="description" name="job_description">
        </div>
        @error('job_description')
            <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label for="responsibilities" class="form-label">Responsibilities</label>
            <input type="text" class="form-control" id="responsibilities" placeholder="responsibilities" name="responsibility">
        </div>
        @error('responsibility')
            <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label for="qualifications" class="form-label">qualifications</label>
            <input type="text" class="form-control" id="qualifications" placeholder="qualifications" name="qualification">
        </div>
        @error('qualification')
            <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <!--------------------------------------------------------------------->
        {{-- <div class="mb-3">
            <label for="requiredSkills" class="form-label">Required Skills</label>
            <input type="text" class="form-control" id="requiredSkills" placeholder="qualifications" name="qualification">
        </div>
        @error('qualification')
            <p class="alert alert-danger">{{$message}}</p>
        @enderror --}}
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" placeholder="location" name="location">
        </div>
        @error('location')
             <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label for="jobStatus" class="form-label">job Status</label>
            <div>
                <input type="radio" name="job_status" value="notAproved">
                <label>not Aproved</label>
            </div>
            <div>
                <input type="radio" name="job_status" value="open">
                <label>open</label>
            </div>
            <div>
                <input type="radio" name="job_status" value="closed">
                <label>closed</label>
            </div>
        </div>
        @error('job_status')
             <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" class="form-control" id="salary" placeholder="salary" name="salary">
        </div>
        <button type="submit" class="btn btn-success">Add</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
