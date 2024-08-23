<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Job Application</h1>
    <form class="m-auto w-50 border p-5" action="" method="POST">
        @csrf
        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="full_name" placeholder="Full Name" name="full_name">
        </div>
        @error('full_name')
            {{$message}}
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="email" name="email">
        </div>
        @error('email')
            {{$message}}
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
        </div>
        @error('phone')
            {{$message}}
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Address" name="address">
        </div>
        @error('address')
            {{$message}}
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label class="form-label">Marital Status</label>
            <div>
                <input type="radio" name="marital_status">
                <label>single</label>
            </div>
            <div>
                <input type="radio" name="marital_status">
                <label>married</label>
            </div>
        </div>
        @error('marital_status')
            {{$message}}
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label class="form-label">Malitary Status</label>
            <div>
                <input type="radio" name="military_status">
                <label>completed</label>
            </div>
            <div>
                <input type="radio" name="military_status">
                <label>exmpted</label>
            </div>
            <div>
                <input type="radio" name="military_status">
                <label>unknown</label>
            </div>
        </div>
        @error('military_status')
            {{$message}}
        @enderror
        <!--------------------------------------------------------------------->
        <fieldset>
            <legend>Education</legend>
            <div class="mb-3">
                <label for="organization" class="form-label">organisation</label>
                <input type="text" class="form-control" id="organization" placeholder="organization" name="organization">
            </div>
            @error('organization')
                {{$message}}
            @enderror
            <div class="mb-3">
                <label for="grade" class="form-label">grade</label>
                <input type="text" class="form-control" id="grade" placeholder="grade" name="grade">
            </div>
            @error('grade')
                {{$message}}
            @enderror
            <div class="mb-3">
                <label for="description" class="form-label">Education Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            @error('description')
                {{$message}}
            @enderror
            <div class="mb-3">
                <label for="start_date" class="form-label">start Date</label>
                <input type="text" class="form-control" id="start_date" placeholder="start Date" name="start_date">
            </div>
            @error('start_date')
                {{$message}}
            @enderror
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="text" class="form-control" id="end_date" placeholder="End Date" name="end_date">
            </div>
            @error('end_date')
                {{$message}}
            @enderror
        </fieldset>
        <!--------------------------------------------------------------------->
        <fieldset>
            <legend>Experience</legend>
            <div class="mb-3">
                <label for="company_name" class="form-label">Company</label>
                <input type="text" class="form-control" id="company_name" placeholder="Company" name="company_name">
            </div>
            @error('company_name')
                {{$message}}
            @enderror
            <div class="mb-3">
                <label for="job_title" class="form-label">Job Title</label>
                <input type="text" class="form-control" id="job_title" placeholder="Job Title" name="job_title">
            </div>
            @error('job_title')
                {{$message}}
            @enderror
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            @error('description')
                {{$message}}
            @enderror
            <div class="mb-3">
                <label for="start_date" class="form-label">start Date</label>
                <input type="text" class="form-control" id="start_date" placeholder="start Date" name="start_date">
            </div>
            @error('start_date')
                {{$message}}
            @enderror
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="text" class="form-control" id="end_date" placeholder="End Date" name="end_date">
            </div>
            @error('end_date')
                {{$message}}
            @enderror
        </fieldset>
        <!--------------------------------------------------------------------->
        <fieldset>
            <legend>Projects</legend>
            <div class="mb-3">
                <label for="project_title" class="form-label">Project Title</label>
                <input type="text" class="form-control" id="project_title" placeholder="Project Title" name="project_title">
            </div>
            @error('project_title')
                {{$message}}
             @enderror
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            @error('description')
                {{$message}}
            @enderror
            <div class="mb-3">
                <label for="project_url" class="form-label">Project Link</label>
                <input type="text" class="form-control" id="project_url" placeholder="End Date" name="project_url">
            </div>
            @error('project_url')
                {{$message}}
            @enderror
            <div class="mb-3">
                <label for="start_date" class="form-label">start Date</label>
                <input type="text" class="form-control" id="start_date" placeholder="start Date" name="start_date">
            </div>
            @error('start_date')
                {{$message}}
            @enderror
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="text" class="form-control" id="end_date" placeholder="End Date" name="end_date">
            </div>
            @error('end_date')
                {{$message}}
            @enderror
        </fieldset>
        <button type="submit" class="btn btn-success">Add</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
