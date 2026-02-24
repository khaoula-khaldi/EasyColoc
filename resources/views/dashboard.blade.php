

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

    <!-- Main content -->
    <main class="flex-1 p-6 overflow-y-auto">

        <h2 class="text-3xl font-semibold text-gray-800 dark:text-white mb-6">Dashboard</h2>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-5">
                <h3 class="text-gray-500 dark:text-gray-400 text-sm">Total Colocations</h3>
                <p class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">12</p>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-5">
                <h3 class="text-gray-500 dark:text-gray-400 text-sm">Total Dépenses</h3>
                <p class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">1,245 €</p>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-5">
                <h3 class="text-gray-500 dark:text-gray-400 text-sm">Total Membres</h3>
                <p class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">8</p>
            </div>
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-5">
                <h3 class="text-gray-500 dark:text-gray-400 text-sm">Soldes à Rembourser</h3>
                <p class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">430 €</p>
            </div>
        </div>

        <!-- Latest Expenses Table -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-5 mb-6">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Dernières Dépenses</h3>
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400">Nom</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400">Montant</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400">Colocation</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <tr>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">Électricité</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">120 €</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">Coloc A</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">22/02/2026</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">Internet</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">45 €</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">Coloc B</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">21/02/2026</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Latest Members Table -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-5">
            <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-4">Derniers Membres</h3>
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400">Nom</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400">Email</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400">Colocation</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <tr>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">Alice</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">alice@mail.com</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">Coloc A</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">Bob</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">bob@mail.com</td>
                        <td class="px-4 py-2 text-gray-700 dark:text-gray-200">Coloc B</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </main>
</div>

</body>
</html>
