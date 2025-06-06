<x-app-layout>
    <div class="max-w-3xl mx-auto mt-12">
        <div class="bg-pink-100 shadow-md rounded-2xl p-6">
            <h1 class="text-2xl font-bold text-pink-900 mb-4">
                Welcome, {{ Auth::user()->name }} 🌸
            </h1>

            <p class="text-pink-800 mb-6">You are logged in as <strong>Admin</strong>.</p>

            <div class="space-y-3">
                <a href="{{ route('admin.register.form') }}" class="block bg-pink-600 text-white px-4 py-2 rounded-lg text-center hover:bg-pink-700 transition">
                    ➕ Register New User
                </a>

                <a href="{{ route('admin.assign.form') }}" class="block bg-pink-500 text-white px-4 py-2 rounded-lg text-center hover:bg-pink-600 transition">
                    🎓 Assign Students to Teachers
                </a>

                <a href="{{ route('profile.edit') }}" class="block text-sm text-pink-700 hover:underline text-center">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
