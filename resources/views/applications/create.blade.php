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
    <form class="m-auto w-50 border p-5" action="/applications" method="POST">
        @csrf
        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="full_name" placeholder="Full Name" name="full_name">
        </div>
        @error('full_name')
            <p class="alert alert-danger">{{$message}}<p>
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="email" name="email">
        </div>
        @error('email')
            <p class="alert alert-danger">{{$message}}<p>
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
        </div>
        @error('phone')
            <p class="alert alert-danger">{{$message}}<p>
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Address" name="address">
        </div>
        @error('address')
            <p class="alert alert-danger">{{$message}}<p>
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label class="form-label">Marital Status</label>
            <div>
                <input type="radio" name="marital_status" value="single">
                <label>single</label>
            </div>
            <div>
                <input type="radio" name="marital_status" value="married">
                <label>married</label>
            </div>
        </div>
        @error('marital_status')
            <p class="alert alert-danger">{{$message}}<p>
        @enderror
        <!--------------------------------------------------------------------->
        <div class="mb-3">
            <label class="form-label">Malitary Status</label>
            <div>
                <input type="radio" name="military_status" value="completed">
                <label>completed</label>
            </div>
            <div>
                <input type="radio" name="military_status" value="exempted">
                <label>exmpted</label>
            </div>
            <div>
                <input type="radio" name="military_status" value="unknown">
                <label>unknown</label>
            </div>
        </div>
        @error('military_status')
            <p class="alert alert-danger">{{$message}}<p>
        @enderror
        <!--------------------------------------------------------------------->
            <h3>Education</h3>
            <div class="mb-3">
                <label for="organization" class="form-label">organisation</label>
                <input type="text" class="form-control" id="organization" placeholder="organization" name="organization">
            </div>
            @error('organization')
                <p class="alert alert-danger">{{$message}}<p>
            @enderror
            <div class="mb-3">
                <label for="grade" class="form-label">grade</label>
                <input type="text" class="form-control" id="grade" placeholder="grade" name="grade">
            </div>
            @error('grade')
                <p class="alert alert-danger">{{$message}}<p>
            @enderror
            <div class="mb-3">
                <label for="educationDescription" class="form-label">Education Description</label>
                <textarea class="form-control" id="educationDescription" rows="3" name="educationDescription"></textarea>
            </div>
            @error('educationDescription')
                <p class="alert alert-danger">{{$message}}<p>
            @enderror
            <div class="mb-3">
                <label for="education_start_date" class="form-label">start Date</label>
                <input type="date" class="form-control" id="education_start_date" placeholder="start Date" name="education_start_date">
            </div>
            @error('education_start_date')
                <p class="alert alert-danger">{{$message}}<p>
            @enderror
            <div class="mb-3">
                <label for="education_end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="education_end_date" placeholder="start Date" name="education_end_date">
            </div>
            @error('education_end_date')
                <p class="alert alert-danger">{{$message}}<p>
            @enderror
        </fieldset>
        <!--------------------------------------------------------------------->
            <h3>Experience</h3>
            <div class="mb-3">
                <label for="company_name" class="form-label">Company</label>
                <input type="text" class="form-control" id="company_name" placeholder="Company" name="company_name">
            </div>
            @error('company_name')
                <p class="alert alert-danger">{{$message}}<p>
            @enderror
            <div class="mb-3">
                <label for="job_title" class="form-label">Job Title</label>
                <input type="text" class="form-control" id="job_title" placeholder="Job Title" name="job_title">
            </div>
            @error('job_title')
                <p class="alert alert-danger">{{$message}}<p>
            @enderror
            <div class="mb-3">
                <label for="jobDescription" class="form-label">Description</label>
                <textarea class="form-control" id="jobDescription" rows="3" name="jobDescription"></textarea>
            </div>
            @error('jobDescription')
                <p class="alert alert-danger">{{$message}}<p>
            @enderror
            <div class="mb-3">
                <label for="job_start_date" class="form-label">start Date</label>
                <input type="date" class="form-control" id="job_start_date" placeholder="start Date" name="job_start_date">
            </div>
            @error('job_start_date')
                <p class="alert alert-danger">{{$message}}<p>
            @enderror
            <div class="mb-3">
                <label for="job_end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="job_end_date" placeholder="End Date" name="job_end_date">
            </div>
            @error('job_end_date')
                <p class="alert alert-danger">{{$message}}
            @enderror
        <!--------------------------------------------------------------------->
        <select id="skillsSelect" name="skills">
            <option value="">Select a skill</option>
            <!-- Example options; replace these with dynamic data from your database -->
            <option value="1">JavaScript</option>
            <option value="2">Python</option>
            <option value="3">Java</option>
            <option value="4">PHP</option>
        </select>

        <!-- Container for displaying selected tags -->
        <div id="tagsContainer" class="flex flex-wrap gap-2 mt-2">
            <!-- Tags will be dynamically added here -->
        </div>

        <!-- Hidden input to store selected skill IDs -->
        <div id="tagsContainer" class="flex flex-wrap gap-2 mt-2"></div>

        <input type="hidden" id="skillsInput" name="skills_ids">
        <!--------------------------------------------------------------------->
            <h3>Projects</h3>
            <div class="mb-3">
                <label for="project_title" class="form-label">Project Title</label>
                <input type="text" class="form-control" id="project_title" placeholder="Project Title" name="project_title">
            </div>
            @error('project_title')
                <p class="alert alert-danger">{{$message}}<p>
             @enderror
            <div class="mb-3">
                <label for="projectDescription" class="form-label">Description</label>
                <textarea class="form-control" id="projectDescription" rows="3" name="projectDescription"></textarea>
            </div>
            @error('projectDescription')
                <p class="alert alert-danger">{{$message}}<p>
            @enderror
            <div class="mb-3">
                <label for="project_url" class="form-label">Project Link</label>
                <input type="text" class="form-control" id="project_url" placeholder="project url" name="project_url">
            </div>
            @error('project_url')
                <p class="alert alert-danger">{{$message}}<p>
            @enderror
            <div class="mb-3">
                <label for="project_start_date" class="form-label">start Date</label>
                <input type="date" class="form-control" id="project_start_date" placeholder="start Date" name="project_start_date">
            </div>
            @error('project_start_date')
                <p class="alert alert-danger">{{$message}}<p>
            @enderror
            <div class="mb-3">
                <label for="project_end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" id="project_end_date" placeholder="End Date" name="project_end_date">
            </div>
            @error('project_end_date')
                <p class="alert alert-danger">{{$message}}<p>
            @enderror
           <!--------------------------------------------------------------------->
           <input type="hidden" value="review">
           {{-- <input type="hidden" name="job_id" value="{{$job->id}}"> <!-- Ensure this value is correctly set or dynamically generated --> --}}
           <input type="hidden" name="candidate_id" value="{{ Auth::id() }}">
           <!--------------------------------------------------------------------->
            <button type="submit" class="btn btn-success">Add</button>
        </form>
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const select = document.getElementById("skillsSelect");
        const tagsContainer = document.getElementById("tagsContainer");
        const skillsInput = document.getElementById("skillsInput");

        select.addEventListener("change", function () {
            const selectedValue = this.value;
            const selectedText = this.options[this.selectedIndex].text;

            // Check if the tag already exists
            if (selectedValue && !tagsContainer.querySelector(`.tag[data-id='${selectedValue}']`)) {
                // Create a tag container
                const tag = document.createElement("div");
                tag.className = "tag flex items-center bg-gray-200 rounded px-2 py-1";
                tag.dataset.id = selectedValue;

                // Create the tag text
                const tagText = document.createElement("span");
                tagText.textContent = selectedText;

                // Create the remove button with Heroicon
                const removeButton = document.createElement("button");
                removeButton.className = "remove-tag ml-2 text-red-500";
                removeButton.setAttribute("aria-label", `Remove ${selectedText}`);
                removeButton.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6.707 4.293a1 1 0 00-1.414 1.414L8.586 10l-3.293 3.293a1 1 0 101.414 1.414L10 11.414l3.293 3.293a1 1 0 001.414-1.414L11.414 10l3.293-3.293a1 1 0 00-1.414-1.414L10 8.586 6.707 4.293z" clip-rule="evenodd" />
                    </svg>
                `;

                // Add event listener to remove the tag
                removeButton.addEventListener("click", () => {
                    tagsContainer.removeChild(tag);
                    updateHiddenInput();
                });

                // Append text and button to the tag container
                tag.appendChild(tagText);
                tag.appendChild(removeButton);
                tagsContainer.appendChild(tag);

                // Reset the select input
                select.value = "";

                // Update hidden input with selected IDs
                updateHiddenInput();
            }
        });

        function updateHiddenInput() {
            const tags = tagsContainer.querySelectorAll(".tag");
            const ids = Array.from(tags)
                .map((tag) => tag.dataset.id) // Directly use dataset.id for efficiency
                .filter((id) => id); // Ensure no empty values

            skillsInput.value = ids.join(",");
            console.log(skillsInput.value); // Log to see the result
        }
    });
    </script>

</body>
</html>
