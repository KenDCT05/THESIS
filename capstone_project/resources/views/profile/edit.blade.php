<x-app-layout>
   

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Main Profile Section -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    <!-- Profile Picture Section -->
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-8 lg:p-12 flex flex-col items-center justify-center border-r border-gray-200">
                        <div class="text-center w-full">
                            <!-- Section Header -->
                            <div class="flex items-center justify-center text-red-500 mb-8">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <h3 class="text-xl font-semibold">Profile Picture</h3>
                            </div>
                            
                            <!-- Profile Photo Display -->
                            <div class="relative mb-8">
                                <div class="w-40 h-40 mx-auto relative">
                                    @if(auth()->user()->profile_photo)
                                        <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                                             class="w-full h-full rounded-full object-cover shadow-lg border-4 border-white"
                                             alt="Profile Photo">
                                    @else
                                        <div class="w-full h-full bg-gray-300 rounded-full flex items-center justify-center shadow-lg border-4 border-white">
                                            <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                    
                                    <!-- Upload indicator -->
                                    {{-- <div class="absolute -bottom-2 -right-2 bg-red-500 rounded-full p-3 shadow-lg">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </div> --}}
                                </div>
                            </div>
                            
                            <!-- Current User Info -->
                            <div class="text-center mb-6">
                                <h4 class="text-lg font-semibold text-gray-800 mb-1">{{ auth()->user()->name }}</h4>
                                <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Basic Information Section -->
                    <div class="p-8 lg:p-12">
                        <div class="mb-8">
                            <div class="flex items-center text-red-500 mb-3">
                                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <h3 class="text-xl font-semibold">Basic Information</h3>
                            </div>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                Update your account's profile information, email address, and profile photo.
                            </p>
                        </div>

                        <!-- Profile Update Form -->
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            @method('PATCH')

                            <!-- Name Field -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                                <input type="text" 
                                       id="name"
                                       name="name" 
                                       value="{{ old('name', auth()->user()->name) }}"
                                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 bg-gray-50 focus:bg-white" 
                                       placeholder="Enter name"
                                       required>
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" 
                                       id="email"
                                       name="email" 
                                       value="{{ old('email', auth()->user()->email) }}"
                                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 bg-gray-50 focus:bg-white" 
                                       placeholder="Enter email"
                                       required>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone Field (Optional) -->
                            {{-- <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                <input type="tel" 
                                       id="phone"
                                       name="phone" 
                                       value="{{ old('phone', auth()->user()->phone ?? '') }}"
                                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all duration-200 bg-gray-50 focus:bg-white" 
                                       placeholder="Enter phone">
                                @error('phone')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            <!-- Profile Photo Upload -->
                            <div>
                                <label for="profile_photo" class="block text-sm font-medium text-gray-700 mb-2">Profile Photo</label>
                                <div class="relative">
                                    <input type="file" 
                                           id="profile_photo"
                                           name="profile_photo" 
                                           accept="image/*"
                                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-red-50 file:text-red-700 hover:file:bg-red-100 file:transition-colors file:duration-200 border border-gray-200 rounded-lg cursor-pointer focus:ring-2 focus:ring-red-500 focus:border-red-500">
                                    <p class="mt-2 text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                </div>
                                @error('profile_photo')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Success Message -->
                            @if(session('status') === 'profile-updated')
                                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span class="text-sm font-medium">Profile updated successfully!</span>
                                    </div>
                                </div>
                            @endif

                            <!-- Submit Button -->
                            <div class="flex items-center justify-end pt-6 border-t border-gray-100">
                                <button type="submit" 
                                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                    Update Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="max-w-2xl">
                    <div class="flex items-center text-amber-600 mb-6">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold">Update Password</h3>
                    </div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Section -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <div class="max-w-2xl">
                    <div class="flex items-center text-red-600 mb-6">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        <h3 class="text-xl font-semibold">Delete Account</h3>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>