<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Control Bar -->
            <div class="bg-gradient-to-r from-pink-500 to-rose-400 rounded-2xl shadow-xl p-6 mb-8 text-white">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                    <!-- Search Function -->
                    <div class="relative flex-1 max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-pink-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" 
                               placeholder="Search students by name or email..." 
                               class="w-full pl-10 pr-4 py-3 bg-white bg-opacity-20 border border-pink-300 border-opacity-30 rounded-lg text-white placeholder-pink-200 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent backdrop-blur-sm"
                               id="studentSearch"
                               onkeyup="searchStudents()">
                    </div>
                    
                    <!-- Action Buttons -->
                      <div class="flex space-x-3">
                    <a href="{{ route('teacher.materials.form') }}">
        <button class="px-6 py-3 bg-white text-pink-600 rounded-lg hover:bg-pink-50 transition duration-200 shadow-lg flex items-center font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Assign Activities
        </button>
    </a>
                        <button class="px-6 py-3 bg-pink-600 bg-opacity-30 text-white border border-white border-opacity-30 rounded-lg hover:bg-opacity-40 transition duration-200 shadow-lg flex items-center font-medium backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path>
                            </svg>
                            Grade Book
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-pink-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-pink-100">
                            <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Students</p>
                            <p class="text-2xl font-bold text-pink-700">{{ count($students) }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-rose-500">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-rose-100">
                            <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Active Classes</p>
                            <p class="text-2xl font-bold text-rose-700">{{ collect($students)->pluck('class')->unique()->count() ?: 1 }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-pink-400">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-pink-50">
                            <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">This Week</p>
                            <p class="text-2xl font-bold text-pink-600">{{ now()->format('M d') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-2xl border border-pink-100">
                <!-- Header -->
                <div class="bg-gradient-to-r from-pink-50 to-rose-50 px-8 py-6 border-b border-pink-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-pink-800 flex items-center">
                                <svg class="w-7 h-7 mr-3 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                                My Students
                            </h2>
                            <p class="text-pink-600 mt-1">{{ __('Manage your student roster') }}</p>
                        </div>
                        <div class="text-pink-700">
                            <span class="text-sm">Total: <span class="font-bold text-lg">{{ count($students) }}</span> students</span>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-hidden">
                    @if(count($students) > 0)
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gradient-to-r from-pink-100 to-rose-100">
                                    <th class="px-8 py-4 text-left text-sm font-semibold text-pink-800 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            Photo
                                        </div>
                                    </th>
                                    <th class="px-8 py-4 text-left text-sm font-semibold text-pink-800 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            Name
                                        </div>
                                    </th>
                                    <th class="px-8 py-4 text-left text-sm font-semibold text-pink-800 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            Email
                                        </div>
                                    </th>
                                    <th class="px-8 py-4 text-left text-sm font-semibold text-pink-800 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-pink-100" id="studentTableBody">
                                @foreach($students as $index => $student)
                                    <tr class="hover:bg-pink-25 transition duration-150 ease-in-out group student-row {{ $index % 2 == 0 ? 'bg-white' : 'bg-pink-25' }}" 
                                        data-name="{{ strtolower($student->name) }}" 
                                        data-email="{{ strtolower($student->email) }}">
                                        <td class="px-8 py-6">
                                            <div class="flex items-center justify-center">
                                                <div class="relative">
                                                    <img src="{{ $student->profile_photo 
                                                         ? asset('storage/' . $student->profile_photo) 
                                                         : asset('storage/images/default-profile.png') }}" 
                                                         alt="{{ $student->name }}"
                                                         class="w-14 h-14 rounded-full object-cover border-3 border-pink-200 shadow-lg group-hover:border-pink-300 transition duration-200">
                                                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-400 border-2 border-white rounded-full"></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6">
                                            <div class="flex flex-col">
                                                <div class="text-sm font-semibold text-gray-900">{{ $student->name }}</div>
                                                @if(isset($student->student_id))
                                                    <div class="text-xs text-pink-600 font-medium">ID: {{ $student->student_id }}</div>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-8 py-6">
                                            <div class="text-sm text-gray-700">{{ $student->email }}</div>
                                            @if(isset($student->class))
                                                <div class="text-xs text-gray-500 mt-1">Class: {{ $student->class }}</div>
                                            @endif
                                        </td>
                                        <td class="px-8 py-6">
                                            <div class="flex space-x-2">
                                                <button class="px-3 py-1 bg-pink-100 text-pink-700 rounded-full text-xs font-medium hover:bg-pink-200 transition duration-200 flex items-center">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    View
                                                </button>
                                        
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <!-- Beautiful Empty State -->
                        <div class="text-center py-16 px-8">
                            <div class="mx-auto w-32 h-32 bg-gradient-to-br from-pink-100 to-rose-100 rounded-full flex items-center justify-center mb-6">
                                <svg class="w-16 h-16 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ __('No students yet') }}</h3>
                            <p class="text-gray-600 mb-6 max-w-md mx-auto">{{ __('Your classroom is ready! Start building your student roster by adding your first student.') }}</p>
                            <div class="space-y-3">
                                <button class="px-6 py-3 bg-gradient-to-r from-pink-600 to-rose-600 text-white rounded-lg hover:from-pink-700 hover:to-rose-700 transition duration-200 shadow-lg flex items-center mx-auto">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    {{ __('Add Your First Student') }}
                                </button>
                                <p class="text-sm text-gray-500">{{ __('or import from a CSV file') }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function searchStudents() {
            const searchInput = document.getElementById('studentSearch');
            const filter = searchInput.value.toLowerCase();
            const tableBody = document.getElementById('studentTableBody');
            const rows = tableBody.getElementsByClassName('student-row');

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const name = row.getAttribute('data-name');
                const email = row.getAttribute('data-email');
                
                if (name.includes(filter) || email.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }

            // Update alternating row colors for visible rows
            const visibleRows = Array.from(rows).filter(row => row.style.display !== 'none');
            visibleRows.forEach((row, index) => {
                row.classList.remove('bg-white', 'bg-pink-25');
                row.classList.add(index % 2 === 0 ? 'bg-white' : 'bg-pink-25');
            });
        }
    </script>
</x-app-layout>