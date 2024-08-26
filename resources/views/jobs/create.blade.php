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
                <input type="radio" name="employment_type" value="full-time">
                <label>full time</label>
            </div>
            <div>
                <input type="radio" name="employment_type" value="part-time">
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
        <select id="skillsSelect" name="required_skills">
            <option value="">Select required skill</option>
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
{{-- <label for="responsibilitiesInput" class="form-label">Responsibilities</label>
<input type="text" class="form-control" id="responsibilitiesInput" placeholder="responsibilities" name="responsibility">

 <!-- Container for displaying selected tags -->
 <div id="tagsContainer" class="flex flex-wrap gap-2 mt-2">
     <!-- Tags will be dynamically added here -->
 </div>

 <!-- Hidden input to store selected skill IDs -->
 <div id="tagsContainer" class="flex flex-wrap gap-2 mt-2"></div>

 <input type="hidden" id="responsibilitiesHidden" name="responsibilities">
</form> --}}
