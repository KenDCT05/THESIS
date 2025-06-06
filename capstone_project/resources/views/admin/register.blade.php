<!-- resources/views/admin/register.blade.php -->

<x-app-layout>
    <div class="max-w-xl mx-auto mt-10 p-6 bg-white shadow rounded-xl">
        <h2 class="text-xl font-bold mb-4">Register New User</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.register') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" class="mt-1 block w-full border rounded-md p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="mt-1 block w-full border rounded-md p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" class="mt-1 block w-full border rounded-md p-2" required>
                    <option value="">Select role</option>
                    <option value="teacher">Teacher</option>
                    <option value="student-parent">Student-Parent</option>
                </select>
            </div>

            <p class="text-sm text-gray-500 mb-4">Default password: <code>pass1234</code></p>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-black font-semibold py-2 px-4 rounded">  Register</button>
            </div>
        </form>
        
    </div>
</x-app-layout>
