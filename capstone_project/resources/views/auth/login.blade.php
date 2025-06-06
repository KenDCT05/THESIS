<x-guest-layout>
    <div class="max-w-md mx-auto mt-16 bg-white shadow-xl rounded-xl p-8 border border-pink-200">
        <h2 class="text-2xl font-bold text-center text-pink-700 mb-6">Welcome Back</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                    class="w-full mt-1 border-pink-300 focus:ring-pink-500 focus:border-pink-500" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full mt-1 border-pink-300 focus:ring-pink-500 focus:border-pink-500" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-pink-600 shadow-sm focus:ring-pink-500"
                    name="remember">
                <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="text-sm text-pink-600 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="bg-pink-600 hover:bg-pink-700 focus:ring-pink-500">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
