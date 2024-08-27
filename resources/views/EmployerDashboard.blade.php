<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employer Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/priceSlider.js'])
</head>
<body class="relative mt-36 px-20 bg-gray-50">



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
                            View
                        </x-action-button>
                    
                        <x-action-button action="#" class="btn-edit">
                            Edit
                        </x-action-button>
                    
                        <x-action-button action="#" method="DELETE" class="btn-delete">
                            Delete
                        </x-action-button>
                    </x-employer-actions>             
                </x-table-cell>
            </x-table-row>
        </tbody>
    </x-table>
    

</body>
</html>