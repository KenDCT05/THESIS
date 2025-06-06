<x-app-layout>
    <div class="max-w-4xl mx-auto mt-10 space-y-6">

        <div class="bg-white p-6 shadow rounded-xl">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">👩‍🏫 Assigned Teacher</h2>

            @if($teacher)
                <p><strong>Name:</strong> {{ $teacher->name }}</p>
                <p><strong>Email:</strong> {{ $teacher->email }}</p>
            @else
                <p class="text-red-500">You have not been assigned a teacher yet.</p>
            @endif
        </div>

        <div class="bg-white p-6 shadow rounded-xl">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">👫 Classmates</h2>

            @if($classmates->count())
                <ul class="list-disc pl-6">
                    @foreach($classmates as $mate)
                        <li>{{ $mate->name }} ({{ $mate->email }})</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">You have no classmates yet.</p>
            @endif
        </div>

    </div>
</x-app-layout>
