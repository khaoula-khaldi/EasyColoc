<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColoc Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 dark:bg-gray-900">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white dark:bg-gray-800 shadow-md">
        <div class="p-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">EasyColoc</h1>
        </div>
        <nav class="mt-6">
            <a href="{{ route('profile.edit') }}" class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Profile</a>
            <a href="{{ route('formColocation') }}" class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Ajouter Colocation</a>
            <a href="#" class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Dépenses</a>
            <a href="#" class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Ajouter Dépense</a>
            <a href="#" class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Membres</a>
            <a href="#" class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Statistiques</a>
        </nav>

    </aside>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8">
                
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">
                    🏠 Nouvelle Colocation
                </h3>

                <form method="POST" >
                    @csrf

                    <!-- Nom Colocation -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nom de la colocation
                        </label>

                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               placeholder="Ex: Coloc Centre Ville"
                               class="mt-2 block w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                               required>

                        @error('name')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- Button -->
                    <div class="mt-8 flex justify-end">
                        <button type="submit"
                                class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-lg transition duration-200">
                            Créer la colocation
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</div>

</body>
</html>