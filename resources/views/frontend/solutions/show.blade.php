@extends('layouts.app')

@section('seo')
    <x-seo 
        title="{{ $solution->meta_title ?: $solution->title }}"
        description="{{ $solution->meta_description ?: $solution->short_description }}"
    />
@endsection

@section('content')
    @php
        $imagePath = match($solution->slug) {
            'digital-transformation' => 'images/services/ai-automation.jpg',
            'smart-business-systems' => 'images/services/software-development.jpg',
            'secure-infrastructure' => 'images/services/ict-infrastructure.jpg',
            'intelligent-automation' => 'images/services/ai-automation.jpg',
            'enterprise-integration' => 'images/services/software-development.jpg',
            default => 'images/hero/hero-bg.jpg'
        };
    @endphp

    <!-- SOLUTION HERO -->
    <header class="relative bg-slate-900 pt-36 pb-20 md:pt-48 md:pb-28 overflow-hidden">
        <div class="absolute inset-0 bg-radial-gradient from-blue-500/5 via-transparent to-transparent pointer-events-none"></div>
        <div class="container relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <span class="inline-block font-title font-extrabold text-xs uppercase tracking-widest text-blue-500">Systems Integration Solutions</span>
                <h1 class="font-title font-extrabold text-3xl sm:text-4xl md:text-5xl text-white leading-tight">{{ $solution->title }}</h1>
                <p class="text-slate-400 text-sm sm:text-base md:text-lg leading-relaxed max-w-2xl">
                    {{ $solution->subtitle }}
                </p>
            </div>
            
            <div class="lg:col-span-5 relative">
                <div class="rounded-3xl overflow-hidden border border-slate-800 shadow-2xl">
                    <img src="{{ asset($imagePath) }}" alt="{{ $solution->title }}" class="w-full h-64 sm:h-80 object-cover">
                </div>
            </div>
        </div>
    </header>

    <!-- CONTENT SECTION -->
    <section class="py-24 bg-slate-950">
        <div class="container grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Left: Description and Capabilities -->
            <div class="lg:col-span-7 space-y-12">
                <div class="space-y-4 text-slate-350 leading-relaxed">
                    <h2 class="font-title font-bold text-2xl text-white border-l-2 border-blue-500 pl-3">Solution Overview</h2>
                    <p class="text-sm sm:text-base leading-relaxed">
                        {{ $solution->description }}
                    </p>
                </div>
                
                <div class="space-y-6 pt-8 border-t border-slate-900">
                    <h3 class="font-title font-bold text-xl text-white">Target Integrations</h3>
                    <p class="text-xs text-slate-400">We connect the following software, hardware configurations, and database nodes within this solution framework:</p>
                    
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @if($solution->capabilities)
                            @foreach($solution->capabilities as $cap)
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    <span>{{ $cap }}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            
            <!-- Right: Dynamic Inquiry Form -->
            <div class="lg:col-span-5 space-y-8">
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 md:p-8 shadow-xl">
                    <h3 class="font-title font-bold text-lg text-white mb-2">Request Solution Quote</h3>
                    <p class="text-xs text-slate-450 leading-relaxed mb-6">Schedule a session with our solutions architects to blueprint your custom operational solution.</p>
                    <x-contact-form :selectedService="$solution->title" />
                </div>
            </div>
        </div>
    <!-- RELATED DEPLOYMENTS / SUCCESS STORIES -->
    @if($projects->isNotEmpty())
        <section class="py-24 bg-slate-900 border-t border-slate-850">
            <div class="container space-y-12">
                <div class="space-y-3">
                    <span class="inline-block font-title font-bold text-xs uppercase tracking-widest text-blue-500">Case Studies</span>
                    <h2 class="font-title font-extrabold text-2xl md:text-3xl text-white">Deployments In Action</h2>
                    <p class="text-slate-450 text-xs sm:text-sm max-w-2xl">See how we have engineered this solution for real operations.</p>
                </div>
                
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

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($projects as $proj)
                        @php
                            $link = $projectLinks[$proj->slug] ?? route('projects.show', $proj->slug);
                            $isExternal = isset($projectLinks[$proj->slug]);
                        @endphp
                        <div class="bg-slate-950 border border-slate-800/80 rounded-2xl flex flex-col justify-between overflow-hidden hover:border-blue-500/40 hover:-translate-y-1 transition-all duration-300">
                            <div>
                                <div class="h-44 overflow-hidden relative">
                                    @if($proj->featured_image)
                                        <img src="{{ asset('storage/' . $proj->featured_image) }}" alt="{{ $proj->title }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-slate-900 flex items-center justify-center text-slate-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 opacity-15" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                        </div>
                                    @endif
                                    <span class="absolute bottom-3 left-4 text-[9px] font-bold text-cyan-400 uppercase tracking-widest bg-slate-950/90 px-2 py-0.5 rounded border border-slate-850">
                                        {{ $proj->industry->name }}
                                    </span>
                                </div>
                                <div class="p-6 space-y-3">
                                    <h3 class="font-title font-bold text-white text-base leading-snug">{{ $proj->title }}</h3>
                                    <p class="text-slate-450 text-xs leading-relaxed line-clamp-3">
                                        {{ $proj->challenge }}
                                    </p>
                                </div>
                            </div>
                            <div class="px-6 pb-6 pt-3 border-t border-slate-900 flex items-center justify-between">
                                <a href="{{ $link }}" {{ $isExternal ? 'target="_blank" rel="noopener noreferrer"' : '' }} class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-500 hover:text-cyan-400 transition-colors">
                                    {{ $isExternal ? 'Visit Website' : 'Read Case Study' }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </a>
                                @if($isExternal)
                                    <a href="{{ route('projects.show', $proj->slug) }}" class="text-[10px] text-slate-500 hover:text-slate-350 transition-colors font-medium font-sans">
                                        Case Details
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
