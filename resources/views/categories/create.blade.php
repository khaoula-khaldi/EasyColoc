<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Catégorie - EasyColoc</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white dark:bg-gray-800 shadow-md flex-shrink-0">
        <div class="p-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">EasyColoc</h1>
        </div>

        <div class="flex items-center gap-4 mb-6 px-6">
            @if(Auth::user()->image)
                <img src="{{ asset('storage/' . Auth::user()->image) }}"
                     class="w-16 h-16 rounded-full object-cover border-4 border-indigo-500 shadow-md">
            @else
                <img src="{{ asset('images/default.png') }}"
                     class="w-16 h-16 rounded-full object-cover border-4 border-indigo-500 shadow-md">
            @endif
            <div>
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                    Bonjour {{ Auth::user()->name }} 👋
                </h2>
            </div>
        </div>

        <nav class="mt-6">
            <a href="{{ route('dashboard') }}"
               class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Dashboard</a>
            <a href="{{ route('profile.edit') }}"
               class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Profile</a>
            @if($colocation->isOwner())
                <a href="{{ route('categories.create', $colocation->id) }}"
                   class="block px-6 py-3 my-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 text-center">Créer une catégorie</a>
            @endif
            <a href="{{ route('colocationView', $colocation->id) }}"
               class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Ma Colocation</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex items-center justify-center p-6">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-md p-8">
            
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">
                Créer une catégorie pour <span class="text-indigo-500">{{ $colocation->name }}</span>
            </h1>

            @if(session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('categories.store', $colocation->id) }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="title" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Nom de la catégorie</label>
                    <input type="text" name="title" id="title" placeholder="Titre catégorie"
                           class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                           required>
                    @error('title')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full py-2 bg-indigo-500 text-white font-semibold rounded-lg hover:bg-indigo-600 transition">
                    Créer la catégorie
                </button>
            </form>
        </div>
    </main>

</div>

</body>
</html>