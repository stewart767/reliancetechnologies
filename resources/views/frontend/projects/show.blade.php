@extends('layouts.app')

@section('seo')
    <x-seo 
        title="{{ $project->title }}"
        description="Case Study: {{ $project->challenge }}"
    />
@endsection

@section('content')
    <!-- PROJECT HERO -->
    <header class="relative bg-slate-900 pt-36 pb-20 md:pt-48 md:pb-28 overflow-hidden">
        <div class="absolute inset-0 bg-radial-gradient from-blue-500/5 via-transparent to-transparent pointer-events-none"></div>
        <div class="container relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-4">
                <span class="inline-block font-title font-extrabold text-xs uppercase tracking-widest text-blue-500">Case Study ({{ $project->industry->name }})</span>
                <h1 class="font-title font-extrabold text-3xl sm:text-4xl md:text-5xl text-white leading-tight">{{ $project->title }}</h1>
                <p class="text-slate-400 text-sm leading-relaxed max-w-2xl">
                    Representative project architecture. Real client identifications and confidential metrics are simplified or omitted under NDAs and local compliance policies.
                </p>
            </div>
            
            <div class="lg:col-span-5 relative">
                <div class="rounded-3xl overflow-hidden border border-slate-800 shadow-2xl bg-slate-950 p-8 h-48 sm:h-64 flex flex-col justify-center relative overflow-hidden group">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom,rgba(58,134,255,0.03),transparent)] pointer-events-none"></div>
                    <div class="border border-slate-800 p-4 rounded-xl text-center bg-slate-900/40 text-xs font-semibold text-slate-350">
                        Operational Blueprint Case
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- CONTENT SECTION -->
    <section class="py-24 bg-slate-950">
        <div class="container grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left Layout: Details -->
            <div class="lg:col-span-8 space-y-10">
                
                <div class="space-y-3">
                    <h3 class="font-title font-bold text-white text-lg border-l-4 border-blue-600 pl-4">Sector Friction (Challenge)</h3>
                    <p class="text-slate-400 text-sm sm:text-base leading-relaxed pl-5">{{ $project->challenge }}</p>
                </div>
                
                <div class="space-y-3">
                    <h3 class="font-title font-bold text-white text-lg border-l-4 border-blue-600 pl-4">Applied Integration Architecture (Solution)</h3>
                    <p class="text-slate-400 text-sm sm:text-base leading-relaxed pl-5">{{ $project->solution }}</p>
                </div>

                <div class="space-y-3">
                    <h3 class="font-title font-bold text-white text-lg border-l-4 border-emerald-500 pl-4">Project Outcome (Results)</h3>
                    <p class="text-slate-400 text-sm sm:text-base leading-relaxed pl-5">{{ $project->results }}</p>
                </div>
                
                @if($project->gallery->isNotEmpty())
                    <div class="space-y-6 pt-12 border-t border-slate-900">
                        <h3 class="font-title font-bold text-white text-lg border-l-4 border-blue-600 pl-4">Project Gallery</h3>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pl-5">
                            @foreach($project->gallery as $galleryImg)
                                <a href="{{ asset('storage/' . $galleryImg->image_path) }}" target="_blank" class="block rounded-lg overflow-hidden border border-slate-850 hover:border-blue-500/40 transition-colors">
                                    <img src="{{ asset('storage/' . $galleryImg->image_path) }}" alt="Gallery image for {{ $project->title }}" class="w-full h-32 object-cover hover:scale-105 transition-transform duration-500">
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
                
                <div class="pt-8 border-t border-slate-900 flex justify-between items-center flex-wrap gap-4">
                    <a href="{{ route('projects.index') }}" class="text-sm font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to Case Studies</a>
                    <a href="{{ route('contact.index') }}?service={{ urlencode('Inquiry regarding ' . $project->title) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-6 py-3 rounded-lg transition-colors cursor-pointer">
                        Discuss Similar Integration
                    </a>
                </div>
            </div>
            
            <!-- Right Layout: Specs -->
            <div class="lg:col-span-4 bg-slate-900 border border-slate-800 rounded-2xl p-8 space-y-6 shadow-xl">
                <div>
                    <h4 class="font-title font-bold text-white text-base mb-2">Project Metrics</h4>
                    <p class="text-slate-500 text-xs leading-relaxed">Scope parameters utilized during the implementation cycle.</p>
                </div>
                
                <div class="space-y-4 pt-4 border-t border-slate-850">
                    <div>
                        <strong class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Industry Sector:</strong>
                        <span class="text-sm text-white font-semibold">{{ $project->industry->name }}</span>
                    </div>
                    <div>
                        <strong class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Technology Stack:</strong>
                        <span class="text-sm text-cyan-400 font-semibold">{{ $project->technology }}</span>
                    </div>
                    <div>
                        <strong class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Deployment Status:</strong>
                        <span class="text-xs bg-emerald-500/10 text-emerald-400 font-bold px-2 py-0.5 rounded border border-emerald-500/20 inline-block">Production Operational</span>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
@endsection
