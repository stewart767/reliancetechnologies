@props([
    'solution'
])

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

<div class="premium-3d-card scroll-reveal bg-slate-900 border border-slate-800 rounded-2xl p-8 md:p-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center shadow-lg">
    <div class="lg:col-span-8 space-y-4 pop-3d">
        <span class="text-xs font-bold text-blue-500 uppercase tracking-widest font-title">{{ $solution->subtitle }}</span>
        <h2 class="font-title font-extrabold text-2xl md:text-3xl text-white leading-tight">{{ $solution->title }}</h2>
        <p class="text-slate-400 text-sm md:text-base leading-relaxed">{{ $solution->short_description }}</p>
        
        <div class="pt-4 flex flex-wrap gap-4">
            <a href="{{ route('solutions.show', $solution->slug) }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-5 py-2.5 rounded-lg transition-colors cursor-pointer">
                View Solution Details
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </a>
            <a href="{{ route('contact.index') }}?service={{ urlencode($solution->title) }}" class="inline-flex items-center gap-2 border border-slate-800 hover:border-slate-600 text-slate-300 font-semibold text-sm px-5 py-2.5 rounded-lg transition-colors cursor-pointer">
                Consult Team
            </a>
        </div>
    </div>
    
    <div class="lg:col-span-4 bg-slate-950 border border-slate-800/80 p-6 rounded-xl space-y-4 pop-3d">
        <strong class="font-title text-slate-300 text-xs uppercase tracking-wider block border-b border-slate-800/80 pb-2">Target Operations:</strong>
        <ul class="space-y-3">
            @if($solution->capabilities)
                @foreach($solution->capabilities as $cap)
                    <li class="flex items-start gap-2.5 text-xs text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-cyan-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>{{ $cap }}</span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
