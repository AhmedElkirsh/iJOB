<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ request()->path() }}
            </h2>
          
            @if (request()->path() == 'jobs')
                <button class="py-2 px-4 rounded-lg text-sm font-semibold border-blue-500 border-2 text-blue-500 hover:text-white hover:bg-blue-500">
                    Post Job
                </button>  
            @endif
            @if (request()->path() == 'trying')
                <form class="max-w-lg min-w-[400px] basis-2/5">
                    <div class="flex">
                        <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
                        <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">All categories 
                            <svg 
                            class="w-2.5 h-2.5 ms-2.5" 
                            aria-hidden="true" 
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 10 6"
                            ><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>
                            </li>
                            </ul>
                        </div>
                        <div class="relative w-full">
                            <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates..." required />
                            <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>               
            @endif
        </div>
    </x-slot>    
    <button id="sidebar-toggle" data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>    
    <div class="flex justify-center gap-24 sm:gap-12">
        <aside id="default-sidebar" class="z-40 w-64  transition-transform -translate-x-full sm:translate-x-0 border-r border-slate-300" aria-label="Sidebar">
            <form action="#" method="POST" class="w-100 p-5 flex flex-col gap-2">
                @csrf
                <button class="bg-blue-600 text-center text-white text-md font-medium py-2 w-100 rounded-lg">
                    Apply Filters
                </button>
                {{-- check values --}}
                 <div class="flex flex-col gap-2">
                    <h3 class="font-semibold text-lg mb-1">Experience</h3>
                    <div class="flex items-center gap-2">
                        <input  class="border-none bg-gray-200 rounded-md" id="entry-level" type="checkbox" name="experience" value="entry-level">
                        <label class="text-sm" for="entry-level">Entry level</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input class="border-none bg-gray-200 rounded-md" id="intermediate-level" type="checkbox" name="experience" value="intermediate-level">
                        <label class="text-sm" for="intermediate-level">Intermediate level</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input class="border-none bg-gray-200 rounded-md" id="Expert-level" type="checkbox" name="experience" value="Expert-level">
                        <label class="text-sm" for="Expert-level">Expert level</label>
                    </div>
                </div>
                {{-- change job type --}}
                <div class="flex flex-col gap-2">
                    <h3 class="font-semibold text-lg mb-1">Job Type</h3>
                    <div class="flex items-center gap-2">
                        <input  class="border-none bg-gray-200 rounded-md" id="remote" type="checkbox" name="job_type" value="remote">
                        <label class="text-sm" for="remote">Remote</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input class="border-none bg-gray-200 rounded-md" id="on-site" type="checkbox" name="job_type" value="on-site">
                        <label class="text-sm" for="on-site">On-Site</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input class="border-none bg-gray-200 rounded-md" id="hybrid" type="checkbox" name="job_type" value="hybrid">
                        <label class="text-sm" for="hybrid">Hybrid</label>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="countries" class="font-semibold text-lg mb-1">Location</label>
                    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{-- loop over ? --}}
                    <option selected>Choose a state</option>
                    <option value="US">Menoufia</option>
                    <option value="CA">Mansoura</option>
                    <option value="FR">Cairo</option>
                    <option value="DE">Alexandria</option>
                    </select>
                </div>
                {{-- fix salary slider issue --}}
                <div class="salary flex flex-col gap-4 mb-6">
                    <h3 class="font-semibold text-lg mb-2">Salary Range</h3>
        
                    <div id="salarySlider" class="relative w-100 h-1 bg-gray-300 rounded-md mb-4">
                      <div id="track" class="absolute top-0 h-1 bg-blue-600 rounded-md"></div>
                      <div id="min-salary-handler" class="absolute top-1/2 transform -translate-y-1/2 bg-blue-600 w-4 h-4 rounded-full shadow-md cursor-pointer"></div>
                      <div id="max-salary-handler" class="absolute top-1/2 transform -translate-y-1/2 bg-blue-600 w-4 h-4 rounded-full shadow-md cursor-pointer"></div>
                    </div>
        
                    <div class="flex gap-1 items-center text-sm w-full">
                      <div class="relative flex-1">
                        <input id="minSalaryLabel"class="w-full px-2 py-2 border border-black rounded-md outline-none text-sm" />
                        <span class="absolute right-2 top-1/2 transform -translate-y-1/2 text-xs font-semibold">EGP</span>
                      </div>
                      <span>-</span>
                      <div class="relative flex-1">
                        <input id="maxSalaryLabel" class="w-full px-2 py-2 border border-black rounded-md outline-none text-sm" />
                        <span class="absolute right-2 top-1/2 transform -translate-y-1/2 text-xs font-semibold">EGP</span>
                      </div>
                    </div>
                </div>
            </form>
        </aside>
           <main>
        <div class="flex flex-col gap-6 py-6">
            <x-job-card
        title="UI/UX Developer"
        type="Full time"
        location="Abc Company, Shebin Elkom"
        description="Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut voluptate ipsam cupiditate obcaecati qui eaque incidunt minus omnis nobis consequuntur..."
        :skills="['HTML', 'CSS', 'Javascript']"
        date="28/04/2024"
        applyLink="#"
        image="https://picsum.photos/160/160"
        />
        <x-job-card
        title="UI/UX Developer"
        type="Full time"
        location="Abc Company, Shebin Elkom"
        description="Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut voluptate ipsam cupiditate obcaecati qui eaque incidunt minus omnis nobis consequuntur..."
        :skills="['HTML', 'CSS', 'Javascript']"
        date="28/04/2024"
        applyLink="#"
        image="https://picsum.photos/160/160"
        />
        <x-job-card
        title="UI/UX Developer"
        type="Full time"
        location="Abc Company, Shebin Elkom"
        description="Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut voluptate ipsam cupiditate obcaecati qui eaque incidunt minus omnis nobis consequuntur..."
        :skills="['HTML', 'CSS', 'Javascript']"
        date="28/04/2024"
        applyLink="#"
        image="https://picsum.photos/160/160"
        />
        </div>
           </main>
    </div>
   <!-- Script to handle sidebar toggle -->

</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('default-sidebar');
        
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    });
</script>

 