<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyColoc Dashboard - Invitation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900">

<div class="flex h-screen">

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
               class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Dashboard</a>
     
            <a href="{{ route('despenses.create', $colocation->id ?? 0) }}"
               class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">Ajouter une dépense</a>

            <a href="#"
               class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">_________</a>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-8 overflow-y-auto">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Créer une invitation</h2>

            @if(session('success'))
                <p class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</p>
            @endif

            @if($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('invitation.store', $colocation->id ?? $colocationId) }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Email du membre :</label>
                    <input type="email" name="email" required
                           placeholder="ex: membre@example.com"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                </div>
                <button type="submit"
                        class="px-6 py-2 bg-indigo-500 text-white font-semibold rounded-lg hover:bg-indigo-600">
                    Envoyer invitation
                </button>
            </form>
        </div>
    </main>

</div>

</body>
</html>