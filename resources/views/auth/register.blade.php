<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name"
                class="block mt-1 w-full py-3 px-4 text-lg border-2 border-gray-300 focus:border-gray-600 focus:ring-0 rounded-lg transition duration-200"
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                class="block mt-1 w-full py-3 px-4 text-lg border-2 border-gray-300 focus:border-gray-600 focus:ring-0 rounded-lg transition duration-200"
                type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password"
                class="block mt-1 w-full py-3 px-4 text-lg border-2 border-gray-300 focus:border-gray-600 focus:ring-0 rounded-lg transition duration-200"
                type="password" name="password" required />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation"
                class="block mt-1 w-full py-3 px-4 text-lg border-2 border-gray-300 focus:border-gray-600 focus:ring-0 rounded-lg transition duration-200"
                type="password" name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Gender')" />
            <div class="mt-2 space-y-2">
                <div class="flex items-center">
                    <input id="male" name="gender" type="radio" value="Laki-laki"
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300"
                        {{ old('gender') == 'Laki-laki' ? 'checked' : '' }} required>
                    <label for="male" class="ml-3 block text-sm font-medium text-gray-700">
                        Laki-laki
                    </label>
                </div>
                <div class="flex items-center">
                    <input id="female" name="gender" type="radio" value="Perempuan"
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300"
                        {{ old('gender') == 'Perempuan' ? 'checked' : '' }} required>
                    <label for="female" class="ml-3 block text-sm font-medium text-gray-700">
                        Perempuan
                    </label>
                </div>
            </div>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <textarea id="address" name="address" rows="3"
                class="block mt-1 w-full border-2 border-gray-300 focus:border-gray-600 focus:ring-0 rounded-lg transition duration-200 p-4"
                required>{{ old('address') }}</textarea>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
