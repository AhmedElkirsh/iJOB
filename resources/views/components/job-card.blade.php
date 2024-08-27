<div class="flex flex-col sm:flex-row bg-white p-3 gap-4 rounded-lg w-full sm:w-[700px]">
    <div class="overflow-hidden h-40 w-full sm:w-40">
        <img class="rounded-lg object-cover h-full w-full" src="{{ $image }}" alt="image">
    </div>
    <div class="flex flex-col gap-2 w-full">
        <div>
            <h2 class="font-semibold mb-1 text-lg sm:text-base">{{ $title }} <span>({{ $type }})</span></h2>
            <div class="text-sm text-gray-400">{{ $location }}</div>
        </div>
        <p class="text-sm max-w-96 text-justify">{{ $description }}</p>
        <div class="mt-auto flex flex-wrap gap-2">
            @foreach ($skills as $skill)
                <span class="text-xs bg-white-50 border border-slate-200 rounded-full py-1 px-2 text-center">
                    {{ $skill }}
                </span>
            @endforeach
        </div>
    </div>
    <div class="sm:ml-auto flex flex-row sm:flex-col justify-between items-center w-full sm:w-auto mt-4 sm:mt-0">
        <div class="text-sm self-end text-gray-400">{{ $date }}</div>
        <a href="{{ $applyLink }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg text-sm font-medium mt-2 sm:mt-0">
            Apply
        </a>
    </div>
</div>
