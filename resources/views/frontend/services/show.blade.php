@extends('layouts.app')

@section('seo')
    <x-seo 
        title="{{ $service->meta_title ?: $service->title }}"
        description="{{ $service->meta_description ?: $service->short_description }}"
    />
@endsection

@section('content')
    @php
        $imagePath = match($service->slug) {
            'ai-automation' => 'images/services/ai-automation.jpg',
            'cybersecurity' => 'images/services/cybersecurity.jpg',
            'software-development' => 'images/services/software-development.jpg',
            'ict-infrastructure' => 'images/services/ict-infrastructure.jpg',
            'yaoyao-energies' => setting('yaoyao_hero_image') ? (Str::startsWith(setting('yaoyao_hero_image'), 'images/') ? setting('yaoyao_hero_image') : 'storage/' . setting('yaoyao_hero_image')) : 'images/yaoyao/electric-tricycle.jpg',
            default => 'images/hero/hero-bg.jpg'
        };
    @endphp

    <!-- SERVICE HERO -->
    <header class="relative bg-slate-900 border-b border-slate-800 pt-36 pb-20 md:pt-48 md:pb-28 overflow-hidden">
        <!-- Tech grid background -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(58,134,255,0.02)_1px,transparent_1px),linear-gradient(to_bottom,rgba(58,134,255,0.02)_1px,transparent_1px)] bg-[size:4rem_4rem] pointer-events-none"></div>
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="container relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-500/10 text-blue-500 rounded-2xl flex items-center justify-center shrink-0 border border-blue-500/20 shadow-inner">
                        {!! $service->icon !!}
                    </div>
                    <span class="text-xs font-bold text-blue-500 tracking-wider font-title uppercase">Service {{ str_pad($service->sort_order, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                <h1 class="font-title font-extrabold text-3xl sm:text-4xl md:text-5xl text-white leading-tight tracking-tight">
                    <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-800 bg-clip-text text-transparent">{{ $service->title }}</span>
                </h1>
                <p class="text-slate-400 text-sm sm:text-base md:text-lg leading-relaxed max-w-2xl font-medium font-sans">
                    {{ $service->short_description }}
                </p>
            </div>
            
            <div class="lg:col-span-5 relative mt-6 lg:mt-0">
                <div class="absolute inset-0 bg-gradient-to-tr from-blue-500/10 to-indigo-500/5 rounded-3xl blur-2xl transform rotate-3 -translate-y-2 pointer-events-none"></div>
                <div class="relative rounded-3xl overflow-hidden border border-slate-800 shadow-2xl p-1 bg-slate-900">
                    <img src="{{ asset($imagePath) }}" alt="{{ $service->title }}" class="w-full h-64 sm:h-80 object-cover rounded-[22px] transition-transform duration-500 hover:scale-105">
                    
                    <!-- Floating Stat Badge -->
                    <div class="absolute -bottom-6 -left-6 bg-slate-950/95 backdrop-blur-md border border-slate-800 rounded-2xl p-4 shadow-xl flex items-center gap-3 animate-float">
                        <div class="w-10 h-10 rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <div>
                            <span class="block text-slate-500 text-[9px] font-bold uppercase tracking-wider">Reliable SLA</span>
                            <strong class="font-title text-white text-xs font-extrabold">24/7 Operations Hub</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- CONTENT SECTION -->
    <section class="py-24 bg-slate-950">
        <div class="container grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <!-- Left: Description and Capabilities -->
            <div class="lg:col-span-7 space-y-12">
                <div class="space-y-6 text-slate-400 leading-relaxed font-sans">
                    <h2 class="font-title font-extrabold text-2xl text-white border-l-3 border-blue-500 pl-4">Service Overview</h2>
                    <div class="text-sm sm:text-base space-y-4 font-medium leading-relaxed">
                        {!! nl2br(e($service->description)) !!}
                    </div>
                </div>
                
                <div class="space-y-8 pt-8 border-t border-slate-900">
                    <div class="space-y-2">
                        <h3 class="font-title font-extrabold text-xl text-white">Target Capabilities</h3>
                        <p class="text-xs text-slate-450 font-medium">Our engineering teams offer the following specific technical capabilities within this service scope:</p>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @if(!empty($service->capabilities) && is_array($service->capabilities))
                            @foreach($service->capabilities as $cap)
                                <div class="bg-slate-900 border border-slate-850 hover:border-blue-500/20 p-4 rounded-xl flex gap-3 items-start transition-all duration-300 hover:shadow-md group">
                                    <div class="w-5 h-5 rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center shrink-0 mt-0.5 group-hover:bg-blue-500 group-hover:text-white transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                    <span class="text-xs sm:text-sm text-slate-400 font-medium group-hover:text-slate-305 transition-colors">{{ $cap }}</span>
                                </div>
                            @endforeach
                        @else
                            @php
                                $fallbackCapabilities = [
                                    'ai-automation' => [
                                        'Robotic Process Automation (RPA) tasks',
                                        'Predictive analytics engines',
                                        'Natural Language Processing (NLP) models',
                                        'Computer vision inspection systems',
                                        'Workflow orchestration logic'
                                    ],
                                    'it-consulting' => [
                                        'IT roadmap & ROI planning',
                                        '24/7 managed SLA helpdesk',
                                        'Cloud infrastructure setups',
                                        'System compliance audits',
                                        'Technology risk assessment'
                                    ],
                                    'cybersecurity' => [
                                        'Vulnerability scans (VAPT)',
                                        'Zero-trust access setups',
                                        'Endpoint threat monitoring',
                                        'Firewall configuration',
                                        'Incident response playbooks'
                                    ],
                                    'software-development' => [
                                        'Custom ERP & CRM modules',
                                        'Payment gateway sync',
                                        'Secure API engineering',
                                        'Database optimization',
                                        'Mobile application coding'
                                    ],
                                    'ict-infrastructure' => [
                                        'Structured Cat6/Fiber cabling',
                                        'Redundant switch setups',
                                        'Server room installation',
                                        'IP camera CCTV setups',
                                        'Biometric lock configuration'
                                    ],
                                    'yaoyao-energies' => [
                                        'Electric cargo transport fleets',
                                        'Battery swapping technologies',
                                        'Insulated box configurations',
                                        'Telemetry software links',
                                        'Local replacement parts supply'
                                    ],
                                    'industry-solutions' => [
                                        'Banking interface bridges',
                                        'Remote telemetry loops',
                                        'Public register databases',
                                        'HIS records integrations',
                                        'Agricultural export tracking'
                                    ],
                                    'system-integration' => [
                                        'Custom API middleware sync',
                                        'Mobile payment system sync',
                                        'Legacy system API wraps',
                                        'IoT sensor connection links',
                                        'Database ETL data runs'
                                    ]
                                ][$service->slug] ?? ['B2B Systems Consulting', 'Operational Tech Auditing', 'Infrastructure Optimization'];
                            @endphp
                            @foreach($fallbackCapabilities as $cap)
                                <div class="bg-slate-900 border border-slate-850 hover:border-blue-500/20 p-4 rounded-xl flex gap-3 items-start transition-all duration-300 hover:shadow-md group">
                                    <div class="w-5 h-5 rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center shrink-0 mt-0.5 group-hover:bg-blue-500 group-hover:text-white transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                    <span class="text-xs sm:text-sm text-slate-400 font-medium group-hover:text-slate-305 transition-colors">{{ $cap }}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Right: Dynamic Inquiry Form -->
            <div class="lg:col-span-5 space-y-8 mt-12 lg:mt-0">
                <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 md:p-8 shadow-2xl relative overflow-hidden group hover:border-blue-500/20 transition-all duration-300">
                    <div class="absolute -right-12 -top-12 w-24 h-24 bg-blue-500/5 rounded-full blur-xl group-hover:bg-blue-500/10 transition-colors"></div>
                    <div class="relative z-10">
                        <h3 class="font-title font-extrabold text-xl text-white mb-2">Request Service Consultation</h3>
                        <p class="text-xs text-slate-450 leading-relaxed mb-6 font-medium font-sans">Schedule a session with our technology architects to discuss details and draft an initial system blueprint.</p>
                        <x-contact-form :selectedService="$service->title" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- RELATED SERVICES -->
    @if($relatedServices->count() > 0)
        <section class="py-24 bg-slate-900 border-t border-slate-800">
            <div class="container space-y-12">
                <div class="border-b border-slate-800/80 pb-4">
                    <h3 class="font-title font-extrabold text-2xl text-white">Other Core Capabilities</h3>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedServices as $rel)
                        @php
                            $relImagePath = match($rel->slug) {
                                'ai-automation' => 'images/services/ai-automation.jpg',
                                'cybersecurity' => 'images/services/cybersecurity.jpg',
                                'software-development' => 'images/services/software-development.jpg',
                                'ict-infrastructure' => 'images/services/ict-infrastructure.jpg',
                                'yaoyao-energies' => setting('yaoyao_hero_image') ? (Str::startsWith(setting('yaoyao_hero_image'), 'images/') ? setting('yaoyao_hero_image') : 'storage/' . setting('yaoyao_hero_image')) : 'images/yaoyao/electric-tricycle.jpg',
                                default => 'images/hero/hero-bg.jpg'
                            };
                        @endphp
                        
                        <div class="premium-3d-card scroll-reveal bg-slate-950 border border-slate-850 rounded-2xl flex flex-col justify-between overflow-hidden shadow-lg group">
                            <div class="sheen-effect"></div>
                            
                            <div class="pop-3d">
                                <div class="h-44 overflow-hidden relative">
                                    <img src="{{ asset($relImagePath) }}" alt="{{ $rel->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
                                </div>
                                
                                <div class="p-6 space-y-3">
                                    <h4 class="font-title font-extrabold text-white text-base leading-snug group-hover:text-blue-500 transition-colors">{{ $rel->title }}</h4>
                                    <p class="text-xs text-slate-400 leading-relaxed font-medium font-sans">{{ $rel->short_description }}</p>
                                </div>
                            </div>
                            
                            <div class="pop-3d px-6 pb-6 mt-auto">
                                <a href="{{ route('services.show', $rel->slug) }}" class="inline-flex items-center gap-2 text-xs font-bold text-blue-500 hover:text-blue-600 transition-colors pt-4 border-t border-slate-900/60 w-full group/link">
                                    View Service Detail
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
