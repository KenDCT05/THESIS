{{-- <x-app-layout>
    <h1 class="text-2xl">Welcome Teacher!</h1>
</x-app-layout> --}}

{{-- <x-app-layout>
    <div class="max-w-xl mx-auto mt-12">
        <div class="bg-rose-100 shadow-md rounded-2xl p-6">
            <h1 class="text-2xl font-bold text-rose-900 mb-4">
                Welcome, {{ Auth::user()->name }} 📚
            </h1>

            <p class="text-rose-800">You are logged in as <strong>Teacher</strong>.</p>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 overflow-hidden shadow-xl sm:rounded-lg">
                
                <h2 class="text-xl font-bold mb-4 text-pink-700">My Students</h2>

                <table class="w-full border text-sm">
                    <thead class="bg-pink-100">
                        <tr>
                            <th class="p-2 border">Name</th>
                            <th class="p-2 border">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td class="p-2 border">{{ $student->name }}</td>
                                <td class="p-2 border">{{ $student->email }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="p-2 text-center text-gray-500">No students assigned.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
