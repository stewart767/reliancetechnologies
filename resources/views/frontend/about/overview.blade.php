@extends('layouts.app')

@section('seo')
    <x-seo 
        title="Company Overview & B2B Technology Capabilities"
        description="Discover the history, capabilities, and integrated systems engineering of Reliance Solutions & Technology in East Africa."
    />
@endsection

@section('content')
    <!-- 1. ABOUT HERO -->
    <header class="relative bg-slate-900 border-b border-slate-800 pt-36 pb-20 md:pt-48 md:pb-28 overflow-hidden">
        <!-- Decorative grid and glow effects -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(58,134,255,0.03)_1px,transparent_1px),linear-gradient(to_bottom,rgba(58,134,255,0.03)_1px,transparent_1px)] bg-[size:4rem_4rem] pointer-events-none"></div>
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="container relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <span class="inline-flex items-center gap-1.5 bg-blue-500/10 border border-blue-500/20 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider text-blue-600">
                    <span class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-pulse"></span>
                    Corporate Profile
                </span>
                <h1 class="font-title font-extrabold text-4xl sm:text-5xl md:text-6xl text-white leading-tight tracking-tight">
                    Innovating <br class="hidden sm:inline">
                    <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-800 bg-clip-text text-transparent">Integrated Architectures</span>
                </h1>
                <p class="text-slate-400 text-sm sm:text-base md:text-lg leading-relaxed max-w-2xl font-medium">
                    {{ setting('overview_description', 'Reliance Solutions & Technology designs, integrates, and monitors complete IT architectures. We build systems that satisfy enterprise requirements, public directives, and green commercial logistics targets.') }}
                </p>
            </div>
            
            <div class="lg:col-span-5 relative mt-6 lg:mt-0">
                <!-- Stacked background shapes for premium look -->
                <div class="absolute inset-0 bg-gradient-to-tr from-blue-500/10 to-indigo-500/5 rounded-3xl blur-2xl transform rotate-3 -translate-y-2 pointer-events-none"></div>
                <div class="relative rounded-3xl overflow-hidden border border-slate-800 shadow-2xl p-1 bg-slate-900">
                    <img src="{{ Str::startsWith(setting('overview_hero_image', 'images/about/about-hero.jpg'), 'images/') ? asset(setting('overview_hero_image', 'images/about/about-hero.jpg')) : asset('storage/' . setting('overview_hero_image')) }}" alt="Reliance high tech office" class="w-full h-64 sm:h-80 object-cover rounded-[22px] transition-transform duration-500 hover:scale-105">
                    
                    <!-- Floating Stat Badge -->
                    <div class="absolute -bottom-6 -left-6 bg-slate-950/95 backdrop-blur-md border border-slate-800 rounded-2xl p-4 shadow-xl flex items-center gap-3 animate-float">
                        <div class="w-10 h-10 rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-slate-500 text-[9px] font-bold uppercase tracking-wider">Enterprise Standard</span>
                            <strong class="font-title text-white text-xs font-extrabold">100% Reliable Delivery</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- 2. WHO WE ARE & ARCHITECTURE -->
    <section class="py-24 bg-slate-950 border-b border-slate-800/80">
        <div class="container space-y-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <!-- Left: Texts & Mission/Vision -->
                <div class="lg:col-span-7 space-y-8">
                    <x-section-heading 
                        subtitle="Unified Systems Architecture"
                        title="Technology Built Around Your Business"
                        description="Reliance Solutions & Technology was established to resolve a persistent challenge facing organizations in East Africa: fragmented IT deployments."
                        :centered="false"
                    />
                    
                    <div class="space-y-6 text-slate-400 text-sm sm:text-base leading-relaxed font-medium font-sans">
                        <p>
                            Instead of forcing companies to coordinate separate software coders, hardware wire layers, and threat monitoring vendors, we act as a single, unified technology architect.
                        </p>
                        <p>
                            Our engineering teams combine software development, secure database configurations, structured physical wiring, and electric fleet technologies into integrated business solutions. We design for high uptime, clean operations dashboards, and compliance with data rules, positioning your technology as a strategic asset.
                        </p>
                    </div>
                    
                    <!-- Mission & Vision Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-6">
                        <div class="premium-3d-card bg-slate-900 border border-slate-800 rounded-2xl p-6 relative group overflow-hidden">
                            <div class="sheen-effect"></div>
                            <div class="absolute -right-6 -top-6 w-20 h-20 bg-blue-500/5 rounded-full blur-xl group-hover:bg-blue-500/10 transition-colors"></div>
                            <div class="pop-3d space-y-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-500 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A2 2 0 013 15.485V6.757a2 2 0 011.205-1.848l5.5-2.2a2 2 0 011.59 0l5.5 2.2A2 2 0 0118 6.757v8.728a2 2 0 01-1.194 1.822L11 20z"></path></svg>
                                </div>
                                <h3 class="font-title font-extrabold text-white text-lg">Our Mission</h3>
                                <p class="text-xs sm:text-sm leading-relaxed text-slate-400 font-medium">
                                    {{ setting('overview_mission', 'To design and deliver secure, unified, and highly scalable technology architectures that eliminate operational silos, protect organizational data, and enable sustainable commercial growth.') }}
                                </p>
                            </div>
                        </div>

                        <div class="premium-3d-card bg-slate-900 border border-slate-800 rounded-2xl p-6 relative group overflow-hidden">
                            <div class="sheen-effect"></div>
                            <div class="absolute -right-6 -top-6 w-20 h-20 bg-emerald-500/5 rounded-full blur-xl group-hover:bg-emerald-500/10 transition-colors"></div>
                            <div class="pop-3d space-y-4">
                                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </div>
                                <h3 class="font-title font-extrabold text-white text-lg">Our Vision</h3>
                                <p class="text-xs sm:text-sm leading-relaxed text-slate-400 font-medium">
                                    {{ setting('overview_vision', 'To be the region\'s most trusted technology engineering partner, recognized for setting international standards in database integrity, infrastructure reliability, and sustainable energy mobility systems.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right: Side Image & Stats Overlay -->
                <div class="lg:col-span-5 relative">
                    <div class="absolute inset-0 bg-radial-gradient from-blue-500/10 via-transparent to-transparent opacity-60 rounded-3xl blur-2xl transform translate-x-4 translate-y-4 pointer-events-none"></div>
                    <div class="relative rounded-3xl overflow-hidden border border-slate-800 shadow-2xl p-1 bg-slate-900 group">
                        <img src="{{ asset('images/about/who-we-are.jpg') }}" alt="Engineering team integration" class="w-full h-80 lg:h-[450px] object-cover rounded-[22px] transition-transform duration-500 group-hover:scale-[1.02]">
                        
                        <!-- Floating Glass Stats Grid -->
                        <div class="absolute inset-x-6 bottom-6 bg-slate-950/90 backdrop-blur-md border border-slate-800 rounded-2xl p-6 shadow-2xl grid grid-cols-2 gap-4">
                            <div class="text-center border-r border-slate-800/80 last:border-r-0">
                                <span class="block font-title font-extrabold text-2xl text-blue-500">18+</span>
                                <span class="text-[10px] text-slate-450 uppercase font-bold tracking-wider">Years Experience</span>
                            </div>
                            <div class="text-center border-r border-slate-800/80 last:border-r-0">
                                <span class="block font-title font-extrabold text-2xl text-emerald-500">100%</span>
                                <span class="text-[10px] text-slate-450 uppercase font-bold tracking-wider">Audit Success</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Core Technology Lanes Redesign -->
            <div class="pt-16 border-t border-slate-900 space-y-8">
                <div class="text-center max-w-2xl mx-auto space-y-3">
                    <h3 class="font-title font-extrabold text-2xl text-white">Core Technology Lanes</h3>
                    <p class="text-slate-400 text-xs sm:text-sm font-medium">We align specialized hardware and software components into robust ecosystem verticals.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Lane 1 -->
                    <div class="bg-slate-900 border border-slate-850 hover:border-blue-500/20 p-5 rounded-2xl flex gap-4 transition-all duration-300 hover:shadow-lg">
                        <div class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-500 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                        </div>
                        <div class="space-y-1">
                            <strong class="font-title text-white text-sm font-extrabold block">Enterprise Software & APIs</strong>
                            <p class="text-slate-455 text-xs leading-relaxed font-medium">Custom enterprise platforms, API layers, and secure cloud microservices.</p>
                        </div>
                    </div>

                    <!-- Lane 2 -->
                    <div class="bg-slate-900 border border-slate-850 hover:border-blue-500/20 p-5 rounded-2xl flex gap-4 transition-all duration-300 hover:shadow-lg">
                        <div class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-500 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <div class="space-y-1">
                            <strong class="font-title text-white text-sm font-extrabold block">Zero-Trust Cybersecurity</strong>
                            <p class="text-slate-455 text-xs leading-relaxed font-medium">Access controls, threat detection monitoring, and vulnerability mitigation.</p>
                        </div>
                    </div>

                    <!-- Lane 3 -->
                    <div class="bg-slate-900 border border-slate-850 hover:border-blue-500/20 p-5 rounded-2xl flex gap-4 transition-all duration-300 hover:shadow-lg">
                        <div class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-500 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <div class="space-y-1">
                            <strong class="font-title text-white text-sm font-extrabold block">Structured Networking</strong>
                            <p class="text-slate-455 text-xs leading-relaxed font-medium">Professional fiber infrastructure and high-speed copper distribution backbones.</p>
                        </div>
                    </div>

                    <!-- Lane 4 -->
                    <div class="bg-slate-900 border border-slate-850 hover:border-blue-500/20 p-5 rounded-2xl flex gap-4 transition-all duration-300 hover:shadow-lg">
                        <div class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-500 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path></svg>
                        </div>
                        <div class="space-y-1">
                            <strong class="font-title text-white text-sm font-extrabold block">Database Migrations</strong>
                            <p class="text-slate-455 text-xs leading-relaxed font-medium">Secure relational/NoSQL transfers, zero data loss middleware, and sync arrays.</p>
                        </div>
                    </div>

                    <!-- Lane 5 -->
                    <div class="bg-slate-900 border border-slate-850 hover:border-blue-500/20 p-5 rounded-2xl flex gap-4 transition-all duration-300 hover:shadow-lg">
                        <div class="w-10 h-10 rounded-xl bg-blue-500/10 text-blue-500 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div class="space-y-1">
                            <strong class="font-title text-white text-sm font-extrabold block">Industrial Automation</strong>
                            <p class="text-slate-455 text-xs leading-relaxed font-medium">Real-time telemetry feeds, SCADA controls, and remote sensor integration.</p>
                        </div>
                    </div>

                    <!-- Lane 6 -->
                    <div class="bg-slate-900 border border-slate-850 hover:border-emerald-500/20 p-5 rounded-2xl flex gap-4 transition-all duration-300 hover:shadow-lg">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 113.536 0V21h2v-5.46"></path></svg>
                        </div>
                        <div class="space-y-1">
                            <strong class="font-title text-white text-sm font-extrabold block">Electric Tricycle Fleets</strong>
                            <p class="text-slate-455 text-xs leading-relaxed font-medium">YAOYAO Energies solar battery telemetry swap systems and logistics networks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. CORE VALUES -->
    <section class="py-24 bg-slate-900 border-t border-b border-slate-800">
        <div class="container space-y-16">
            <x-section-heading 
                subtitle="Corporate Culture"
                title="Our Core Values"
                description="Six values that frame how our teams write software, configure server rooms, and handle customer data."
            />
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Value 1: Integrity -->
                <div class="premium-3d-card scroll-reveal bg-slate-950 border border-slate-850 rounded-2xl p-8 relative group overflow-hidden">
                    <div class="sheen-effect"></div>
                    <div class="absolute -right-8 -top-8 w-24 h-24 bg-blue-500/5 rounded-full blur-xl group-hover:bg-blue-500/10 transition-colors"></div>
                    <div class="pop-3d space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-blue-500/10 text-blue-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h3 class="font-title font-extrabold text-white text-lg">Integrity</h3>
                        <p class="text-slate-455 text-xs sm:text-sm leading-relaxed font-medium">We represent our capacity accurately, admit system bottlenecks promptly, and safeguard customer data with absolute dedication.</p>
                    </div>
                </div>

                <!-- Value 2: Innovation -->
                <div class="premium-3d-card scroll-reveal bg-slate-950 border border-slate-850 rounded-2xl p-8 relative group overflow-hidden">
                    <div class="sheen-effect"></div>
                    <div class="absolute -right-8 -top-8 w-24 h-24 bg-indigo-500/5 rounded-full blur-xl group-hover:bg-indigo-500/10 transition-colors"></div>
                    <div class="pop-3d space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 text-indigo-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        </div>
                        <h3 class="font-title font-extrabold text-white text-lg">Innovation</h3>
                        <p class="text-slate-455 text-xs sm:text-sm leading-relaxed font-medium">We actively test new frameworks, automation systems, and mobility designs to bring modern technology options to regional operations.</p>
                    </div>
                </div>

                <!-- Value 3: Reliability -->
                <div class="premium-3d-card scroll-reveal bg-slate-950 border border-slate-850 rounded-2xl p-8 relative group overflow-hidden">
                    <div class="sheen-effect"></div>
                    <div class="absolute -right-8 -top-8 w-24 h-24 bg-cyan-500/5 rounded-full blur-xl group-hover:bg-cyan-500/10 transition-colors"></div>
                    <div class="pop-3d space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 text-cyan-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>
                        </div>
                        <h3 class="font-title font-extrabold text-white text-lg">Reliability</h3>
                        <p class="text-slate-455 text-xs sm:text-sm leading-relaxed font-medium">We build redundancy links into physical networks and write software scripts to handle load increases without dropping services.</p>
                    </div>
                </div>

                <!-- Value 4: Excellence -->
                <div class="premium-3d-card scroll-reveal bg-slate-950 border border-slate-850 rounded-2xl p-8 relative group overflow-hidden">
                    <div class="sheen-effect"></div>
                    <div class="absolute -right-8 -top-8 w-24 h-24 bg-emerald-500/5 rounded-full blur-xl group-hover:bg-emerald-500/10 transition-colors"></div>
                    <div class="pop-3d space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                        </div>
                        <h3 class="font-title font-extrabold text-white text-lg">Excellence</h3>
                        <p class="text-slate-455 text-xs sm:text-sm leading-relaxed font-medium">We do not accept messy wiring layouts, unpatched security systems, or software code lacking standard logging indicators.</p>
                    </div>
                </div>

                <!-- Value 5: Customer Focus -->
                <div class="premium-3d-card scroll-reveal bg-slate-950 border border-slate-850 rounded-2xl p-8 relative group overflow-hidden">
                    <div class="sheen-effect"></div>
                    <div class="absolute -right-8 -top-8 w-24 h-24 bg-purple-500/5 rounded-full blur-xl group-hover:bg-purple-500/10 transition-colors"></div>
                    <div class="pop-3d space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-purple-500/10 text-purple-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M17 20H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V18a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="font-title font-extrabold text-white text-lg">Customer Focus</h3>
                        <p class="text-slate-455 text-xs sm:text-sm leading-relaxed font-medium">We design technology around actual operator processes and write instructions to match customer team operations.</p>
                    </div>
                </div>

                <!-- Value 6: Security Centric -->
                <div class="premium-3d-card scroll-reveal bg-slate-950 border border-slate-850 rounded-2xl p-8 relative group overflow-hidden">
                    <div class="sheen-effect"></div>
                    <div class="absolute -right-8 -top-8 w-24 h-24 bg-rose-500/5 rounded-full blur-xl group-hover:bg-rose-500/10 transition-colors"></div>
                    <div class="pop-3d space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-rose-500/10 text-rose-500 flex items-center justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <h3 class="font-title font-extrabold text-white text-lg">Security Centric</h3>
                        <p class="text-slate-455 text-xs sm:text-sm leading-relaxed font-medium">We consider threats at every layer, implementing firewalls, identity access tokens, and backup arrays by default.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. INTEGRATION FLOW CHART / ECOSYSTEM -->
    <section class="py-24 bg-slate-950 border-b border-slate-800/80">
        <div class="container space-y-16">
            <x-section-heading 
                subtitle="Unified Architecture"
                title="Our Technology Ecosystem"
                description="How our technology systems connect to turn basic wiring into automated intelligent operations."
            />
            
            <div class="relative max-w-5xl mx-auto">
                <!-- Circuit Path background line for desktops -->
                <div class="hidden lg:block absolute top-[62px] left-[10%] right-[10%] h-0.5 bg-gradient-to-r from-blue-500/20 via-cyan-400/40 to-blue-500/20 pointer-events-none z-0"></div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8 relative z-10">
                    <!-- Step 1 -->
                    <div class="bg-slate-900 border border-slate-850 hover:border-blue-500/20 p-6 rounded-2xl text-center flex flex-col items-center space-y-4 group transition-all duration-300 hover:-translate-y-1 shadow-md">
                        <div class="relative">
                            <span class="absolute -top-2 -right-2 bg-blue-500 text-slate-955 text-[10px] font-extrabold w-5 h-5 rounded-full flex items-center justify-center shadow-lg">01</span>
                            <div class="w-16 h-16 rounded-2xl bg-blue-500/10 text-blue-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <strong class="font-title text-white text-sm font-extrabold block">Hardware</strong>
                            <span class="text-[10px] text-blue-500 font-bold uppercase tracking-wider block">ICT Infrastructure</span>
                            <p class="text-slate-455 text-[11px] leading-relaxed font-medium font-sans">Deploying secure physical racks, high-grade structured cabling, and network points.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="bg-slate-900 border border-slate-850 hover:border-blue-500/20 p-6 rounded-2xl text-center flex flex-col items-center space-y-4 group transition-all duration-300 hover:-translate-y-1 shadow-md">
                        <div class="relative">
                            <span class="absolute -top-2 -right-2 bg-blue-500 text-slate-955 text-[10px] font-extrabold w-5 h-5 rounded-full flex items-center justify-center shadow-lg">02</span>
                            <div class="w-16 h-16 rounded-2xl bg-blue-500/10 text-blue-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <strong class="font-title text-white text-sm font-extrabold block">Interface</strong>
                            <span class="text-[10px] text-blue-500 font-bold uppercase tracking-wider block">Software & APIs</span>
                            <p class="text-slate-455 text-[11px] leading-relaxed font-medium font-sans">Developing software applications and microservice interfaces to communicate with local hardware.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="bg-slate-900 border border-slate-850 hover:border-blue-500/20 p-6 rounded-2xl text-center flex flex-col items-center space-y-4 group transition-all duration-300 hover:-translate-y-1 shadow-md">
                        <div class="relative">
                            <span class="absolute -top-2 -right-2 bg-blue-500 text-slate-955 text-[10px] font-extrabold w-5 h-5 rounded-full flex items-center justify-center shadow-lg">03</span>
                            <div class="w-16 h-16 rounded-2xl bg-blue-500/10 text-blue-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <strong class="font-title text-white text-sm font-extrabold block">Security</strong>
                            <span class="text-[10px] text-blue-500 font-bold uppercase tracking-wider block">Cybersecurity</span>
                            <p class="text-slate-455 text-[11px] leading-relaxed font-medium font-sans">Securing access tokens and placing threat telemetry overlay blocks to lock down vulnerabilities.</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="bg-slate-900 border border-slate-850 hover:border-blue-500/20 p-6 rounded-2xl text-center flex flex-col items-center space-y-4 group transition-all duration-300 hover:-translate-y-1 shadow-md">
                        <div class="relative">
                            <span class="absolute -top-2 -right-2 bg-blue-500 text-slate-955 text-[10px] font-extrabold w-5 h-5 rounded-full flex items-center justify-center shadow-lg">04</span>
                            <div class="w-16 h-16 rounded-2xl bg-blue-500/10 text-blue-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 7.89M9 11l3 3L22 4"></path></svg>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <strong class="font-title text-white text-sm font-extrabold block">Sync</strong>
                            <span class="text-[10px] text-blue-500 font-bold uppercase tracking-wider block">Systems Integration</span>
                            <p class="text-slate-455 text-[11px] leading-relaxed font-medium font-sans">Aligning databases, middleware pipelines, and third-party dashboards to synchronize feeds.</p>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="bg-slate-900 border border-slate-850 hover:border-blue-500/20 p-6 rounded-2xl text-center flex flex-col items-center space-y-4 group transition-all duration-300 hover:-translate-y-1 shadow-md">
                        <div class="relative">
                            <span class="absolute -top-2 -right-2 bg-blue-500 text-slate-955 text-[10px] font-extrabold w-5 h-5 rounded-full flex items-center justify-center shadow-lg">05</span>
                            <div class="w-16 h-16 rounded-2xl bg-blue-500/10 text-blue-500 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364.364l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 113.536 0V21h2v-5.46"></path></svg>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <strong class="font-title text-white text-sm font-extrabold block">Intelligence</strong>
                            <span class="text-[10px] text-blue-500 font-bold uppercase tracking-wider block">AI & Automation</span>
                            <p class="text-slate-455 text-[11px] leading-relaxed font-medium font-sans">Triggering automated scripts, telemetry metrics analysis, and smart reporting dashboards.</p>
                        </div>
                    </div>
                </div>
                
                <p class="text-center text-slate-400 text-xs sm:text-sm mt-12 leading-relaxed max-w-2xl mx-auto relative z-10 font-medium">
                    By mastering the complete pipeline, we ensure that physical layouts (wires and servers) support interface code, protected by zero-trust cybersecurity overlays, and automated via custom integration engines.
                </p>
            </div>
        </div>
    </section>

    <!-- 5. Bottom CTA -->
    <section class="pb-24 bg-slate-955">
        <div class="container">
            <x-cta-banner 
                title="Ready to align your systems technology?"
                description="Discuss your project parameters with our engineering team to get a technical feasibility analysis or schedule a physical site audit."
                buttonText="Talk to an Expert"
            />
        </div>
    </section>
@endsection
