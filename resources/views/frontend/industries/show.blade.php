@extends('layouts.app')

@section('seo')
    <x-seo 
        title="{{ $industry->meta_title ?: $industry->name }}"
        description="{{ $industry->meta_description ?: $industry->challenge }}"
    />
@endsection

@section('content')
    <!-- INDUSTRY HERO -->
    <header class="relative bg-slate-900 pt-36 pb-20 md:pt-48 md:pb-28 overflow-hidden">
        <div class="absolute inset-0 bg-radial-gradient from-blue-500/5 via-transparent to-transparent pointer-events-none"></div>
        <div class="container relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <span class="inline-block font-title font-extrabold text-xs uppercase tracking-widest text-blue-500">Industry Directory</span>
                <h1 class="font-title font-extrabold text-3xl sm:text-4xl md:text-5xl text-white leading-tight">
                    {{ $industry->name }}
                </h1>
                <p class="text-slate-400 text-sm sm:text-base md:text-lg leading-relaxed max-w-2xl">
                    We customize physical layout cabling, secure database sync tables, and dashboard interfaces to align with the regulatory mandates and operational environments of the {{ $industry->name }} sector.
                </p>
            </div>
            
            <div class="lg:col-span-5 relative">
                <!-- Fallback graphics or generic technology diagram -->
                <div class="rounded-3xl overflow-hidden border border-slate-800 shadow-2xl bg-slate-950 p-8 h-64 sm:h-80 flex flex-col justify-center relative overflow-hidden group">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom,rgba(58,134,255,0.03),transparent)] pointer-events-none"></div>
                    <div class="border border-slate-800 p-4 rounded-xl text-center bg-slate-900/40 text-sm font-semibold mb-4">
                        Sector Constraints Layer
                    </div>
                    <div class="border border-blue-500/20 p-4 rounded-xl text-center bg-blue-500/5 text-sm font-semibold text-blue-400">
                        Reliance {{ $industry->name }} Blueprint
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
                <div class="space-y-6 text-slate-350 leading-relaxed">
                    <h2 class="font-title font-bold text-2xl text-white border-l-2 border-blue-500 pl-3">Operational Parameter Matrix</h2>
                    
                    <div class="space-y-4">
                        <div class="space-y-1">
                            <strong class="uppercase text-rose-500 font-semibold tracking-wider text-[10px] block">Sector Friction & Challenge:</strong>
                            <p class="text-slate-400 text-sm sm:text-base leading-relaxed">{{ $industry->challenge }}</p>
                        </div>
                        
                        <div class="space-y-1 pt-4">
                            <strong class="uppercase text-blue-400 font-semibold tracking-wider text-[10px] block">Digital Opportunity:</strong>
                            <p class="text-slate-400 text-sm sm:text-base leading-relaxed">{{ $industry->opportunity }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6 bg-blue-500/5 border-l-4 border-blue-500 rounded-r-2xl space-y-2">
                    <strong class="uppercase text-blue-400 font-semibold tracking-wider text-xs block">Reliance Specialized Architecture:</strong>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed">{{ $industry->solution_desc }}</p>
                </div>

                <div class="space-y-6 pt-8 border-t border-slate-900">
                    <h3 class="font-title font-bold text-xl text-white">Recommended Technical Services</h3>
                    <p class="text-xs text-slate-400">We advise deploying the following core services to address compliance and operational overheads:</p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($services as $svc)
                            <div class="bg-slate-900 border border-slate-800/80 p-5 rounded-xl flex gap-3 items-start">
                                <div class="w-8 h-8 bg-blue-500/10 text-blue-400 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                    {!! $svc->icon !!}
                                </div>
                                <div class="space-y-1">
                                    <h4 class="font-title font-bold text-white text-sm">{{ $svc->title }}</h4>
                                    <a href="{{ route('services.show', $svc->slug) }}" class="text-[10px] text-blue-400 hover:underline">Explore Capability &rarr;</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Right: Dynamic Inquiry Form -->
            <div class="lg:col-span-5 space-y-8">
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 md:p-8 shadow-xl">
                    <h3 class="font-title font-bold text-lg text-white mb-2">Request Sector Consultation</h3>
                    <p class="text-xs text-slate-450 leading-relaxed mb-6">Discuss compliance boundaries and draft initial tech specifications for your organization.</p>
                    <x-contact-form :selectedService="$industry->name . ' Industry Solution'" />
                </div>
            </div>
        </div>
    </section>
@endsection
