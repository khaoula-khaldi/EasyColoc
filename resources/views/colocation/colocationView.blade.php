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

        @if($colocation && $colocation->isOwner())
            <a href="{{ route('categories.create', $colocation->id) }}"
            class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
            Créer une catégorie
            </a>
            <a href="{{ route('invitation.create', $colocation->id) }}"
            class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
            Créer une Invitation
            </a>
        @endif

        <a href="despenses"
        class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
        Ajouter un déspense
        </a>

        <a href="#"
        class="block px-6 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded">
        _________
        </a>
    </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 overflow-y-auto py-10 px-6">
        <!-- Colocation Info -->
        <div class="bg-white shadow-md rounded-xl p-6 mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">nameColocation</h1>
            <p class="text-gray-600">Status:
                <span class="text-green-500 font-semibold">Active</span>
                <span class="text-red-500 font-semibold">Cancelled</span>
            </p>
            <p class="text-gray-500 text-sm mt-2">Créée le: date</p>
        </div>

        <!-- Users in Colocation -->
        <div class="bg-white shadow-md rounded-xl p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Membres</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Nom</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Rôle</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500">Date d'ajout</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($colocation->users as $user)
                        <tr>
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">{{ $user->pivot->role }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($user->pivot->joined_at)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>



</div>

</body>
</html>