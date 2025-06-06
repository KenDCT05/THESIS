<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Assign Students to Teachers</h2>

        @if(session('success'))
            <div class="text-green-600 mb-4">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.assign.store') }}" class="mb-6">
            @csrf
            <div class="flex space-x-4 mb-4">
                <select name="student_id" required class="p-2 border rounded w-1/2">
                    <option value="">Select Student</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>

                <select name="teacher_id" required class="p-2 border rounded w-1/2">
                    <option value="">Select Teacher</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700">Assign</button>
        </form>

        <h3 class="text-lg font-semibold mb-2">Current Assignments</h3>
        <table class="w-full text-sm border border-collapse">
            <thead>
                <tr class="bg-pink-100 text-left">
                    <th class="p-2 border">Student</th>
                    <th class="p-2 border">Assigned Teacher</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td class="p-2 border">{{ $student->name }}</td>
                        <td class="p-2 border">{{ $student->teacher->name ?? 'Unassigned' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
