<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button 
        id="delete-account-btn"
        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition"
    >
        {{ __('Delete Account') }}
    </button>

    <!-- Confirmation Modal -->
    <div id="confirm-deletion-modal" class="hidden fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal content -->
            <div class="fixed inset-0 flex items-center justify-center p-4">
                <div class="relative mx-auto w-full max-w-lg">
                    <div class="bg-white rounded-lg shadow-xl overflow-hidden">                
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                            @csrf
                            @method('delete')

                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Are you sure you want to delete your account?') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                            </p>

                            <div class="mt-6">
                                <label for="password" class="sr-only">{{ __('Password') }}</label>
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    placeholder="{{ __('Password') }}"
                                    required
                                />
                                @if ($errors->userDeletion->get('password'))
                                    <p class="mt-2 text-sm text-red-600">
                                        {{ $errors->userDeletion->first('password') }}
                                    </p>
                                @endif
                            </div>

                            <div class="mt-6 flex justify-end">
                                <button 
                                    type="button"
                                    id="cancel-deletion"
                                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition mr-3"
                                >
                                    {{ __('Cancel') }}
                                </button>

                                <button 
                                    type="submit"
                                    class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition"
                                >
                                    {{ __('Delete Account') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteBtn = document.getElementById('delete-account-btn');
        const modal = document.getElementById('confirm-deletion-modal');
        const cancelBtn = document.getElementById('cancel-deletion');
        
        // Show modal when delete button is clicked
        deleteBtn.addEventListener('click', function() {
            modal.classList.remove('hidden');
        });
        
        // Hide modal when cancel button is clicked
        cancelBtn.addEventListener('click', function() {
            modal.classList.add('hidden');
        });
        
        // Hide modal when clicking outside modal content
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
        
        // Show modal if there are errors
        @if($errors->userDeletion->isNotEmpty())
            modal.classList.remove('hidden');
        @endif
    });
</script>