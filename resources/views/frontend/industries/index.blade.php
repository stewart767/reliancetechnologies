@extends('layouts.app')

@section('seo')
    <x-seo 
        title="Industry Mappings Directory"
        description="Explore how Reliance Solutions adapts custom databases, network cabling, and API gateways to fit compliance rules in banking, mining, and healthcare."
    />
@endsection

@section('content')
    <!-- INDUSTRIES HERO -->
    <header class="bg-slate-900 border-b border-slate-800/80 pt-36 pb-16 md:pt-48 md:pb-24">
        <div class="container space-y-4">
            <span class="inline-block font-title font-extrabold text-xs uppercase tracking-widest text-blue-500">Target Markets</span>
            <h1 class="font-title font-extrabold text-4xl sm:text-5xl text-white leading-tight">Industry Mappings Directory</h1>
            <p class="text-slate-400 text-sm sm:text-base md:text-lg max-w-3xl leading-relaxed">
                We adapt technology systems to match specific operational settings. Our engineers align database design, network architecture, and telemetry interfaces with the compliance rules and environmental realities of your sector.
            </p>
        </div>
    </header>

    <!-- LISTING SECTION -->
    <section class="py-24 bg-slate-950 border-b border-slate-800/80">
        <div class="container space-y-12">
            @foreach($industries as $ind)
                <div id="{{ $ind->slug }}" class="bg-slate-900 border border-slate-800 rounded-2xl p-8 md:p-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-start shadow-lg hover:border-slate-700 transition-colors">
                    <div class="lg:col-span-4 space-y-4">
                        <h2 class="font-title font-extrabold text-2xl text-white leading-tight">{{ $ind->name }}</h2>
                        <div class="flex flex-col gap-3 pt-2">
                            <a href="{{ route('industries.show', $ind->slug) }}" 
                               class="inline-block text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-5 py-2.5 rounded-lg transition-colors cursor-pointer">
                                Explore Industry Framework
                            </a>
                            <a href="{{ route('contact.index') }}?service={{ urlencode($ind->name . ' Industry Solution') }}" 
                               class="inline-block text-center bg-transparent hover:bg-slate-800 border border-slate-700 text-slate-300 font-semibold text-xs px-5 py-2.5 rounded-lg transition-colors cursor-pointer">
                                Discuss Sector Setup
                            </a>
                        </div>
                    </div>
                    
                    <div class="lg:col-span-8 space-y-6 text-sm">
                        <div class="space-y-1">
                            <strong class="uppercase text-rose-500 font-semibold tracking-wider text-[10px] block">Operational Challenge:</strong>
                            <p class="text-slate-400 leading-relaxed">{{ $ind->challenge }}</p>
                        </div>
                        
                        <div class="space-y-1">
                            <strong class="uppercase text-blue-400 font-semibold tracking-wider text-[10px] block">Technology Opportunity:</strong>
                            <p class="text-slate-400 leading-relaxed">{{ $ind->opportunity }}</p>
                        </div>
                        
                        <div class="p-4 bg-blue-500/5 border-l-4 border-blue-500 rounded-r-lg space-y-1">
                            <strong class="uppercase text-blue-400 font-semibold tracking-wider text-[10px] block">Reliance Target Integration:</strong>
                            <p class="text-slate-400 leading-relaxed">{{ $ind->solution_desc }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
