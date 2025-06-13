{{-- <x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Edit Material</h2>

        <form action="{{ route('teacher.materials.update', $material->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="block mb-2">Title:</label>
            <input type="text" name="title" value="{{ $material->title }}" required class="w-full border p-2 rounded mb-4">

            <label class="block mb-2">Instructions:</label>
            <textarea name="instructions" rows="4" class="w-full border p-2 rounded mb-4">{{ $material->instructions }}</textarea>

            <label class="block mb-2">Replace File (optional):</label>
            <input type="file" name="file" accept=".pdf,.doc,.docx,.txt">

            <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded mt-4">Update</button>
        </form>
    </div>
</x-app-layout> --}}
<x-app-layout>
    <div class="max-w-3xl mx-auto mt-8 px-4">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-pink-600 to-pink-700 rounded-lg shadow-lg p-6 mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-white mb-2">Edit Material</h2>
                    <p class="text-pink-100 text-sm">Update your educational resource information</p>
                </div>
                <a href="{{ route('teacher.materials.index') }}"
                   class="bg-white text-pink-700 hover:bg-pink-50 px-4 py-2 rounded-lg shadow-md transition-all duration-200 font-medium flex items-center gap-2 hover:shadow-lg transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Materials
                </a>
            </div>
        </div>

        <!-- Current Material Info -->
        <div class="bg-blue-50 rounded-lg p-4 mb-6 border border-blue-200">
            <div class="flex items-center mb-2">
                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="font-semibold text-blue-800">Current Material Information</h3>
            </div>
            <div class="text-sm text-blue-700 space-y-1">
                <p><span class="font-medium">Uploaded:</span> {{ $material->created_at->format('M d, Y \a\t g:i A') }}</p>
                <p><span class="font-medium">Last Modified:</span> {{ $material->updated_at->format('M d, Y \a\t g:i A') }}</p>
                @if($material->file_path)
                    <p><span class="font-medium">Current File:</span> 
                        <a href="{{ asset('storage/' . $material->file_path) }}" 
                           target="_blank" 
                           class="text-blue-600 hover:text-blue-800 underline">
                            View Current File
                        </a>
                    </p>
                @endif
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-pink-50 to-pink-100 px-6 py-4 border-b border-pink-200">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-pink-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-800">Update Material Information</h3>
                </div>
            </div>

            <form action="{{ route('teacher.materials.update', $material->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <!-- Title Field -->
                <div class="space-y-2">
                    <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 mr-2 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        Title
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <input type="text" 
                           name="title" 
                           value="{{ old('title', $material->title) }}" 
                           required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors duration-200 bg-gray-50 focus:bg-white"
                           placeholder="Enter a descriptive title for your material">
                    <p class="text-xs text-gray-500">Choose a clear, descriptive title that students will easily understand</p>
                </div>

                <!-- Instructions Field -->
                <div class="space-y-2">
                    <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 mr-2 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Instructions
                        <span class="text-gray-400 text-xs ml-2">(optional)</span>
                    </label>
                    <textarea name="instructions" 
                              rows="4" 
                              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-pink-500 focus:border-pink-500 transition-colors duration-200 bg-gray-50 focus:bg-white resize-none"
                              placeholder="Provide any special instructions, context, or guidance for students using this material...">{{ old('instructions', $material->instructions) }}</textarea>
                    <p class="text-xs text-gray-500">Add helpful context or specific instructions for how students should use this material</p>
                </div>

                <!-- File Upload Field -->
                <div class="space-y-2">
                    <label class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-4 h-4 mr-2 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        Replace File
                        <span class="text-gray-400 text-xs ml-2">(optional - leave empty to keep current file)</span>
                    </label>
                    
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-pink-400 transition-colors duration-200 bg-gray-50">
                        <div class="space-y-3">
                            <svg class="w-12 h-12 text-gray-400 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <div>
                                <input type="file" 
                                       name="file" 
                                       accept=".pdf,.doc,.docx,.txt" 
                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-pink-600 file:text-white hover:file:bg-pink-700 file:cursor-pointer cursor-pointer transition-all duration-200">
                            </div>
                            <div class="text-sm text-gray-500">
                                <p class="font-medium">Supported formats:</p>
                                <div class="flex justify-center gap-4 mt-2">
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-medium">PDF</span>
                                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-medium">DOC</span>
                                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-medium">DOCX</span>
                                    <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded text-xs font-medium">TXT</span>
                                </div>
                                <p class="text-xs mt-2 text-gray-400">Leave empty to keep the current file unchanged</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="pt-6 border-t border-gray-100">
                    <div class="flex gap-4">
                        <button type="submit" 
                                class="flex-1 bg-gradient-to-r from-pink-600 to-pink-700 hover:from-pink-700 hover:to-pink-800 text-white px-6 py-3 rounded-lg shadow-md font-semibold transition-all duration-200 flex items-center justify-center gap-2 hover:shadow-lg transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            Update Material
                        </button>
                        
                        <a href="{{ route('teacher.materials.index') }}" 
                           class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Help Section -->
        <div class="mt-8 bg-yellow-50 rounded-lg p-6 border border-yellow-200">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-yellow-600 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
                <div>
                    <h4 class="font-semibold text-yellow-800 mb-2">Important Notes:</h4>
                    <ul class="text-sm text-yellow-700 space-y-1">
                        <li>• Only upload a new file if you want to replace the current one completely</li>
                        <li>• If you don't select a file, your current file will remain unchanged</li>
                        <li>• Students who have already accessed this material will see the updated version</li>
                        <li>• Make sure any file you upload is the final version to avoid confusion</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>