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
        </div>
    </x-slot>    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-table class="">
                    <x-table-head>
                        <x-table-row>
                            <x-table-header-cell>Position Title</x-table-header-cell>
                            <x-table-header-cell>Employment Type</x-table-header-cell>
                            <x-table-header-cell>Experience Level</x-table-header-cell>
                            <x-table-header-cell>Industry</x-table-header-cell>
                            <x-table-header-cell>Job Status</x-table-header-cell>
                            <x-table-header-cell>Salary</x-table-header-cell>
                            <x-table-header-cell>Actions</x-table-header-cell>
                        </x-table-row>
                    </x-table-head>
                    <tbody>
                        {{-- loop here --}}
                        <x-table-row>
                            <x-table-header-cell scope="row">Apple MacBook Pro 17"</x-table-header-cell>
                            <x-table-cell>Silver</x-table-cell>
                            <x-table-cell>Laptop</x-table-cell>
                            <x-table-cell>$2999</x-table-cell>
                            <x-table-cell>$2999</x-table-cell>
                            <x-table-cell>$2999</x-table-cell>
                            <x-table-cell class="text-right">
                                <x-employer-actions>
                                    <x-action-button action="#" class="btn-view">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                          </svg>
                                          
                                    </x-action-button>
                                
                                    <x-action-button action="#" class="btn-edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                            <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                        </svg>

                                          
                                    </x-action-button>
                                
                                    <x-action-button action="#" method="DELETE" class="btn-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                        </svg>                                     
                                    </x-action-button>
                                </x-employer-actions>             
                            </x-table-cell>
                        </x-table-row>
                    </tbody>
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
