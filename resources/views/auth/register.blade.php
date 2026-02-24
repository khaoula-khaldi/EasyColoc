<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EasyColoc') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-50">

<div class="min-h-screen flex flex-col md:flex-row">

    <!-- Left Hero / Info + Illustration -->
    <div class="md:w-1/2 relative flex flex-col justify-center p-10 bg-indigo-500 text-white overflow-hidden">
       
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Bienvenue sur EasyColoc 💸</h1>
        <p class="mb-6 text-gray-200">
            Gérez vos colocations, suivez les dépenses et remboursements,
            et restez organisé avec vos colocataires.
        </p>
        <div class="space-x-4">
            <a href="{{ route('login') }}" class="px-6 py-3 border border-white rounded-xl hover:bg-white hover:text-indigo-600 transition transform hover:scale-105">Se connecter</a>
        </div>

    </div>

    <!-- Right Register Form -->
    <div class="md:w-1/2 flex flex-col justify-center items-center p-10 bg-gray-50">
        <div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8">
            <h2 class="text-2xl font-bold mb-6 text-center">Créer un compte</h2>

            <!-- Laravel Register Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Nom')" />
                    <x-text-input id="name" class="block mt-1 w-full border-gray-300 rounded-md"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 rounded-md"
                        type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Mot de passe')" />
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 rounded-md"
                        type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Submit -->
                <div class="flex flex-col items-center mt-6">
                    <x-primary-button class="w-full bg-green-500 pl-[150px] hover:bg-green-600">
                        {{ __('S’inscrire') }}
                    </x-primary-button>

                    <a class="mt-4 text-sm text-gray-500 hover:text-gray-700" href="{{ route('login') }}">
                        {{ __('Vous avez déjà un compte ? Se connecter') }}
                    </a>
                </div>
            </form>
        </div>
    </div>

</div>

</body>
</html>