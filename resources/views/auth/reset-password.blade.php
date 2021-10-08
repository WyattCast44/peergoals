<div>

    @error('token')
        <x-alerts.error :message="$message" />
    @enderror

    @error('general')
        <x-alerts.error :message="$message" />
    @enderror

    <form wire:submit.prevent="resetPassword" class="space-y-2" "">

        <label for="email" class="block">

            <span>Email Address</span>

            <input 
                class=""
                id="email"
                type="email" 
                name="email"
                wire:model.defer="email"
                required>

        </label>

        <x-errors.inline-validation key="email" />

        <label for="new_password" class="block">

            <span>New Password</span>

            <input 
                class=""
                id="new_password"
                type="password" 
                name="new_password"
                wire:model.defer="new_password"
                required>

        </label>

        <x-errors.inline-validation key="new_password" />

        <label for="new_password_confirmation" class="block">

            <span>New Password Confirmation</span>

            <input 
                class=""
                id="new_password_confirmation"
                type="password" 
                name="new_password_confirmation"
                wire:model.defer="new_password_confirmation"
                required>

        </label>

        <label for="token" class="hidden">

            <input 
                id="token"
                name="token"
                type="hidden" 
                class="hidden"
                wire:model.defer="token"
                required>

        </label>

        <div class="block">

            <button type="submit" class="p-2 border">
                Reset Password and Login
            </button>

        </div>

    </form>
</div>
