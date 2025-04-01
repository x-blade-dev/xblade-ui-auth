<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-sm font-medium text-gray-700">
                {{ __('Current Password') }}
            </label>
            <input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500"
                autocomplete="current-password" 
            />
            @if ($errors->updatePassword->get('current_password'))
                <p class="mt-2 text-sm text-red-600">
                    {{ $errors->updatePassword->first('current_password') }}
                </p>
            @endif
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-medium text-gray-700">
                {{ __('New Password') }}
            </label>
            <input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500"
                autocomplete="new-password" 
            />
            @if ($errors->updatePassword->get('password'))
                <p class="mt-2 text-sm text-red-600">
                    {{ $errors->updatePassword->first('password') }}
                </p>
            @endif
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700">
                {{ __('Confirm Password') }}
            </label>
            <input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500"
                autocomplete="new-password" 
            />
            @if ($errors->updatePassword->get('password_confirmation'))
                <p class="mt-2 text-sm text-red-600">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </p>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button 
                type="submit" 
                class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
            >
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <div 
                    id="save-message" 
                    class="text-sm text-gray-600"
                >
                    {{ __('Saved.') }}
                </div>
                
                <script>
                    // Hide the message after 2 seconds
                    setTimeout(() => {
                        document.getElementById('save-message').style.display = 'none';
                    }, 2000);
                </script>
            @endif
        </div>
    </form>
</section>