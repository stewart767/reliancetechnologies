<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found | Reliance Solutions & Technology</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans antialiased text-slate-350 bg-slate-950 flex flex-col items-center justify-center p-6 text-center">

    <div class="space-y-6 max-w-md">
        <span class="text-xs font-bold text-blue-500 uppercase tracking-widest block">Error 404</span>
        <h1 class="font-title font-extrabold text-4xl sm:text-5xl text-white tracking-tight">System Node Offline</h1>
        <p class="text-sm leading-relaxed text-slate-500">
            The page directory you requested could not be resolved by our routing tables. It may have moved or the address link is incorrect.
        </p>
        <div class="pt-4">
            <a href="{{ route('home') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-6 py-3 rounded-lg transition-colors shadow-lg hover:shadow-blue-500/10 cursor-pointer">
                Return to Core Dashboard
            </a>
        </div>
    </div>

</body>
</html>
