<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Num Tel -->
        <div class="mt-4">
            <x-input-label for="num_tel" :value="__('Num Tel')" />
            <x-text-input id="num_tel" class="block mt-1 w-full" type="text" name="num_tel" :value="old('num_tel')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('num_tel')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="">Sélectionnez un rôle</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Grade -->
        <div class="mt-4">
            <x-input-label for="grade" :value="__('Grade')" />
            <x-text-input id="grade" class="block mt-1 w-full" type="text" name="grade" :value="old('grade')" required />
            <x-input-error :messages="$errors->get('grade')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmation du mot de passe')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a style="margin-right: 10px;" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Déjà inscrit?') }}
            </a>

            <button style="background-color: #667eea; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-flex; align-items: center; transition: background-color 0.3s ease; font-weight: 500;">
            {{ __('S\'inscrire') }}
            </button>
        </div>
    </form>
</x-guest-layout>
