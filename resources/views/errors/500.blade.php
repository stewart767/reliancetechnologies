<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internal Server Error | Reliance Solutions & Technology</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans antialiased text-slate-355 bg-slate-950 flex flex-col items-center justify-center p-6 text-center">

    <div class="space-y-6 max-w-md">
        <span class="text-xs font-bold text-red-500 uppercase tracking-widest block">Error 500</span>
        <h1 class="font-title font-extrabold text-4xl sm:text-5xl text-white tracking-tight">Internal System Error</h1>
        <p class="text-sm leading-relaxed text-slate-500">
            A database loop or config dependency failure has occurred inside our servers. Our system engineers have been alerted.
        </p>
        <div class="pt-4">
            <a href="{{ route('home') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-6 py-3 rounded-lg transition-colors shadow-lg hover:shadow-blue-500/10 cursor-pointer">
                Return to Core Dashboard
            </a>
        </div>
    </div>

</body>
</html>
