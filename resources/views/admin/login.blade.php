<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Reliance Solutions</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans antialiased text-slate-300 bg-slate-950 flex flex-col items-center justify-center p-6">

    <div class="w-full max-w-md bg-slate-900 border border-slate-800 rounded-2xl p-8 shadow-2xl space-y-6">
        <div class="text-center space-y-2">
            <h1 class="font-title font-extrabold text-2xl text-white tracking-tight flex items-center justify-center gap-1.5">
                @if(setting('logo'))
                    <img src="{{ asset('storage/' . setting('logo')) }}" alt="Reliance Solutions & Technology" class="h-14 md:h-16 w-auto object-contain">
                @else
                    RELIANCE
                @endif
                <span class="text-xs bg-blue-600 px-2 py-0.5 rounded text-white font-sans uppercase font-bold">Admin</span>
            </h1>
            <p class="text-xs text-slate-500">Sign in to manage services, solutions, projects, and insights.</p>
        </div>

        @if($errors->any())
            <div class="p-4 bg-rose-500/10 border border-rose-500/20 text-rose-400 rounded-lg text-xs">
                <ul class="list-disc pl-5 space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required placeholder="admin@reliancesolutions.co.tz"
                       class="w-full bg-slate-950 border border-slate-850 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white placeholder-slate-700">
            </div>

            <div>
                <label for="password" class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Password</label>
                <input type="password" name="password" id="password" required placeholder="••••••••"
                       class="w-full bg-slate-950 border border-slate-855 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white placeholder-slate-700">
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded text-blue-650 bg-slate-950 border-slate-800 focus:ring-blue-550 focus:ring-offset-slate-900 cursor-pointer">
                <label for="remember" class="ml-2 text-xs font-semibold text-slate-400 cursor-pointer">Remember me</label>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3.5 rounded-lg transition-colors cursor-pointer shadow-lg hover:shadow-blue-500/10">
                Log In
            </button>
        </form>
    </div>

    <!-- LOGIN FOOTER -->
    <div class="text-center text-xs text-slate-500 mt-8">
        &copy; {{ date('Y') }} Reliance Solutions & Technology. All Rights Reserved.
    </div>

</body>
</html>
