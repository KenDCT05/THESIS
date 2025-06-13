


{{-- <x-app-layout> 
    <a href=""></a>
    <div class="max-w-4xl mx-auto mt-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-pink-700">My Uploaded Materials</h2>
            <a href="{{ route('teacher.materials.form') }}" class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 rounded shadow text-sm">+ Add Material</a>
        </div>

        @if (session('success'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @forelse ($materials as $material)
            <div class="bg-white p-4 rounded shadow mb-4">
                <h3 class="text-lg font-bold">{{ $material->title }}</h3>
                <p class="text-sm text-gray-600 mb-2">Uploaded at {{ $material->created_at->format('M d, Y') }}</p>
                @if ($material->instructions)
                    <p class="mb-2">{{ $material->instructions }}</p>
                @endif
                <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank" class="text-blue-600 underline">View/Download File</a>

                <div class="mt-4 flex gap-2">
                    <a href="{{ route('teacher.materials.edit', $material->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm rounded">Edit</a>

                    <form action="{{ route('teacher.materials.destroy', $material->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p>No materials uploaded yet.</p>
        @endforelse
    </div>
</x-app-layout> --}}
<x-app-layout> 
    <a href=""></a>
    <div class="max-w-5xl mx-auto mt-8 px-4">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-pink-600 to-pink-700 rounded-lg shadow-lg p-6 mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-white mb-2">My Uploaded Materials</h2>
                    <p class="text-pink-100 text-sm">Manage your educational resources and materials</p>
                </div>
                <a href="{{ route('teacher.materials.form') }}" 
                   class="bg-white text-pink-700 hover:bg-pink-50 px-6 py-3 rounded-lg shadow-md transition-all duration-200 font-semibold flex items-center gap-2 hover:shadow-lg transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Material
                </a>
            </div>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg shadow-sm">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-green-700 font-semibold">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- Materials Grid -->
        <div class="grid gap-6">
            @forelse ($materials as $material)
                <div class="bg-gray-300 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 border border-gray-100 overflow-hidden">
                    <!-- Material Header -->
                    <div class="bg-gradient-to-r from-pink-50 to-pink-100 px-6 py-4 border-b border-pink-200">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $material->title }}</h3>
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 9l6-6m0 0l6 6m-6-6v12"></path>
                                    </svg>
                                    Uploaded {{ $material->created_at->format('M d, Y') }}
                                </div>
                            </div>
                            <div class="bg-pink-600 text-white px-3 py-1 rounded-full text-xs font-medium">
                                Material
                            </div>
                        </div>
                    </div>

                    <!-- Material Content -->
                    <div class="p-6">
                        @if ($material->instructions)
                            <div class="mb-4 p-4 bg-gray-50 rounded-lg border-l-4 border-pink-600">
                                <p class="text-gray-700 leading-relaxed">{{ $material->instructions }}</p>
                            </div>
                        @endif

                        <!-- File Download Section -->
                        <div class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <div>
                                        <p class="font-medium text-gray-800">Material File</p>
                                        <p class="text-sm text-gray-500">Click to view or download</p>
                                    </div>
                                </div>
                                <a href="{{ asset('storage/' . $material->file_path) }}" 
                                   target="_blank" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    View File
                                </a>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('teacher.materials.edit', $material->id) }}" 
                               class="flex-1 px-4 py-2 bg-pink-500 hover:bg-pink-600 text-white text-sm rounded-lg font-medium transition-all duration-200 text-center flex items-center justify-center gap-2 hover:shadow-md">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit
                            </a>

                            <form action="{{ route('teacher.materials.destroy', $material->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this material? This action cannot be undone.')"
                                  class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg font-medium transition-all duration-200 flex items-center justify-center gap-2 hover:shadow-md">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="bg-pink-50 rounded-full w-24 h-24 mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-12 h-12 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">No materials uploaded yet</h3>
                    <p class="text-gray-500 mb-6 max-w-sm mx-auto">Start building your material library by uploading your first educational resource.</p>
                    <a href="{{ route('teacher.materials.form') }}" 
                       class="inline-flex items-center gap-2 bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-200 hover:shadow-lg transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Upload Your First Material
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>