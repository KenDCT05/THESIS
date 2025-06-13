<x-app-layout>     
    <div class="max-w-6xl mx-auto mt-8 px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center mb-4">
                <div class="bg-pink-100 rounded-full p-3 mr-4">
                    <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-pink-700 mb-2">Learning Materials</h1>
                    <p class="text-gray-600">Access all your course materials and resources</p>
                </div>
            </div>
            
            <!-- Stats Bar -->
            <div class="bg-gradient-to-r from-pink-50 to-rose-50 rounded-lg p-4 border border-pink-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-pink-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <span class="text-pink-700 font-medium">{{ count($materials) }} Materials Available</span>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-pink-100 text-pink-700 text-xs font-medium px-3 py-1 rounded-full">
                            📚 Study Resources
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Materials Grid -->
        <div class="space-y-6">
            @forelse($materials as $material)
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 hover:border-pink-200">
                    <!-- Material Header -->
                    <div class="bg-gradient-to-r from-pink-50 to-rose-50 px-6 py-4 border-b border-pink-100">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $material->title }}</h3>
                                <div class="flex items-center text-sm text-gray-600">
                                    <div class="flex items-center mr-6">
                                        <div class="bg-pink-100 rounded-full w-8 h-8 flex items-center justify-center mr-2">
                                            <svg class="w-4 h-4 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <span>Uploaded by: <span class="font-medium text-pink-700">{{ $material->teacher->name ?? 'N/A' }}</span></span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="text-gray-500">{{ $material->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="bg-pink-100 rounded-full p-2">
                                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Material Content -->
                    <div class="p-6">
                        @if($material->instructions)
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">Instructions</h4>
                                <div class="bg-gray-50 rounded-lg p-4 border-l-4 border-pink-400">
                                    <p class="text-gray-700 leading-relaxed">{{ $material->instructions }}</p>
                                </div>
                            </div>
                        @endif

                        @if($material->file_path)
                            <div class="flex items-center justify-between bg-pink-50 rounded-lg p-4 border border-pink-100">
                                <div class="flex items-center">
                                    <div class="bg-pink-100 rounded-lg p-3 mr-4">
                                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Learning Material File</p>
                                        <p class="text-sm text-gray-600">Click to download and view content</p>
                                    </div>
                                </div>
                                <a href="{{ asset('storage/' . $material->file_path) }}"
                                   target="_blank"
                                   class="inline-flex items-center px-6 py-3 bg-pink-600 hover:bg-pink-700 text-white font-medium rounded-lg shadow-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 hover:shadow-md transform hover:scale-105">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                                    </svg>
                                    Download File
                                </a>
                            </div>
                        @else
                            <div class="bg-gray-50 rounded-lg p-6 text-center">
                                <div class="bg-gray-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium">No file attached</p>
                                <p class="text-gray-400 text-sm mt-1">This material contains instructions only</p>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-12">
                    <div class="text-center">
                        <div class="bg-pink-50 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">No Learning Materials Yet</h3>
                        <p class="text-gray-500 mb-6 max-w-md mx-auto">
                            Your teacher hasn't uploaded any materials yet. Check back later or contact your teacher for more information.
                        </p>
                        <div class="bg-pink-50 rounded-lg p-4 max-w-md mx-auto">
                            <div class="flex items-center justify-center">
                                <svg class="w-5 h-5 text-pink-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-pink-700 text-sm font-medium">Materials will appear here when uploaded</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Back Navigation -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <a href="{{ route('student.dashboard') }}"
               class="inline-flex items-center px-4 py-2 text-pink-600 hover:text-pink-700 font-medium transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Dashboard
            </a>
        </div>
    </div>
</x-app-layout>