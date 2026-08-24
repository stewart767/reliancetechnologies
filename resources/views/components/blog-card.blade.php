@props([
    'post'
])

@php
    $imagePath = match($post->category->slug ?? '') {
        'it-consulting' => 'images/services/software-development.jpg',
        'cybersecurity' => 'images/services/cybersecurity.jpg',
        'yaoyao-energies' => setting('yaoyao_hero_image') ? (Str::startsWith(setting('yaoyao_hero_image'), 'images/') ? setting('yaoyao_hero_image') : 'storage/' . setting('yaoyao_hero_image')) : 'images/yaoyao/electric-tricycle.jpg',
        default => 'images/hero/hero-bg.jpg'
    };
@endphp

<div class="premium-3d-card scroll-reveal bg-slate-900 border border-slate-800 rounded-2xl flex flex-col justify-between overflow-hidden group">
    <div>
        <div class="h-48 overflow-hidden relative">
            <img src="{{ asset($imagePath) }}" alt="{{ $post->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
        </div>
        
        <div class="p-8 space-y-4 pop-3d">
            <div class="flex items-center justify-between text-xs text-slate-500">
                <span class="bg-blue-600/10 text-blue-400 font-bold px-2.5 py-1 rounded">
                    {{ $post->category->name ?? 'General' }}
                </span>
                <span>
                    {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                </span>
            </div>
            
            <h3 class="font-title font-bold text-white text-lg leading-snug group-hover:text-blue-400 transition-colors">
                {{ $post->title }}
            </h3>
            
            <p class="text-slate-400 text-sm leading-relaxed">
                {{ $post->summary }}
            </p>
        </div>
    </div>
    
    <div class="px-8 pb-8 pop-3d">
        <a href="{{ route('insights.show', $post->slug) }}" class="inline-flex items-center gap-2 text-xs font-bold text-blue-500 hover:text-cyan-400 transition-colors pt-6 border-t border-slate-800/60 w-full group/link">
            Read Full Article
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
    </div>
</div>
