@extends('layouts.app')

@section('seo')
    <x-seo 
        title="YAOYAO Energies - Commercial Electric Cargo Tricycles"
        description="Discover YAOYAO Energies Electric Tricycles. Sustainable, low-maintenance cargo transport units engineered for commercial fleets and last-mile logistics."
    />
@endsection

@section('content')
    <!-- PRODUCT HERO -->
    <header class="relative bg-slate-950 border-b border-slate-800/80 pt-36 pb-24 md:pt-48 md:pb-32 overflow-hidden flex items-center min-h-[90vh]">
        <div class="absolute inset-0 bg-radial-gradient from-emerald-500/5 via-transparent to-transparent z-10 pointer-events-none"></div>
        
        <div class="container relative z-20 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-6">
                <span class="inline-flex items-center bg-emerald-500/10 border border-emerald-500/20 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider text-emerald-400">
                    Green Mobility Division
                </span>
                <h1 class="font-title font-extrabold text-4xl sm:text-5xl text-white leading-tight">
                    {{ setting('yaoyao_hero_heading', 'YAOYAO Energies Electric Tricycles.') }}
                </h1>
                <p class="text-slate-400 text-sm sm:text-base leading-relaxed">
                    {{ setting('yaoyao_hero_description', 'Engineering green commercial transportation. YAOYAO Energies designs rugged, heavy-duty electric cargo tricycles configured to lower fleet costs, reduce carbon footprints, and simplify last-mile logistics.') }}
                </p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="#inquiry" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-3.5 rounded-lg transition-all shadow-lg hover:shadow-emerald-500/20 cursor-pointer">
                        Request Product Quote
                    </a>
                    <a href="#specs" class="bg-transparent hover:bg-slate-900 border border-slate-700 hover:border-slate-500 text-white font-semibold px-6 py-3 rounded-lg transition-all cursor-pointer">
                        View Specifications
                    </a>
                </div>
            </div>
            
            <div class="relative">
                <div class="rounded-3xl overflow-hidden border border-slate-800 shadow-2xl">
                    <img src="{{ Str::startsWith(setting('yaoyao_hero_image', 'images/yaoyao/electric-tricycle.jpg'), 'images/') ? asset(setting('yaoyao_hero_image', 'images/yaoyao/electric-tricycle.jpg')) : asset('storage/' . setting('yaoyao_hero_image')) }}" alt="YAOYAO Electric Cargo Tricycle" class="w-full h-auto object-cover">
                </div>
            </div>
        </div>
    </header>

    <!-- KEY ADVANTAGES -->
    <section class="py-24 bg-slate-950 border-b border-slate-800/80">
        <div class="container space-y-16">
            <x-section-heading 
                subtitle="Operational Benefits"
                title="The Future of Fleet Operations"
                description="YAOYAO Energies Tricycles are configured to resolve delivery delays and high maintenance overheads for commercial teams."
                color="emerald"
            />
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="premium-3d-card card-emerald scroll-reveal bg-slate-900/50 border border-slate-800/80 rounded-2xl p-8 flex gap-4">
                    <span class="pop-3d text-emerald-500 mt-1 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22.4 12.8h-9v9h9v-9zM1.6 1.6h9v9h-9v-9zM12.8 1.6h9v9h-9v-9zM1.6 12.8h9v9h-9v-9z"></path></svg>
                    </span>
                    <div class="pop-3d space-y-2">
                        <h3 class="font-title font-bold text-white text-lg">Custom Cargo Containers</h3>
                        <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">Configure your units with insulated cargo boxes for fresh foods, dry cargo bays, open flatbed trays, or locking security doors.</p>
                    </div>
                </div>

                <div class="premium-3d-card card-emerald scroll-reveal bg-slate-900/50 border border-slate-800/80 rounded-2xl p-8 flex gap-4">
                    <span class="pop-3d text-emerald-500 mt-1 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M23 12a11 11 0 1 1-22 0 11 11 0 0 1 22 0z"></path><path d="M12 7v5l3 3"></path></svg>
                    </span>
                    <div class="pop-3d space-y-2">
                        <h3 class="font-title font-bold text-white text-lg">Low Maintenance Overhead</h3>
                        <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">By eliminating combustion engines, oil systems, and gears, our electric drivetrains cut standard fleet maintenance costs by up to 50%.</p>
                    </div>
                </div>

                <div class="premium-3d-card card-emerald scroll-reveal bg-slate-900/50 border border-slate-800/80 rounded-2xl p-8 flex gap-4">
                    <span class="pop-3d text-emerald-500 mt-1 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4.5a4.5 4.5 0 0 1 9 0v15a4.5 4.5 0 0 1-9 0v-15zM4 8.5a4.5 4.5 0 0 1 9 0v7a4.5 4.5 0 0 1-9 0v-7z"></path></svg>
                    </span>
                    <div class="pop-3d space-y-2">
                        <h3 class="font-title font-bold text-white text-lg">Fleet Telemetry Systems</h3>
                        <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">Units sync with fleet routing platforms, enabling dispatchers to track battery status, speed levels, and locations in real-time.</p>
                    </div>
                </div>

                <div class="premium-3d-card card-emerald scroll-reveal bg-slate-900/50 border border-slate-800/80 rounded-2xl p-8 flex gap-4">
                    <span class="pop-3d text-emerald-500 mt-1 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"></path></svg>
                    </span>
                    <div class="pop-3d space-y-2">
                        <h3 class="font-title font-bold text-white text-lg">Fast Battery Swaps</h3>
                        <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">Designed with modular battery trays, operators can swap a flat battery pack for a fully charged unit in under 5 minutes to keep moving.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TECHNICAL SPECIFICATIONS -->
    <section class="py-24 bg-slate-900 border-b border-slate-800/80" id="specs">
        <div class="container space-y-16">
            <x-section-heading 
                subtitle="Chassis Details"
                title="Technical Specifications"
                description="Review typical physical capacities. Specific details can be modified during fleet procurement."
                color="emerald"
            />
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                @foreach($specs as $group_title => $group_data)
                    <div class="premium-3d-card card-emerald scroll-reveal bg-slate-900/40 border border-slate-800/85 rounded-2xl overflow-hidden shadow-lg">
                        <div class="pop-3d">
                            <h3 class="font-title font-bold text-white text-sm uppercase tracking-wider bg-slate-900/90 border-b border-slate-800/80 px-6 py-4">{{ $group_title }}</h3>
                            <table class="w-full text-xs sm:text-sm text-left">
                                <tbody class="divide-y divide-slate-800/60">
                                    @foreach($group_data as $key => $val)
                                        <tr>
                                            <td class="px-6 py-4 font-semibold text-slate-350 w-1/3">{{ $key }}</td>
                                            <td class="px-6 py-4 text-slate-450">{{ $val }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    @if($faqs->count() > 0)
        <section class="py-24 bg-slate-950 border-b border-slate-800/80">
            <div class="container space-y-16">
                <x-section-heading 
                    subtitle="Mobility Q&A"
                    title="Frequently Asked Questions"
                    description="Find quick answers to battery swapping cycles, fleet telemetry configurations, and cargo box ratings."
                    color="emerald"
                />
                
                <x-faq-accordion :faqs="$faqs" />
            </div>
        </section>
    @endif

    <!-- INQUIRY FORM SECTION -->
    <section class="py-24 bg-slate-900 border-t border-slate-800" id="inquiry">
        <div class="container grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 space-y-6">
                <span class="font-title font-bold text-xs uppercase tracking-widest text-emerald-400">Request Quote</span>
                <h2 class="font-title font-extrabold text-3xl text-white">Commercial Fleet Procurement</h2>
                <p class="text-slate-400 text-sm sm:text-base leading-relaxed">
                    Coordinate with our green mobility engineers to discuss vehicle dimensions, request pricing for bulk orders, or customize battery swap programs for your logistics fleets.
                </p>
                <div class="space-y-3 text-xs text-slate-400 border-l border-emerald-500/20 pl-4">
                    <p>&bull; Insulated and dry cargo configuration consultations.</p>
                    <p>&bull; Battery capacity upgrades to match specific delivery ranges.</p>
                    <p>&bull; Dedicated local replacement parts supply guarantees.</p>
                </div>
            </div>
            
            <div class="lg:col-span-7">
                <div class="bg-slate-950 border border-slate-850 rounded-2xl p-6 md:p-8 shadow-xl">
                    <x-contact-form :selectedService="'YAOYAO Energies'" />
                </div>
            </div>
        </div>
    </section>
@endsection
