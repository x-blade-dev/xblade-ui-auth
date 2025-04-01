<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">
                {{ __('Name') }}
            </label>
            <input 
                id="name" 
                name="name" 
                type="text" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500" 
                value="{{ old('name', $user->name) }}" 
                required 
                autofocus 
                disabled
                autocomplete="name"
            >
            @if ($errors->get('name'))
                <p class="mt-2 text-sm text-red-600">
                    {{ $errors->first('name') }}
                </p>
            @endif
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">
                {{ __('Email') }}
            </label>
            <input 
                id="email" 
                name="email" 
                type="email" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500" 
                value="{{ old('email', $user->email) }}" 
                required 
                disabled
                autocomplete="username"
            >
            @if ($errors->get('email'))
                <p class="mt-2 text-sm text-red-600">
                    {{ $errors->first('email') }}
                </p>
            @endif

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button 
                            form="send-verification" 
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                        >
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent'))
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button 
                type="submit" 
                class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
            >
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated'))
                <div 
                    id="save-message" 
                    class="text-sm text-gray-600"
                >
                    {{ __('Saved.') }}
                </div>
                <script>
                    setTimeout(() => {
                        document.getElementById('save-message').style.display = 'none';
                    }, 2000);
                </script>
            @endif
        </div>
    </form>
</section>