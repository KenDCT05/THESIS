<x-app-layout>
    <h2 class="text-xl font-bold">Change Your Password</h2>
    <form method="POST" action="/change-password" class="space-y-4">
        @csrf
        <input type="password" name="password" placeholder="New Password" class="border p-2 w-full">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="border p-2 w-full">
        <button class="bg-green-500 text-black px-4 py-2">Change Password</button>
    </form>
    <p class="text-sm text-red-600 mt-2">Password must be at least 8 characters and include one special character.</p>
</x-app-layout>
