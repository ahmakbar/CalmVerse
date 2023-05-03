<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <style>
            x-primary-button .back-button:hover {
                background-color: rgb(247, 125, 103)
            }
        </style>
        <div class="flex items-center mt-4" style="justify-content: space-between">
            <x-primary-button class="back-button" style="background-color: rgb(255, 44, 7); transition: .2s all ease-in-out;">
                <a href="{{ url('/login')}}">Go Back</a>
            </x-primary-button>
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
