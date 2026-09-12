<!DOCTYPE html>
<html lang="en" class="bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Reliance Solutions & Technology</title>
    
    <!-- Google Fonts Preconnect & Stylesheet -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-300 bg-slate-950 flex flex-col md:flex-row min-h-screen">

    <!-- ADMIN SIDEBAR -->
    <aside class="w-full md:w-64 bg-slate-900 border-r border-slate-800 flex flex-col md:h-screen md:sticky md:top-0">
        <div class="px-6 py-5 border-b border-slate-800 flex items-center justify-between">
            <a href="{{ route('admin.dashboard') }}" class="font-title font-extrabold text-lg text-white tracking-tight flex items-center gap-1.5">
                @if(setting('logo'))
                    <img src="{{ asset('storage/' . setting('logo')) }}" alt="Reliance Solutions & Technology" class="h-10 w-auto object-contain">
                @else
                    RELIANCE
                @endif
                <span class="text-xs bg-blue-600 px-2 py-0.5 rounded text-white font-sans uppercase font-bold">Admin</span>
            </a>
        </div>
        
        <nav class="flex-grow p-4 space-y-4 overflow-y-auto">
            <!-- Operations & Main -->
            <div class="space-y-1">
                <div class="text-[10px] font-bold uppercase tracking-wider text-slate-500 px-4 mb-2">Operations</div>
                
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.contact-submissions.index') }}" class="flex items-center justify-between px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.contact-submissions.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 19v-8.93a2 2 0 01.89-1.664l8-5.333a2 2 0 012.22 0l8 5.333A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76" />
                        </svg>
                        <span>Inquiries Log</span>
                    </div>
                    @php $pendingCount = \App\Models\ContactSubmission::where('status', 'pending')->count(); @endphp
                    @if($pendingCount > 0)
                        <span class="bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $pendingCount }}</span>
                    @endif
                </a>

                <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.services.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>Services</span>
                </a>

                <a href="{{ route('admin.solutions.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.solutions.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <span>Solutions</span>
                </a>

                <a href="{{ route('admin.industries.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.industries.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span>Industries</span>
                </a>

                <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.projects.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span>Projects</span>
                </a>

                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.products.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span>Products</span>
                </a>

                <a href="{{ route('admin.yaoyao-specs.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.yaoyao-specs.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z" />
                    </svg>
                    <span>Yaoyao Specs</span>
                </a>
            </div>

            <!-- Corporate Profile -->
            <div class="space-y-1">
                <div class="text-[10px] font-bold uppercase tracking-wider text-slate-500 px-4 mb-2">Corporate Profile</div>
                
                <a href="{{ route('admin.leaders.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.leaders.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span>Leaders</span>
                </a>

                <a href="{{ route('admin.certificates.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.certificates.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138z" />
                    </svg>
                    <span>Certificates</span>
                </a>
            </div>

            <!-- Marketing & Social Proof -->
            <div class="space-y-1">
                <div class="text-[10px] font-bold uppercase tracking-wider text-slate-500 px-4 mb-2">Marketing &amp; Trust</div>
                
                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.testimonials.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span>Testimonials</span>
                </a>

                <a href="{{ route('admin.partners.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.partners.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Partners &amp; Associations</span>
                </a>

                <a href="{{ route('admin.faqs.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.faqs.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>FAQs</span>
                </a>
            </div>

            <!-- Blog / Articles -->
            <div class="space-y-1">
                <div class="text-[10px] font-bold uppercase tracking-wider text-slate-500 px-4 mb-2">News &amp; Insights</div>
                
                <a href="{{ route('admin.posts.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.posts.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <span>Articles / Posts</span>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.categories.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Categories</span>
                </a>
            </div>

            <!-- Configuration & System -->
            <div class="space-y-1">
                <div class="text-[10px] font-bold uppercase tracking-wider text-slate-500 px-4 mb-2">Configuration</div>
                
                <a href="{{ route('admin.sliders.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.sliders.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Homepage Sliders</span>
                </a>

                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-slate-800 hover:text-white transition-colors {{ Route::is('admin.settings.*') ? 'bg-blue-600 text-white' : 'text-slate-400' }}">
                    <svg class="w-4 h-4 shrink-0 transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Company Settings</span>
                </a>
            </div>
        </nav>
        
        <!-- User account metadata -->
        <div class="p-4 border-t border-slate-800 flex items-center justify-between text-xs text-slate-400 bg-slate-950">
            <div>
                <p class="font-semibold text-slate-200">{{ Auth::user()->name }}</p>
                <p class="truncate max-w-[120px]">{{ Auth::user()->email }}</p>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="hover:text-red-400 font-semibold cursor-pointer">Logout</button>
            </form>
        </div>
    </aside>

    <!-- CONTENT WRAPPER -->
    <main class="flex-grow p-6 md:p-10 max-w-full overflow-x-hidden">
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-rose-500/10 border border-rose-500/20 text-rose-400 rounded-lg text-sm">
                <p class="font-bold text-rose-450 mb-2">Please correct the following errors:</p>
                <ul class="list-disc pl-5 space-y-1 text-rose-400 text-xs">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

        <!-- ADMIN FOOTER -->
        <footer class="mt-16 pt-6 border-t border-slate-800 text-xs text-slate-500 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p>&copy; {{ date('Y') }} Reliance Solutions & Technology. All Rights Reserved.</p>
            <div class="flex gap-4">
                <a href="{{ route('home') }}" target="_blank" class="hover:text-blue-500 transition-colors">View Live Site</a>
                <span class="text-slate-800">|</span>
                <a href="{{ route('privacy') }}" target="_blank" class="hover:text-blue-500 transition-colors">Privacy Policy</a>
            </div>
        </footer>
    </main>

</body>
</html>
