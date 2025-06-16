<x-guest-layout>
    <h2 class="text-2xl font-bold text-center text-red-900 mb-6">Hello There!👋</h2>
    <div class="max-w-md mx-auto mt-16 bg-white shadow-xl rounded-xl p-8 border border-red-900">
        

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5 text-black">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    class="w-full mt-1 border-red-800 focus:ring-red-900 focus:border-red-900" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full mt-1 border-red-800 focus:ring-red-900 focus:border-red-900" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-red-900 shadow-sm focus:ring-red-900"
                    name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="text-sm text-red-900 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="bg-red-900 hover:bg-red-800 focus:ring-red-900">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>