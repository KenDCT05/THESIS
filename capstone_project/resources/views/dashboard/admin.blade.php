<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Header -->
        <div class="bg-gradient-to-r from-pink-50 to-rose-50 shadow-lg rounded-3xl p-8 mb-8 border border-pink-100">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-pink-900 mb-2">
                        Welcome back, {{ Auth::user()->name }} 🌸
                    </h1>
                    <p class="text-pink-700 text-lg">Manage your school community with ease</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-20 h-20 bg-pink-200 rounded-full flex items-center justify-center">
                        <span class="text-3xl">👋</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-gradient-to-br from-pink-50 to-pink-100 p-6 rounded-2xl shadow-lg border border-pink-200 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-pink-800 mb-1">Total Teachers</h2>
                        <p class="text-4xl font-bold text-pink-900">{{ $totalTeachers }}</p>
                    </div>
                    <div class="w-12 h-12 bg-pink-200 rounded-full flex items-center justify-center">
                        <span class="text-2xl">👩‍🏫</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-2xl shadow-lg border border-purple-200 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-purple-800 mb-1">Student-Parents</h2>
                        <p class="text-4xl font-bold text-purple-900">{{ $totalStudentParents }}</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-200 rounded-full flex items-center justify-center">
                        <span class="text-2xl">👨‍👩‍👧‍👦</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-2xl shadow-lg border border-green-200 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-green-800 mb-1">Total Users</h2>
                        <p class="text-4xl font-bold text-green-900">{{ $totalUsers }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-200 rounded-full flex items-center justify-center">
                        <span class="text-2xl">👥</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Recent Users Table -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-pink-500 to-rose-500 p-6">
                        <h2 class="text-xl font-bold text-white flex items-center">
                            <span class="mr-2">📊</span>
                            Recently Registered Users
                        </h2>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="text-left p-4 font-semibold text-gray-700">Name</th>
                                    <th class="text-left p-4 font-semibold text-gray-700">Email</th>
                                    <th class="text-left p-4 font-semibold text-gray-700">Role</th>
                                    <th class="text-left p-4 font-semibold text-gray-700">Registered</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($recentUsers as $user)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="p-4">
                                            <div class="flex items-center">
                                                <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('storage/images/default-profile.png') }}" 
                                                     alt="{{ $user->name }}" 
                                                     class="w-8 h-8 rounded-full object-cover mr-3 border-2 border-pink-200">
                                                <span class="font-medium text-gray-900">{{ $user->name }}</span>
                                            </div>
                                        </td>
                                        <td class="p-4 text-gray-600">{{ $user->email }}</td>
                                        <td class="p-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                                {{ $user->role === 'teacher' ? 'bg-pink-100 text-pink-800' : 'bg-purple-100 text-purple-800' }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td class="p-4 text-gray-600 text-sm">{{ $user->created_at->format('M j, Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-8 text-center text-gray-500">
                                            <div class="flex flex-col items-center">
                                                <span class="text-4xl mb-2">📭</span>
                                                <p>No recent users found</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Action Panel -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                        <span class="mr-2">⚡</span>
                        Quick Actions
                    </h2>
                    
                    <div class="space-y-4">
                        <a href="{{ route('admin.register.form') }}" 
                           class="group block w-full bg-gradient-to-r from-pink-500 to-rose-500 text-white px-6 py-4 rounded-xl text-center font-semibold shadow-lg hover:from-pink-600 hover:to-rose-600 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl">
                            <div class="flex items-center justify-center">
                                <span class="text-xl mr-2 group-hover:scale-110 transition-transform">➕</span>
                                Register New User
                            </div>
                        </a>

                        <a href="{{ route('admin.assign.form') }}" 
                           class="group block w-full bg-gradient-to-r from-pink-400 to-rose-400 text-white px-6 py-4 rounded-xl text-center font-semibold shadow-lg hover:from-pink-500 hover:to-rose-500 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl">
                            <div class="flex items-center justify-center">
                                <span class="text-xl mr-2 group-hover:scale-110 transition-transform">🎓</span>
                                Assign Students to Teachers
                            </div>
                        </a>

                        <div class="pt-4 border-t border-gray-100">
                            <a href="{{ route('profile.edit') }}" 
                               class="group block w-full text-pink-700 px-6 py-3 rounded-xl text-center font-medium hover:bg-pink-50 transition-all duration-300 border-2 border-pink-200 hover:border-pink-300">
                                <div class="flex items-center justify-center">
                                    <span class="text-lg mr-2 group-hover:scale-110 transition-transform">⚙️</span>
                                    Edit Profile
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="mt-8 pt-6 border-t border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-700 mb-3">Quick Overview</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Active Today</span>
                                <span class="text-sm font-semibold text-pink-600">{{ $totalUsers }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">This Month</span>
                                <span class="text-sm font-semibold text-green-600">+{{ $recentUsers->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>