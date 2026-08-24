@props([
    'title' => "Let's build what's next.",
    'description' => "Tell us about your technology challenge and let's explore the right solution for your organization.",
    'buttonText' => "Talk to an Expert",
    'buttonRoute' => null,
    'secondaryText' => "Explore Solutions",
    'secondaryRoute' => null,
])

@php
    $btnRoute = $buttonRoute ?: route('contact.index');
    $secRoute = $secondaryRoute ?: route('solutions.index');
@endphp

<div class="bg-gradient-to-r from-slate-900 to-slate-950 border border-slate-800/80 rounded-3xl p-8 md:p-12 lg:p-16 relative overflow-hidden shadow-2xl">
    <!-- Abstract tech background shapes -->
    <div class="absolute right-0 bottom-0 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute left-1/4 top-0 w-64 h-64 bg-cyan-400/5 rounded-full blur-2xl pointer-events-none"></div>
    
    <div class="max-w-3xl space-y-6 relative z-10">
        <span class="inline-flex items-center bg-blue-500/10 border border-blue-500/20 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider text-cyan-400">
            Collaborative Engineering
        </span>
        <h2 class="font-title font-extrabold text-3xl sm:text-4xl md:text-5xl text-white leading-tight tracking-tight">
            {{ $title }}
        </h2>
        <p class="text-slate-400 text-sm sm:text-base leading-relaxed max-w-2xl">
            {{ $description }}
        </p>
        <div class="flex flex-wrap gap-4 pt-2">
            <a href="{{ $btnRoute }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3.5 rounded-lg transition-colors shadow-lg hover:shadow-blue-500/20 cursor-pointer">
                {{ $buttonText }}
            </a>
            <a href="{{ $secRoute }}" class="bg-transparent hover:bg-slate-900 border border-slate-700 hover:border-slate-500 text-white font-semibold px-6 py-3.5 rounded-lg transition-colors cursor-pointer">
                {{ $secondaryText }}
            </a>
        </div>
    </div>
</div>
