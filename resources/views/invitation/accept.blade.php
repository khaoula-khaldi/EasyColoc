

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
                
        <div class="flex items-center gap-4 mb-6">

            @if(Auth::user()->image)
                <img src="{{ asset('storage/' . Auth::user()->image) }}"
                    class="w-20 h-20 rounded-full object-cover border-4 border-indigo-500 shadow-md">
            @else
                <img src="{{ asset('images/default.png') }}"
                    class="w-20 h-20 rounded-full object-cover border-4 border-indigo-500 shadow-md">
            @endif

            <div>
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
                    Bonjour {{ Auth::user()->name }} 👋
                </h2>
            </div>
        </div>




        <div class="max-w-2xl mx-auto mt-12 p-6 bg-white shadow rounded-lg">
            <h1 class="text-2xl font-bold mb-4">Invitation acceptée ✅</h1>
            <p>Vous avez rejoint la colocation avec succès !</p>
            <a href="{{ route('dashboard') }}" class="text-blue-600 mt-4 inline-block">Retour au tableau de bord</a>
        </div>


</div>

</body>
</html>
