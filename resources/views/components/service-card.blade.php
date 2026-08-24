@props([
    'service',
    'iteration'
])

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

<div class="premium-3d-card scroll-reveal bg-slate-900/60 backdrop-blur-md border border-slate-800/80 rounded-2xl flex flex-col justify-between overflow-hidden group">
    <div>
        <!-- Image Header -->
        <div class="h-48 overflow-hidden relative">
            <img src="{{ asset($imagePath) }}" alt="{{ $service->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
            <div class="absolute top-4 right-4 bg-slate-950/80 border border-slate-800/80 px-3 py-1 rounded-full text-xs font-semibold text-cyan-400 backdrop-blur-sm z-20">
                Service {{ str_pad($iteration, 2, '0', STR_PAD_LEFT) }}
            </div>
        </div>
        
        <div class="p-8 space-y-4 pop-3d">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-500/10 text-blue-400 rounded-xl flex items-center justify-center group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                    {!! $service->icon !!}
                </div>
                <h3 class="font-title font-extrabold text-white text-xl group-hover:text-blue-400 transition-colors">{{ $service->title }}</h3>
            </div>
            
            <p class="text-slate-400 text-sm leading-relaxed">{{ $service->short_description }}</p>
        </div>
    </div>
    
    <div class="px-8 pb-8 pop-3d">
        <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-2 text-xs font-bold text-blue-500 hover:text-cyan-400 transition-colors pt-4 border-t border-slate-800/60 w-full group/link">
            Explore Capabilities
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
    </div>
</div>
