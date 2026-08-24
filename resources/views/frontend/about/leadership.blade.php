@extends('layouts.app')

@section('seo')
    <x-seo 
        title="Executive Leadership & Management Team"
        description="Meet the management steering technology deployments, green energy initiatives, and secure integrations in East Africa."
    />
@endsection

@section('content')
    <!-- 1. HERO -->
    <header class="relative bg-slate-900 border-b border-slate-800 pt-36 pb-20 md:pt-48 md:pb-28 overflow-hidden">
        <!-- Grid overlay -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(58,134,255,0.02)_1px,transparent_1px),linear-gradient(to_bottom,rgba(58,134,255,0.02)_1px,transparent_1px)] bg-[size:4rem_4rem] pointer-events-none"></div>
        <div class="absolute inset-0 bg-radial-gradient from-blue-500/5 via-transparent to-transparent pointer-events-none"></div>
        
        <div class="container relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <span class="inline-flex items-center gap-1.5 bg-blue-500/10 border border-blue-500/20 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider text-blue-600">
                    Board & Executive Management
                </span>
                <h1 class="font-title font-extrabold text-4xl sm:text-5xl text-white leading-tight tracking-tight">
                    Our <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-800 bg-clip-text text-transparent">Leadership Team</span>
                </h1>
                <p class="text-slate-400 text-sm sm:text-base md:text-lg leading-relaxed max-w-2xl font-medium font-sans">
                    Our managing board combines years of international IT engineering experience and local business insight to steer projects successfully.
                </p>
            </div>
            
            <div class="lg:col-span-5 relative mt-6 lg:mt-0">
                <div class="bg-gradient-to-br from-blue-500/10 to-transparent p-1 border border-slate-800 rounded-3xl relative overflow-hidden shadow-2xl">
                    <div class="absolute -right-16 -top-16 w-32 h-32 bg-blue-500/10 rounded-full blur-xl"></div>
                    <div class="bg-slate-950/90 backdrop-blur-md rounded-[22px] p-8 md:p-10 space-y-6 relative z-10">
                        <span class="inline-flex bg-blue-500/10 border border-blue-500/20 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider text-blue-600">
                            Governance Standards
                        </span>
                        <h3 class="font-title font-extrabold text-white text-xl">Guiding Complex Integrations</h3>
                        <p class="text-xs sm:text-sm text-slate-400 leading-relaxed font-medium">
                            Our leaders emphasize strict engineering methodologies, zero-trust protocols, client confidentiality, and environmental responsibility across all operations.
                        </p>
                        <div class="grid grid-cols-2 gap-4 pt-4 border-t border-slate-850 text-center">
                            <div>
                                <span class="block font-title font-extrabold text-2xl text-blue-500">45+ Yrs</span>
                                <span class="text-[9px] text-slate-450 uppercase font-bold tracking-wider">Combined Experience</span>
                            </div>
                            <div>
                                <span class="block font-title font-extrabold text-2xl text-emerald-500">100%</span>
                                <span class="text-[9px] text-slate-455 uppercase font-bold tracking-wider">Regional Compliance</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- 2. LEADERS LIST -->
    <section class="py-24 bg-slate-950 border-b border-slate-800/80">
        <div class="container space-y-16">
            <x-section-heading 
                subtitle="Executive Directors"
                title="Steering Our Engineering Vision"
                description="Meet the core directors managing our engineering pipelines, strategic partnerships, and regional compliance structures."
            />

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
                @forelse($leaders as $leader)
                    <div class="premium-3d-card scroll-reveal bg-slate-900 border border-slate-850 rounded-2xl p-8 flex flex-col sm:flex-row gap-6 items-start relative overflow-hidden group shadow-lg">
                        <div class="sheen-effect"></div>
                        <div class="absolute -right-8 -top-8 w-24 h-24 bg-blue-500/5 rounded-full blur-xl group-hover:bg-blue-500/10 transition-colors"></div>
                        
                        <!-- Avatar Shield -->
                        <div class="pop-3d w-28 h-28 rounded-2xl bg-slate-950 border border-slate-800 flex items-center justify-center shrink-0 shadow-inner relative z-10 overflow-hidden ring-4 ring-slate-900/50 group-hover:ring-blue-500/20 transition-all duration-300">
                            @if($leader->avatar)
                                <img src="{{ asset('storage/' . $leader->avatar) }}" alt="{{ $leader->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                @php
                                    $fallbackIcon = '<svg class="w-12 h-12 text-slate-400 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>';
                                    $bgAccent = 'bg-blue-500/5';
                                    if (Str::contains($leader->name, 'Ahmed')) {
                                        $fallbackIcon = '<svg class="w-12 h-12 text-indigo-500 group-hover:text-indigo-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>';
                                        $bgAccent = 'bg-indigo-500/5';
                                    } elseif (Str::contains($leader->name, 'Elizabeth')) {
                                        $fallbackIcon = '<svg class="w-12 h-12 text-cyan-500 group-hover:text-cyan-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>';
                                        $bgAccent = 'bg-cyan-500/5';
                                    } elseif (Str::contains($leader->name, 'Emmanuel')) {
                                        $fallbackIcon = '<svg class="w-12 h-12 text-emerald-500 group-hover:text-emerald-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>';
                                        $bgAccent = 'bg-emerald-500/5';
                                    } elseif (Str::contains($leader->name, 'Joseph')) {
                                        $fallbackIcon = '<svg class="w-12 h-12 text-blue-500 group-hover:text-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>';
                                        $bgAccent = 'bg-blue-500/5';
                                    }
                                @endphp
                                <div class="absolute inset-0 {{ $bgAccent }} transition-opacity duration-300"></div>
                                {!! $fallbackIcon !!}
                            @endif
                        </div>

                        <!-- Card details -->
                        <div class="pop-3d flex-grow space-y-4 relative z-10">
                            <div>
                                <h3 class="font-title font-extrabold text-white text-xl group-hover:text-blue-500 transition-colors block">{{ $leader->name }}</h3>
                                <span class="text-xs text-blue-500 font-bold uppercase tracking-wider block mt-0.5">{{ $leader->role }}</span>
                            </div>
                            
                            <p class="text-slate-400 text-xs sm:text-sm leading-relaxed font-medium font-sans">
                                {{ $leader->bio }}
                            </p>
                            
                            <!-- Badges & Social Links row -->
                            <div class="flex flex-wrap items-center justify-between gap-4 pt-3 border-t border-slate-800/40">
                                <div class="flex gap-2">
                                    <span class="text-[10px] text-slate-500 border border-slate-850 px-2.5 py-1 rounded-md bg-slate-950 font-bold font-sans">{{ $leader->experience_years }}+ Yrs Practice</span>
                                    <span class="text-[10px] text-slate-500 border border-slate-850 px-2.5 py-1 rounded-md bg-slate-950 font-bold font-sans">{{ $leader->location }}</span>
                                </div>
                                
                                <div class="flex items-center gap-3">
                                    <a href="#" class="text-slate-500 hover:text-blue-500 transition-colors" title="LinkedIn Profile">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.779-1.75-1.75s.784-1.75 1.75-1.75 1.75.779 1.75 1.75-.784 1.75-1.75 1.75zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    </a>
                                    <a href="mailto:info@reliancesolutions.co.tz" class="text-slate-500 hover:text-blue-500 transition-colors" title="Contact Corporate Email">
                                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center text-slate-500 py-12 font-medium">No board members currently available.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 3. CTA -->
    <section class="py-24 bg-slate-900 border-t border-b border-slate-800">
        <div class="container text-center max-w-3xl space-y-6">
            <h2 class="font-title font-extrabold text-3xl text-white">Have a Project Proposal?</h2>
            <p class="text-slate-400 text-sm leading-relaxed max-w-2xl mx-auto font-medium font-sans">
                Our board aligns strategic technologies to your bottom-line parameters. Engage our leadership team directly to discuss joint ventures or large-scale integrations.
            </p>
            <div class="pt-4">
                <a href="{{ route('contact.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-6 py-3.5 rounded-lg transition-all shadow-lg hover:shadow-blue-500/10 cursor-pointer hover:-translate-y-0.5 inline-block">
                    Contact Our Office
                </a>
            </div>
        </div>
    </section>
@endsection
