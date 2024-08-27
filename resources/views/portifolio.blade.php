
    <div class="container">
        <h2 class="text-2xl font-bold mb-4">My Portfolio</h2>
        
        <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Project Title</label>
                <input type="text" name="title" id="title" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"></textarea>
            </div>
            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700">Upload File</label>
                <input type="file" name="file" id="file" required class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
            </div>
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Upload</button>
        </form>

        <h3 class="text-xl font-bold mt-8">Uploaded Projects</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
            @foreach($portfolios as $portfolio)
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="font-bold">{{ $portfolio->title }}</h4>
                    <p>{{ $portfolio->description }}</p>
                    @if(Str::startsWith($portfolio->file_type, 'image'))
                        <img src="{{ asset('storage/' . $portfolio->file_path) }}" alt="{{ $portfolio->title }}" class="mt-2">
                    @elseif(Str::startsWith($portfolio->file_type, 'video'))
                        <video controls class="mt-2 w-full">
                            <source src="{{ asset('storage/' . $portfolio->file_path) }}" type="{{ $portfolio->file_type }}">
                        </video>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

