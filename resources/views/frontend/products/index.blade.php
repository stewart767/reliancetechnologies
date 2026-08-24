@extends('layouts.app')

@section('seo')
    <x-seo 
        title="Enterprise Software Products & ICT Hardware Catalog"
        description="Explore our high-performance software suites (ERP, CRM, POS) and premium enterprise-grade IT hardware (servers, networking arrays, firewalls, and access control)."
    />
@endsection

@section('content')
    <!-- 1. HERO -->
    <header class="relative bg-slate-900 border-b border-slate-800 pt-36 pb-20 md:pt-48 md:pb-28 overflow-hidden">
        <!-- Grid pattern overlay -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(58,134,255,0.02)_1px,transparent_1px),linear-gradient(to_bottom,rgba(58,134,255,0.02)_1px,transparent_1px)] bg-[size:4rem_4rem] pointer-events-none"></div>
        <div class="absolute inset-0 bg-radial-gradient from-blue-500/5 via-transparent to-transparent pointer-events-none"></div>
        
        <div class="container relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <span class="inline-flex items-center gap-1.5 bg-blue-500/10 border border-blue-500/20 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider text-blue-600">
                    Product Solutions Catalog
                </span>
                <h1 class="font-title font-extrabold text-4xl sm:text-5xl text-white leading-tight tracking-tight">
                    Enterprise Software & <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-800 bg-clip-text text-transparent">Infrastructure Hardware</span>
                </h1>
                <p class="text-slate-400 text-sm sm:text-base md:text-lg leading-relaxed max-w-2xl font-medium font-sans">
                    We engineer enterprise systems and supply premium technical infrastructure to keep your business operating securely at scale.
                </p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <button onclick="filterCatalog('software', true)" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-6 py-3.5 rounded-lg transition-all shadow-lg hover:shadow-blue-500/10 hover:-translate-y-0.5 cursor-pointer">
                        Software Products
                    </button>
                    <button onclick="filterCatalog('hardware', true)" class="bg-slate-950/60 backdrop-blur-md hover:bg-slate-900 border border-slate-800 hover:border-slate-700 text-white font-semibold text-xs px-6 py-3.5 rounded-lg transition-all hover:-translate-y-0.5 cursor-pointer">
                        Hardware & Infrastructure
                    </button>
                </div>
            </div>
            
            <div class="lg:col-span-5 relative mt-6 lg:mt-0">
                <div class="bg-gradient-to-br from-blue-500/10 to-transparent p-1 border border-slate-800 rounded-3xl relative overflow-hidden shadow-2xl">
                    <div class="absolute -right-16 -top-16 w-32 h-32 bg-blue-500/10 rounded-full blur-xl"></div>
                    <div class="bg-slate-950/90 backdrop-blur-md rounded-[22px] p-8 md:p-10 space-y-4">
                        <span class="inline-block bg-blue-500/10 border border-blue-500/20 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider text-blue-600">
                            Partner Standards
                        </span>
                        <h3 class="font-title font-extrabold text-white text-lg">Direct OEM Sourcing</h3>
                        <p class="text-xs sm:text-sm text-slate-400 leading-relaxed font-medium font-sans">
                            By working directly with international technology hardware manufacturers, we guarantee certified products, official warranty coverage, and long-term parts availability.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- 1.5 PRODUCT CATALOG CATEGORY SWITCHER -->
    <div id="catalog-section" class="scroll-mt-24 bg-slate-950 border-b border-slate-900/50 py-10 relative z-20">
        <div class="container flex flex-col items-center space-y-4">
            <span class="text-slate-400 text-xs font-bold uppercase tracking-widest">Choose Category</span>
            <div class="inline-flex p-1.5 bg-slate-900/90 backdrop-blur-md border border-slate-800/80 rounded-2xl shadow-xl">
                <button onclick="filterCatalog('all')" id="btn-filter-all" class="filter-btn active text-white font-bold text-xs px-6 py-3 rounded-xl transition-all cursor-pointer bg-blue-600 shadow-md shadow-blue-500/20">
                    All Solutions
                </button>
                <button onclick="filterCatalog('software')" id="btn-filter-software" class="filter-btn text-slate-400 hover:text-white font-semibold text-xs px-6 py-3 rounded-xl transition-all cursor-pointer">
                    Software Products
                </button>
                <button onclick="filterCatalog('hardware')" id="btn-filter-hardware" class="filter-btn text-slate-400 hover:text-white font-semibold text-xs px-6 py-3 rounded-xl transition-all cursor-pointer">
                    Hardware Products
                </button>
            </div>
        </div>
    </div>

    <!-- 2. SOFTWARE PRODUCTS SECTION -->
    <section class="py-24 bg-slate-955 border-b border-slate-800/80 product-section" id="software">
        <div class="container space-y-16">
            <x-section-heading 
                subtitle="High-Performance Systems"
                title="B2B Software Products"
                description="Custom-built database systems, POS platforms, school management tools, and HR suites engineered for Tanzanian tax compliance and operational scale."
            />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($softwareProducts as $product)
                    <div class="bg-slate-900 border border-slate-850 hover:border-blue-500/20 rounded-2xl p-8 relative group flex flex-col justify-between shadow-lg">
                        <div class="absolute -right-8 -top-8 w-24 h-24 bg-blue-500/5 rounded-full blur-xl group-hover:bg-blue-500/10 transition-colors"></div>
                        
                        <div class="space-y-6">
                            @if(isset($product['image']))
                                <div class="w-full h-48 overflow-hidden rounded-xl bg-slate-950 border border-slate-800/80 relative mb-6 shrink-0 shadow-inner">
                                    <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent pointer-events-none"></div>
                                </div>
                            @endif
                            <!-- Header -->
                            <div class="flex items-center justify-between gap-4">
                                <div class="w-12 h-12 bg-blue-500/10 text-blue-500 rounded-2xl flex items-center justify-center shrink-0 shadow-inner group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                                    {!! $product['icon'] !!}
                                </div>
                                <span class="inline-flex items-center gap-1 bg-blue-500/10 border border-blue-500/20 px-2.5 py-1 rounded-full text-[9px] font-bold text-blue-500 uppercase tracking-wider">
                                    Enterprise Suite
                                </span>
                            </div>

                            <!-- Body -->
                            <div class="space-y-4">
                                <h3 class="font-title font-extrabold text-white text-lg group-hover:text-blue-500 transition-colors block">{{ $product['title'] }}</h3>
                                <p class="text-slate-400 text-xs sm:text-sm leading-relaxed font-medium font-sans">
                                    {{ $product['description'] }}
                                </p>
                                
                                <div class="pt-2">
                                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-2">Core Features</h4>
                                    <ul class="space-y-1.5 text-xs text-slate-450 font-medium font-sans">
                                        @foreach($product['features'] as $feature)
                                            <li class="flex items-center gap-2">
                                                <svg class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                                                {{ $feature }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Footer CTA -->
                        <div class="pt-6 border-t border-slate-800/60 mt-6 grid grid-cols-2 gap-3">
                            <a href="{{ route('contact.index', ['service' => $product['title'], 'action' => 'buy']) }}" class="text-center bg-blue-600 hover:bg-blue-700 text-white font-bold text-[11px] px-3 py-2.5 rounded-lg transition-all shadow-md hover:shadow-blue-500/10 cursor-pointer">
                                Buy Now
                            </a>
                            <a href="{{ route('contact.index', ['service' => $product['title'], 'action' => 'request']) }}" class="text-center border border-slate-800 hover:border-slate-750 text-slate-400 hover:text-white font-semibold text-[11px] px-3 py-2.5 rounded-lg transition-all cursor-pointer bg-slate-950/40">
                                Request Demo
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 3. HARDWARE PRODUCTS SECTION -->
    <section class="py-24 bg-slate-900 border-b border-slate-950 product-section" id="hardware">
        <div class="container space-y-16">
            <x-section-heading 
                subtitle="Retail Hardware Solutions"
                title="Computers, Printers &amp; Smartphones"
                description="Acquire certified computer systems, enterprise office printers, and smart productivity endpoints with transparent pricing."
            />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($hardwareProducts as $product)
                    <div class="bg-slate-955 border border-slate-800/80 hover:border-blue-500/25 rounded-2xl p-8 relative group flex flex-col justify-between shadow-xl">
                        <div class="absolute -right-8 -top-8 w-24 h-24 bg-blue-500/5 rounded-full blur-xl group-hover:bg-blue-500/10 transition-colors"></div>
                        
                        <div class="space-y-6">
                            @if(isset($product['image']))
                                <div class="w-full h-48 overflow-hidden rounded-xl bg-slate-950 border border-slate-800/80 relative mb-6 shrink-0 shadow-inner">
                                    <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-transparent pointer-events-none"></div>
                                </div>
                            @endif
                            <!-- Header -->
                            <div class="flex items-center justify-between gap-4">
                                <div class="w-12 h-12 bg-blue-500/10 text-blue-500 rounded-2xl flex items-center justify-center shrink-0 shadow-inner group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                                    {!! $product['icon'] !!}
                                </div>
                                <span class="inline-flex items-center gap-1 bg-emerald-500/10 border border-emerald-500/20 px-2.5 py-1 rounded-full text-[9px] font-bold text-emerald-600 uppercase tracking-wider">
                                    Hardware Catalog
                                </span>
                            </div>

                            <!-- Body -->
                            <div class="space-y-4">
                                <div class="flex justify-between items-start gap-4">
                                    <h3 class="font-title font-extrabold text-white text-[15px] sm:text-base group-hover:text-blue-500 transition-colors block leading-tight flex-grow">{{ $product['title'] }}</h3>
                                    <span class="text-xs font-bold text-blue-400 bg-blue-500/10 border border-blue-500/20 px-2 py-0.5 rounded-md shrink-0">{{ $product['price'] }}</span>
                                </div>
                                <p class="text-slate-400 text-xs sm:text-sm leading-relaxed font-medium font-sans">
                                    {{ $product['description'] }}
                                </p>
                                
                                @if(isset($product['specs']))
                                <div class="pt-2">
                                    <span class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider mb-2">Specifications</span>
                                    <ul class="space-y-1.5 text-xs text-slate-400 font-medium font-sans">
                                        @foreach($product['specs'] as $spec)
                                            <li class="flex items-start gap-2">
                                                <svg class="w-3.5 h-3.5 text-blue-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                                                {{ $spec }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Footer CTA -->
                        <div class="pt-6 border-t border-slate-850 mt-6 grid grid-cols-2 gap-3">
                            <button onclick="addToCart('{{ $product['title'] }}', '{{ $product['price'] }}', '{{ $product['image'] }}')" class="text-center bg-blue-600 hover:bg-blue-700 text-white font-bold text-[11px] px-3 py-2.5 rounded-lg transition-all shadow-md hover:shadow-blue-500/10 cursor-pointer flex items-center justify-center gap-1.5 border-0 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                                Add to Cart
                            </button>
                            <a href="{{ route('contact.index', ['service' => $product['title'], 'action' => 'request']) }}" class="text-center border border-slate-800 hover:border-slate-750 text-slate-400 hover:text-white font-semibold text-[11px] px-3 py-2.5 rounded-lg transition-all cursor-pointer bg-slate-950/40">
                                Request Info
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 4. CTA BANNER -->
    <section class="py-24 bg-slate-950 border-t border-b border-slate-900">
        <div class="container text-center max-w-3xl space-y-6">
            <h2 class="font-title font-extrabold text-3xl text-white">Have Specific Hardware or Software Needs?</h2>
            <p class="text-slate-400 text-sm leading-relaxed max-w-2xl mx-auto font-medium font-sans">
                Our engineering team develops customized system middleware, sets up hybrid server virtualization, audits structured cabling parameters, and sources authorized OEM equipment. Let's discuss your requirements.
            </p>
            <div class="pt-4">
                <a href="{{ route('contact.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-6 py-3.5 rounded-lg transition-all shadow-lg hover:shadow-blue-500/10 cursor-pointer hover:-translate-y-0.5 inline-block">
                    Talk to an Expert
                </a>
            </div>
        </div>
    </section>

    <style>
        .product-section {
            transition: opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1), transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform-origin: top center;
        }
    </style>

    <script>
        function filterCatalog(category, shouldScroll = false) {
            const softwareSec = document.getElementById('software');
            const hardwareSec = document.getElementById('hardware');
            const buttons = document.querySelectorAll('.filter-btn');
            
            // 1. Reset active classes on filter buttons
            buttons.forEach(btn => {
                btn.classList.remove('active', 'text-white', 'font-bold', 'bg-blue-600', 'shadow-md', 'shadow-blue-500/20');
                btn.classList.add('text-slate-400', 'font-semibold');
            });
            
            // 2. Set active button style
            const activeBtn = document.getElementById('btn-filter-' + category);
            if (activeBtn) {
                activeBtn.classList.add('active', 'text-white', 'font-bold', 'bg-blue-600', 'shadow-md', 'shadow-blue-500/20');
                activeBtn.classList.remove('text-slate-400', 'font-semibold');
            }
            
            // 3. Handle visibility transitions
            if (category === 'all') {
                softwareSec.style.display = 'block';
                hardwareSec.style.display = 'block';
                // Trigger reflow for animation
                void softwareSec.offsetHeight;
                void hardwareSec.offsetHeight;
                
                softwareSec.style.opacity = '1';
                softwareSec.style.transform = 'scale(1)';
                hardwareSec.style.opacity = '1';
                hardwareSec.style.transform = 'scale(1)';
            } else if (category === 'software') {
                hardwareSec.style.opacity = '0';
                hardwareSec.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    hardwareSec.style.display = 'none';
                    softwareSec.style.display = 'block';
                    // Trigger reflow
                    void softwareSec.offsetHeight;
                    
                    softwareSec.style.opacity = '1';
                    softwareSec.style.transform = 'scale(1)';
                }, 300);
            } else if (category === 'hardware') {
                softwareSec.style.opacity = '0';
                softwareSec.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    softwareSec.style.display = 'none';
                    hardwareSec.style.display = 'block';
                    // Trigger reflow
                    void hardwareSec.offsetHeight;
                    
                    hardwareSec.style.opacity = '1';
                    hardwareSec.style.transform = 'scale(1)';
                }, 300);
            }
            
            // 4. Smooth scroll to section if triggered from Hero
            if (shouldScroll) {
                const target = document.getElementById('catalog-section');
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        }
    </script>
@endsection
