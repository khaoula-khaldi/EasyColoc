<!-- resources/views/despenses/create.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une dépense - EasyColoc</title>
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
                     class="w-20 h-20 rounded-full object-cover border-4 border-indigo-500 shadow-md">
            @else
                <img src="{{ asset('images/default.png') }}"
                     class="w-20 h-20 rounded-full object-cover border-4 border-indigo-500 shadow-md">
            @endif
            <div>
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                    Bonjour {{ Auth::user()->name }} 👋
                </h2>
            </div>
        </div>

        <nav class="mt-6">
            <a href="{{ route('dashboard') }}"
               class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
               Dashboard
            </a>
    
            <a href="{{ route('despenses.create', $colocation->id) }}"
               class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
               Ajouter une dépense
            </a>

            <a href="#"
               class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
               _______
            </a>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 overflow-y-auto py-10 px-6">
        <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold mb-6">Ajouter une dépense</h2>

            <form action="{{ route('despenses.store', $colocation->id) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Titre</label>
                    <input type="text" name="title"
                           class="w-full border rounded-lg px-4 py-2"
                           required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Montant</label>
                    <input type="number" step="0.01" name="amount"
                           class="w-full border rounded-lg px-4 py-2"
                           required>
                </div>

                <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                    Ajouter
                </button>
            </form>
        </div>
    </main>
</div>

</body>
</html>