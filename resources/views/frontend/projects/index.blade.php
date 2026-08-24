@extends('layouts.app')

@section('seo')
    <x-seo 
        title="Case Studies & Projects Log"
        description="Review custom software deployments, server integrations, network cabling, and electric logistics fleet pilots designed by Reliance Solutions."
    />
@endsection

@section('content')
    <!-- PROJECTS HERO -->
    <header class="bg-slate-900 border-b border-slate-800 pt-32 pb-16 md:pt-40 md:pb-24">
        <div class="container space-y-4">
            <span class="font-title font-bold text-xs uppercase tracking-widest text-blue-500">Project Log</span>
            <h1 class="font-title font-extrabold text-3xl sm:text-4xl md:text-5xl text-white leading-tight">Capabilities & Case Studies</h1>
            <p class="text-slate-400 text-base sm:text-lg max-w-3xl leading-relaxed">
                Review representative system architectures, custom software portals, and electric vehicle configurations built by our development and infrastructure teams.
            </p>
        </div>
    </header>

    <!-- CONTENT SHOWCASE -->
    <section class="py-24 bg-slate-950 border-b border-slate-800/80" x-data="{ activeFilter: 'all' }">
        <div class="container">
            <!-- Notice Box -->
            <div class="bg-blue-500/5 border border-blue-500/20 p-6 rounded-xl flex items-start gap-4 mb-16 max-w-4xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed">
                    <strong>Project Registry Notice:</strong> The case studies below represent typical technologies, structured layouts, and software architectures deployed by our teams. Client identifications and confidential metrics are omitted or simplified in accordance with non-disclosure agreements (NDAs) and local cybersecurity compliance standards.
                </p>
            </div>
            
            @if($projects->count() == 0)
                <!-- Empty State -->
                <div class="border border-dashed border-slate-800 rounded-2xl p-16 text-center max-w-2xl mx-auto space-y-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-slate-600 mx-auto" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    <h3 class="font-title font-bold text-white text-lg">No Published Projects Available</h3>
                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">Specific enterprise projects are currently undergoing compliance reviews. Check back shortly or contact our offices directly.</p>
                </div>
            @else
                @php
                    $projectLinks = [
                        'ajira-market' => 'https://www.ajiramarket.co.tz',
                        'smart-sale' => 'https://www.smartsale.co.tz',
                        'employee-reference-bureau' => 'https://www.erb.co.tz',
                        'team-track' => 'https://www.teamtrack.co.tz',
                        'yao-yao-energies' => 'https://www.yaoyao.co.tz',
                        'peak-hr-solutions' => 'https://www.peakhrsolutions.co.tz',
                    ];
                @endphp
                <!-- Filter Tabs -->
                <div class="flex flex-wrap items-center justify-start gap-3 mb-12">
                    <button @click="activeFilter = 'all'" 
                            :class="activeFilter === 'all' ? 'bg-blue-600 text-white border-blue-600' : 'bg-slate-900 text-slate-400 border-slate-850 hover:text-white hover:border-slate-700'" 
                            class="px-5 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider border transition-all cursor-pointer">
                        All Projects
                    </button>
                    @foreach($industries as $ind)
                        @if($projects->where('industry_id', $ind->id)->count() > 0)
                            <button @click="activeFilter = '{{ $ind->slug }}'" 
                                    :class="activeFilter === '{{ $ind->slug }}' ? 'bg-blue-600 text-white border-blue-600' : 'bg-slate-900 text-slate-400 border-slate-850 hover:text-white hover:border-slate-700'" 
                                    class="px-5 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider border transition-all cursor-pointer">
                                {{ $ind->name }}
                            </button>
                        @endif
                    @endforeach
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($projects as $proj)
                        @php
                            $link = $projectLinks[$proj->slug] ?? route('projects.show', $proj->slug);
                            $isExternal = isset($projectLinks[$proj->slug]);
                        @endphp
                        <div x-show="activeFilter === 'all' || activeFilter === '{{ $proj->industry->slug }}'"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             class="premium-3d-card scroll-reveal bg-slate-900 border border-slate-800 rounded-2xl flex flex-col justify-between overflow-hidden group">
                            <div>
                                <div class="h-48 bg-slate-950 border-b border-slate-800 flex items-center justify-center text-slate-700 relative">
                                    @if($proj->featured_image)
                                        <img src="{{ asset('storage/' . $proj->featured_image) }}" alt="{{ $proj->title }}" class="w-full h-full object-cover">
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 opacity-15" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                    @endif
                                    <span class="absolute bottom-4 left-6 text-[10px] font-bold text-cyan-400 uppercase tracking-widest bg-slate-950/80 px-2 py-0.5 rounded border border-slate-800 z-20">Deployment</span>
                                </div>
                                <div class="p-8 space-y-4 pop-3d">
                                    <span class="text-xs font-bold uppercase tracking-wider text-blue-500">{{ $proj->industry->name }}</span>
                                    <h3 class="font-title font-bold text-white text-lg leading-snug">{{ $proj->title }}</h3>
                                    <div class="text-xs space-y-2 text-slate-400">
                                        <p><strong>Friction:</strong> {{ Str::limit($proj->challenge, 100) }}</p>
                                        <p><strong>Solution:</strong> {{ Str::limit($proj->solution, 105) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="px-8 pb-8 flex items-center justify-between pop-3d">
                                <a href="{{ $link }}" {{ $isExternal ? 'target="_blank" rel="noopener noreferrer"' : '' }} class="inline-flex items-center gap-2 text-xs font-bold text-blue-500 hover:text-cyan-400 transition-colors pt-4 border-t border-slate-950 w-3/4">
                                    {{ $isExternal ? 'Visit Website' : 'Read Case Study' }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </a>
                                @if($isExternal)
                                    <a href="{{ route('projects.show', $proj->slug) }}" class="text-[10px] text-slate-500 hover:text-slate-350 transition-colors font-medium pt-4 border-t border-slate-950">
                                        Case Info
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
