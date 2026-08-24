<!DOCTYPE html>
<html lang="en" class="bg-slate-950 scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Dynamic SEO Component -->
    @yield('seo')
    
    <!-- Tailwind CSS and Alpine.js assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-300 flex flex-col min-h-screen bg-slate-950 selection:bg-blue-500/30 selection:text-white">

    <!-- PAGE PRELOADER -->
    <div id="page-loader" class="fixed inset-0 z-[99999] bg-slate-950 flex flex-col items-center justify-center transition-all duration-700 ease-out">
        <div class="flex flex-col items-center space-y-6">
            <!-- Logo Container with pulse micro-animation -->
            <div class="relative animate-pulse flex items-center justify-center">
                @if(setting('logo'))
                    <img src="{{ asset('storage/' . setting('logo')) }}" alt="Reliance Solutions & Technology" class="h-16 md:h-20 w-auto object-contain">
                @else
                    <span class="font-title font-extrabold text-3xl md:text-4xl text-white tracking-tight flex items-center gap-2">
                        RELIANCE<span class="w-3.5 h-3.5 bg-blue-500 rounded-full inline-block"></span>
                    </span>
                @endif
            </div>
            
            <!-- Progress Line Indicator -->
            <div class="w-32 h-[3px] bg-slate-900 rounded-full overflow-hidden relative">
                <div class="absolute inset-y-0 left-0 w-1/2 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full animate-loading-bar"></div>
            </div>
        </div>
    </div>

    <style>
    @keyframes loading-bar {
        0% { left: -50%; width: 30%; }
        50% { width: 50%; }
        100% { left: 100%; width: 30%; }
    }
    .animate-loading-bar {
        animation: loading-bar 1.5s infinite ease-in-out;
    }
    /* Prevent scroll during load state */
    body.loading-active {
        overflow: hidden;
    }
    </style>

    <script>
    document.body.classList.add('loading-active');
    window.addEventListener('load', function() {
        const loader = document.getElementById('page-loader');
        if (loader) {
            loader.classList.add('opacity-0');
            loader.classList.add('pointer-events-none');
            document.body.classList.remove('loading-active');
            setTimeout(() => {
                loader.style.display = 'none';
            }, 700);
        }
    });
    </script>

    <!-- STICKY NAVBAR -->
    <nav x-data="{ mobileMenuOpen: false, scrolled: false, activeDropdown: null, servicesOpen: false, companyOpen: false, solutionsOpen: false }" 
         x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
         :class="{ 'bg-slate-950/90 backdrop-blur-xl border-b border-slate-800/80 py-4 shadow-xl shadow-blue-950/20': scrolled || !{{ Route::is('home') || Route::is('yaoyao') ? 'true' : 'false' }}, 'bg-transparent py-6 border-b border-transparent': !scrolled && {{ Route::is('home') || Route::is('yaoyao') ? 'true' : 'false' }} }"
         class="fixed top-0 left-0 w-full z-50 transition-all duration-300">
        
        <div class="container flex items-center justify-between relative">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="font-title font-extrabold text-2xl text-white tracking-tight flex items-center gap-1.5 hover:opacity-90 transition-opacity">
                @if(setting('logo'))
                    <img src="{{ asset('storage/' . setting('logo')) }}" alt="Reliance Solutions & Technology" class="h-12 md:h-14 w-auto object-contain">
                @else
                    RELIANCE<span class="w-2.5 h-2.5 bg-[#e11d48] rounded-full inline-block animate-pulse"></span>
                @endif
            </a>
            
            <!-- Desktop Links -->
            <ul class="hidden lg:flex items-center gap-6">
                <li><a href="{{ route('home') }}" class="text-xs font-semibold transition-colors hover:text-white {{ Route::is('home') ? 'text-white font-bold' : 'text-slate-400' }}">HOME</a></li>
                
                <!-- Company Dropdown -->
                <li class="relative" @mouseenter="activeDropdown = 'company'" @mouseleave="activeDropdown = null">
                    <a href="#" class="text-xs font-semibold transition-colors hover:text-white flex items-center gap-1 {{ Route::is('about.*') ? 'text-white font-bold' : 'text-slate-400' }}">
                        COMPANY
                        <svg class="w-3 h-3 transition-transform duration-200" :class="{ 'rotate-180': activeDropdown === 'company' }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                </li>
                
                <!-- Services Dropdown (Mega Menu Trigger) -->
                <li class="relative" @mouseenter="activeDropdown = 'services'" @mouseleave="activeDropdown = null">
                    <a href="{{ route('services.index') }}" class="text-xs font-semibold transition-colors hover:text-white flex items-center gap-1 {{ Route::is('services.*') ? 'text-white font-bold' : 'text-slate-400' }}">
                        SERVICES
                        <svg class="w-3 h-3 transition-transform duration-200" :class="{ 'rotate-180': activeDropdown === 'services' }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </a>
                </li>

                <li><a href="{{ route('solutions.index') }}" class="text-xs font-semibold transition-colors hover:text-white {{ Route::is('solutions.*') ? 'text-white font-bold' : 'text-slate-400' }}">SOLUTIONS</a></li>
                <li><a href="{{ route('projects.index') }}" class="text-xs font-semibold transition-colors hover:text-white {{ Route::is('projects.*') ? 'text-white font-bold' : 'text-slate-400' }}">PROJECTS</a></li>
                <li><a href="{{ route('products.index') }}" class="text-xs font-semibold transition-colors hover:text-white {{ Route::is('products.*') ? 'text-white font-bold' : 'text-slate-400' }}">PRODUCTS</a></li>
                <li><a href="{{ route('insights.index') }}" class="text-xs font-semibold transition-colors hover:text-white {{ Route::is('insights.*') ? 'text-white font-bold' : 'text-slate-400' }}">INSIGHTS</a></li>
                <li><a href="{{ route('contact.index') }}" class="text-xs font-semibold transition-colors hover:text-white {{ Route::is('contact.index') ? 'text-white font-bold' : 'text-slate-400' }}">CONTACT</a></li>
            </ul>
            
            <!-- Desktop Controls / Cart -->
            <div class="hidden lg:flex items-center gap-4">
                <div class="relative">
                    <button onclick="toggleCartDrawer()" class="relative p-2.5 bg-slate-900 border border-slate-800 hover:border-slate-700 rounded-lg text-slate-350 hover:text-white transition-all cursor-pointer flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span id="cart-count-badge" class="absolute -top-1.5 -right-1.5 bg-blue-600 text-white text-[9px] font-bold px-1.5 py-0.5 rounded-full scale-0 transition-transform duration-300">0</span>
                    </button>
                </div>
                
                <a href="{{ route('contact.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-5 py-3 rounded-lg transition-all shadow-lg hover:shadow-blue-500/10 cursor-pointer hover:-translate-y-0.5 inline-block">
                    START A PROJECT
                </a>
            </div>
            
            <!-- Mobile Controls / Toggle -->
            <div class="flex lg:hidden items-center gap-3">
                <button onclick="toggleCartDrawer()" class="relative p-2 bg-slate-900 border border-slate-800 rounded-lg text-slate-300 hover:text-white transition-all cursor-pointer flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span id="cart-count-badge" class="absolute -top-1.5 -right-1.5 bg-blue-600 text-white text-[9px] font-bold px-1.5 py-0.5 rounded-full scale-0 transition-transform duration-300">0</span>
                </button>

                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-slate-300 hover:text-white focus:outline-none" aria-label="Toggle Menu">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- ================= DESKTOP DROPDOWN PANELS ================= -->
            
            <!-- Services Mega-Menu Dropdown Panel -->
            <div x-show="activeDropdown === 'services'" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-2"
                 @mouseenter="activeDropdown = 'services'" 
                 @mouseleave="activeDropdown = null"
                 class="absolute left-0 right-0 top-full w-full bg-slate-900 border border-slate-800 rounded-2xl p-8 shadow-2xl z-50 grid grid-cols-4 gap-8 mt-2"
                 style="display: none;">
                
                <!-- Category 1: Digital Solutions -->
                <div class="space-y-4">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider border-b border-slate-800 pb-2">Digital Solutions</h4>
                    <ul class="space-y-2.5">
                        <li>
                            <a href="{{ route('services.show', 'software-development') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">Software Development</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">Bespoke operational systems.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'ai-automation') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">AI & Automation</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">RPA and machine learning modules.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('solutions.show', 'digital-transformation') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">Digital Transformation</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">Modernizing legacy processes.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'system-integration') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">System Integration</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">Bridging databases & systems.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'custom-development') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">Web & Mobile Apps</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">High-throughput custom portals.</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Category 2: Infrastructure -->
                <div class="space-y-4">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider border-b border-slate-800 pb-2">Infrastructure</h4>
                    <ul class="space-y-2.5">
                        <li>
                            <a href="{{ route('services.show', 'ict-infrastructure') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">Network Infrastructure</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">Cat6, fiber cabling & switches.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'dcc-cloud-services') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">Cloud Solutions</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">Secure cloud environments.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'ict-infrastructure') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">Server Infrastructure</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">Redundant server layouts.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'it-consulting') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">ICT Support</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">24/7 managed SLA helpdesks.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'dcc-cloud-services') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">Data Center Solutions</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">Redundant cooling and storage.</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Category 3: Cybersecurity -->
                <div class="space-y-4">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider border-b border-slate-800 pb-2">Cybersecurity</h4>
                    <ul class="space-y-2.5">
                        <li>
                            <a href="{{ route('services.show', 'cybersecurity') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">Cybersecurity</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">Zero-trust architecture program.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'cybersecurity') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">Security Audits</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">Vulnerability scanners (VAPT).</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'cybersecurity') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">Network Security</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">Proactive gateway protection.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'ict-infrastructure') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">CCTV & Surveillance</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">HD IP cameras with edge analytics.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'ict-infrastructure') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">Access Control</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">Biometric logs and card key.</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Category 4: Enterprise Technology -->
                <div class="space-y-4">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider border-b border-slate-800 pb-2">Enterprise Technology</h4>
                    <ul class="space-y-2.5">
                        <li>
                            <a href="{{ route('services.show', 'software-development') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">ERP Solutions</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">Customized resource planning.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'sap-solutions') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">SAP Solutions</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">S/4HANA & SAP Business One.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'ai-automation') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">Business Intelligence</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">Predictive analytics dashboards.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'it-consulting') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">IT Consulting</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">Feasibility and system audits.</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services.show', 'software-development') }}" class="group block text-xs hover:text-white transition-colors">
                                <span class="block font-bold text-slate-350 group-hover:text-blue-500">Enterprise Systems</span>
                                <span class="block text-[10px] text-slate-500 font-medium mt-0.5">High-volume transactional setups.</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Company Dropdown Panel -->
            <div x-show="activeDropdown === 'company'" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-2"
                 @mouseenter="activeDropdown = 'company'" 
                 @mouseleave="activeDropdown = null"
                 class="absolute left-1/4 top-full w-full max-w-md bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-2xl z-50 flex flex-col gap-4 mt-2"
                 style="display: none;">
                
                <a href="{{ route('about.overview') }}" class="flex gap-4 p-3 rounded-xl hover:bg-slate-800/80 transition-all border border-transparent hover:border-slate-850 group">
                    <div class="w-10 h-10 bg-blue-500/10 text-blue-400 rounded-lg flex items-center justify-center shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-white text-sm group-hover:text-blue-400 transition-colors">Company Overview</h4>
                        <p class="text-[11px] text-slate-450 mt-0.5 leading-normal font-medium">Who we are, our technology capabilities, and ecosystem.</p>
                    </div>
                </a>

                <a href="{{ route('about.leadership') }}" class="flex gap-4 p-3 rounded-xl hover:bg-slate-800/80 transition-all border border-transparent hover:border-slate-850 group">
                    <div class="w-10 h-10 bg-blue-500/10 text-blue-400 rounded-lg flex items-center justify-center shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-white text-sm group-hover:text-blue-400 transition-colors">Leadership</h4>
                        <p class="text-[11px] text-slate-450 mt-0.5 leading-normal font-medium">The visionary management driving regional tech innovations.</p>
                    </div>
                </a>

                <a href="{{ route('about.certificates') }}" class="flex gap-4 p-3 rounded-xl hover:bg-slate-800/80 transition-all border border-transparent hover:border-slate-850 group">
                    <div class="w-10 h-10 bg-blue-500/10 text-blue-400 rounded-lg flex items-center justify-center shrink-0 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-white text-sm group-hover:text-blue-400 transition-colors">Certificates & Awards</h4>
                        <p class="text-[11px] text-slate-450 mt-0.5 leading-normal font-medium">Our international quality standards and excellence awards.</p>
                    </div>
                </a>
            </div>

        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-x-full"
             x-transition:enter-end="opacity-100 translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-x-0"
             x-transition:leave-end="opacity-0 translate-x-full"
             @click.away="mobileMenuOpen = false"
             class="fixed top-0 right-0 w-[300px] h-screen bg-slate-900 border-l border-slate-800 p-8 pt-24 shadow-2xl flex flex-col gap-8 z-40 lg:hidden overflow-y-auto"
             style="display: none;">
            
            <ul class="flex flex-col gap-5">
                <li><a href="{{ route('home') }}" @click="mobileMenuOpen = false" class="block text-lg font-semibold hover:text-white {{ Route::is('home') ? 'text-white font-bold' : 'text-slate-400' }}">Home</a></li>
                
                <!-- Expandable Company Mobile -->
                <li class="space-y-2">
                    <button @click="companyOpen = !companyOpen" class="w-full flex items-center justify-between text-lg font-semibold text-slate-400 hover:text-white">
                        <span>Company</span>
                        <svg class="w-4 h-4 transition-transform duration-250" :class="{ 'rotate-180': companyOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <ul x-show="companyOpen" x-transition class="pl-4 space-y-2 border-l border-slate-800" style="display: none;">
                        <li><a href="{{ route('about.overview') }}" @click="mobileMenuOpen = false" class="block text-sm text-slate-450 hover:text-white py-1">Company Overview</a></li>
                        <li><a href="{{ route('about.leadership') }}" @click="mobileMenuOpen = false" class="block text-sm text-slate-450 hover:text-white py-1">Leadership</a></li>
                        <li><a href="{{ route('about.certificates') }}" @click="mobileMenuOpen = false" class="block text-sm text-slate-450 hover:text-white py-1">Certificates & Awards</a></li>
                    </ul>
                </li>
                
                <!-- Expandable Services Mobile -->
                <li class="space-y-2">
                    <button @click="servicesOpen = !servicesOpen" class="w-full flex items-center justify-between text-lg font-semibold text-slate-400 hover:text-white">
                        <span>Services</span>
                        <svg class="w-4 h-4 transition-transform duration-250" :class="{ 'rotate-180': servicesOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <ul x-show="servicesOpen" x-transition class="pl-4 space-y-2 border-l border-slate-800" style="display: none;">
                        <li><a href="{{ route('services.index') }}" @click="mobileMenuOpen = false" class="block text-sm text-slate-400 hover:text-white py-1">All Services</a></li>
                        @foreach($globalServices as $svc)
                            <li><a href="{{ route('services.show', $svc->slug) }}" @click="mobileMenuOpen = false" class="block text-sm text-slate-400 hover:text-white py-1">{{ $svc->title }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="{{ route('projects.index') }}" @click="mobileMenuOpen = false" class="block text-lg font-semibold hover:text-white {{ Route::is('projects.*') ? 'text-white font-bold' : 'text-slate-400' }}">Projects</a></li>
                <li><a href="{{ route('contact.index') }}" @click="mobileMenuOpen = false" class="block text-lg font-semibold hover:text-white {{ Route::is('contact.index') ? 'text-white font-bold' : 'text-slate-400' }}">Contact</a></li>
            </ul>
            
            <a href="{{ route('contact.index') }}" @click="mobileMenuOpen = false" class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3.5 rounded-lg block shadow-lg cursor-pointer">
                Talk to an Expert
            </a>
        </div>
    </nav>

    <!-- CONTENT WRAPPER -->
    <main class="flex-grow">
        @yield('content')
    </main>

    @include('layouts.footer')

    <!-- CART DRAWER OVERLAY -->
    <div id="cart-drawer" class="fixed inset-y-0 right-0 z-[9999] w-full sm:w-[450px] bg-slate-900 border-l border-slate-800 shadow-2xl translate-x-full transition-transform duration-300 ease-in-out flex flex-col justify-between" style="display: none;">
        <!-- Header -->
        <div class="p-6 border-b border-slate-800/80 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 class="font-title font-extrabold text-white text-lg">Your Inquiry Cart</h3>
            </div>
            <button onclick="toggleCartDrawer()" class="text-slate-400 hover:text-white transition-colors cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Scrollable Items List -->
        <div id="cart-items-container" class="p-6 flex-grow overflow-y-auto space-y-4">
            <!-- Dynamic items injected here -->
        </div>

        <!-- Footer / Checkout -->
        <div class="p-6 border-t border-slate-800/80 bg-slate-950/60 backdrop-blur-md space-y-4">
            <div class="flex justify-between items-center text-sm font-semibold text-slate-350">
                <span>Subtotal (Estimated)</span>
                <span id="cart-subtotal" class="text-white text-lg font-bold">TZS 0</span>
            </div>
            <p class="text-[11px] text-slate-500 leading-normal">
                Estimated pricing. You can submit this list as a formal request for quotation and purchase clearance.
            </p>
            <div class="grid grid-cols-2 gap-3">
                <button onclick="clearCart()" class="w-full py-3 bg-slate-900 border border-slate-800 hover:border-slate-700 text-slate-450 hover:text-white font-semibold text-xs rounded-lg transition-colors cursor-pointer">
                    Clear Cart
                </button>
                <button onclick="checkoutCart()" class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-lg transition-all shadow-lg hover:shadow-blue-500/20 cursor-pointer">
                    Request Quote
                </button>
            </div>
        </div>
    </div>
    
    <!-- BACKDROP COVER -->
    <div id="cart-backdrop" onclick="toggleCartDrawer()" class="fixed inset-0 z-[9998] bg-slate-950/60 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300" style="display: none;"></div>

    <script>
        let cart = [];

        // Load cart from localStorage
        function loadCart() {
            try {
                const saved = localStorage.getItem('reliance_cart');
                cart = saved ? JSON.parse(saved) : [];
            } catch(e) {
                cart = [];
            }
            updateCartUI();
        }

        // Save cart to localStorage
        function saveCart() {
            localStorage.setItem('reliance_cart', JSON.stringify(cart));
            updateCartUI();
        }

        // Add to cart
        function addToCart(title, priceRaw, image) {
            // Strip out non-digits from price to calculate total
            const price = parseInt(priceRaw.replace(/\D/g, ''));
            
            const existing = cart.find(item => item.title === title);
            if (existing) {
                existing.quantity += 1;
            } else {
                cart.push({ title, priceRaw, price, image, quantity: 1 });
            }
            
            saveCart();
            openCartDrawer();
        }

        // Update quantity
        function updateQuantity(title, delta) {
            const item = cart.find(item => item.title === title);
            if (item) {
                item.quantity += delta;
                if (item.quantity <= 0) {
                    cart = cart.filter(i => i.title !== title);
                }
                saveCart();
            }
        }

        // Remove from cart
        function removeFromCart(title) {
            cart = cart.filter(item => item.title !== title);
            saveCart();
        }

        // Clear cart
        function clearCart() {
            cart = [];
            saveCart();
        }

        // Open/Close Drawer
        function toggleCartDrawer() {
            const drawer = document.getElementById('cart-drawer');
            if (drawer.classList.contains('translate-x-full')) {
                openCartDrawer();
            } else {
                closeCartDrawer();
            }
        }

        function openCartDrawer() {
            const drawer = document.getElementById('cart-drawer');
            const backdrop = document.getElementById('cart-backdrop');
            
            drawer.style.display = 'flex';
            backdrop.style.display = 'block';
            setTimeout(() => {
                drawer.classList.remove('translate-x-full');
                backdrop.classList.add('opacity-100');
                backdrop.classList.remove('opacity-0', 'pointer-events-none');
            }, 50);
        }

        function closeCartDrawer() {
            const drawer = document.getElementById('cart-drawer');
            const backdrop = document.getElementById('cart-backdrop');
            
            drawer.classList.add('translate-x-full');
            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0', 'pointer-events-none');
            setTimeout(() => {
                drawer.style.display = 'none';
                backdrop.style.display = 'none';
            }, 300);
        }

        // Update the UI
        function updateCartUI() {
            const container = document.getElementById('cart-items-container');
            const countBadges = document.querySelectorAll('#cart-count-badge');
            const subtotalEl = document.getElementById('cart-subtotal');
            
            // Update badge count
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            countBadges.forEach(badge => {
                badge.innerText = totalItems;
                if (totalItems > 0) {
                    badge.classList.remove('scale-0');
                    badge.classList.add('scale-100');
                } else {
                    badge.classList.remove('scale-100');
                    badge.classList.add('scale-0');
                }
            });
            
            if (!container) return; // If on a page without the HTML loaded yet
            
            // Populate items
            if (cart.length === 0) {
                container.innerHTML = `
                    <div class="h-64 flex flex-col items-center justify-center text-center space-y-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-slate-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <p class="text-xs text-slate-550 font-semibold max-w-[200px]">Your inquiry cart is empty. Add hardware products to request a quote.</p>
                    </div>
                `;
                subtotalEl.innerText = 'TZS 0';
                return;
            }
            
            let subtotal = 0;
            let html = '';
            
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;
                
                // Work out correct image asset source
                const imageSrc = item.image.startsWith('http') ? item.image : `{{ asset('') }}${item.image}`;
                
                html += `
                    <div class="flex gap-4 p-3 bg-slate-950/40 border border-slate-850 rounded-xl relative group">
                        <div class="w-16 h-16 rounded-lg bg-slate-900 border border-slate-800 overflow-hidden shrink-0">
                            <img src="${imageSrc}" alt="${item.title}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-grow flex flex-col justify-between">
                            <div>
                                <h4 class="text-xs font-bold text-white leading-tight">${item.title}</h4>
                                <span class="text-[10px] font-semibold text-blue-500">${item.priceRaw}</span>
                            </div>
                            <div class="flex items-center gap-2 mt-2">
                                <button onclick="updateQuantity('${item.title}', -1)" class="w-6 h-6 bg-slate-900 hover:bg-slate-850 border border-slate-800 text-white font-bold text-xs rounded flex items-center justify-center cursor-pointer">-</button>
                                <span class="text-xs font-bold text-slate-300 w-4 text-center">${item.quantity}</span>
                                <button onclick="updateQuantity('${item.title}', 1)" class="w-6 h-6 bg-slate-900 hover:bg-slate-850 border border-slate-800 text-white font-bold text-xs rounded flex items-center justify-center cursor-pointer">+</button>
                            </div>
                        </div>
                        <button onclick="removeFromCart('${item.title}')" class="absolute top-2 right-2 text-slate-600 hover:text-rose-500 transition-colors cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                `;
            });
            
            container.innerHTML = html;
            subtotalEl.innerText = 'TZS ' + subtotal.toLocaleString('en-US');
        }

        // Checkout redirect
        function checkoutCart() {
            if (cart.length === 0) return;
            
            let message = "Hello, I would like to request a formal quotation for the following hardware products:\n\n";
            let subtotal = 0;
            
            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;
                message += `${index + 1}. ${item.title} x ${item.quantity} (${item.priceRaw} each) = TZS ${itemTotal.toLocaleString('en-US')}\n`;
            });
            
            message += `\nEstimated Total: TZS ${subtotal.toLocaleString('en-US')}\n\n`;
            message += "Please provide availability, shipping details, and a formal quote document. Thank you.";
            
            const redirectUrl = `{{ route('contact.index') }}?service=ICT%20Infrastructure&message=${encodeURIComponent(message)}`;
            
            localStorage.removeItem('reliance_cart');
            cart = [];
            updateCartUI();
            closeCartDrawer();
            
            window.location.href = redirectUrl;
        }

        document.addEventListener('DOMContentLoaded', loadCart);
    </script>

    @php
        $whatsappNumber = setting('whatsapp_number') ?: '255779304500';
        $servicesList = \App\Models\Service::where('is_active', true)
                            ->orderBy('sort_order')
                            ->pluck('title')
                            ->toArray();
        
        $softwareProducts = [
            'Smart Sale',
            'Employee Reference Bureau',
            'Team Track',
            'Reliance Home',
            'Ajira Market'
        ];
        
        $hardwareProducts = [
            'Dell Latitude 5440 Business Laptop',
            'HP LaserJet Pro M404dn Enterprise Printer',
            'Samsung Galaxy S24 Ultra Smartphone',
            'Epson EcoTank L3250 Multi-Function Printer',
            'Lenovo ThinkCentre M70q Tiny Computer'
        ];
        
        $messageLines = [];
        $messageLines[] = "*Hello Reliance Solutions & Technology!*";
        $messageLines[] = "I visited your website and would like to inquire about your services and products.";
        $messageLines[] = "";
        
        if (!empty($servicesList)) {
            $messageLines[] = "*OUR SERVICES:*";
            foreach ($servicesList as $service) {
                $messageLines[] = "• " . $service;
            }
            $messageLines[] = "";
        }
        
        $messageLines[] = "*SOFTWARE PRODUCTS:*";
        foreach ($softwareProducts as $prod) {
            $messageLines[] = "• " . $prod;
        }
        $messageLines[] = "";
        
        $messageLines[] = "*HARDWARE PRODUCTS:*";
        foreach ($hardwareProducts as $prod) {
            $messageLines[] = "• " . $prod;
        }
        $messageLines[] = "";
        $messageLines[] = "Please provide more details on these offerings. Thank you!";
        
        $whatsappText = implode("\n", $messageLines);
        $whatsappCleanNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);
        if (empty($whatsappCleanNumber)) {
            $whatsappCleanNumber = '255779304500';
        }
        $whatsappUrl = "https://wa.me/" . $whatsappCleanNumber . "?text=" . urlencode($whatsappText);
    @endphp

    <!-- Floating WhatsApp Widget -->
    <div class="fixed bottom-6 right-6 lg:bottom-8 lg:right-8 z-50 flex items-center justify-center">
        <!-- Pulsing Aura -->
        <span class="absolute inline-flex h-14 w-14 animate-ping rounded-full bg-emerald-500/30 opacity-75"></span>
        
        <!-- WhatsApp Icon Button -->
        <a href="{{ $whatsappUrl }}" 
           target="_blank" 
           rel="noopener noreferrer"
           class="relative flex items-center justify-center w-14 h-14 bg-emerald-500 hover:bg-emerald-600 text-white rounded-full shadow-2xl shadow-emerald-500/40 hover:shadow-emerald-600/50 border border-emerald-400/30 hover:scale-110 active:scale-95 transition-all duration-300 group"
           aria-label="Chat on WhatsApp"
           title="Inquire about our products and services">
            <!-- Custom SVG WhatsApp Icon -->
            <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.96 9.96 0 0 0 1.333 4.993L2 22l5.13-1.346a9.945 9.945 0 0 0 4.881 1.279h.005c5.505 0 9.988-4.478 9.99-9.985A9.97 9.97 0 0 0 12.012 2zm5.836 14.199c-.3.843-1.545 1.534-2.126 1.63-.58.097-1.126.33-3.697-.688-3.289-1.303-5.385-4.66-5.549-4.882-.164-.222-1.309-1.74-1.309-3.324 0-1.583.821-2.361 1.115-2.678.295-.317.643-.396.857-.396.214 0 .428.002.616.01.196.008.463-.074.726.564.27.656.924 2.257 1.004 2.422.08.164.133.355.026.564-.106.21-.16.339-.317.525-.157.185-.329.412-.47.552-.16.16-.328.333-.142.653.187.32 1.3 2.126 2.784 3.447 1.91 1.7 3.514 2.228 4.013 2.434.5.206.793.176 1.091-.17.298-.344 1.285-1.493 1.629-2.004.343-.51.687-.426 1.157-.25 1.706.637 2.378 1.107 2.756 1.296.377.188.629.28.723.44.094.16.094.924-.206 1.767z"/>
            </svg>
            
            <!-- Custom Premium Slide-out Tooltip -->
            <span class="absolute right-16 top-1/2 -translate-y-1/2 bg-slate-900 text-slate-100 text-xs font-semibold px-3.5 py-2 rounded-xl border border-slate-800 shadow-2xl opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none whitespace-nowrap hidden md:block">
                Inquire via WhatsApp
            </span>
        </a>
    </div>
</body>
</html>
