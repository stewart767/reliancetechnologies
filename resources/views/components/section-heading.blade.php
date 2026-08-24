@props([
    'subtitle' => null,
    'title' => null,
    'description' => null,
    'centered' => true,
    'color' => 'blue', // can be 'blue', 'emerald', 'cyan'
])

@php
    $colorClass = [
        'blue' => 'text-blue-500',
        'emerald' => 'text-emerald-500',
        'cyan' => 'text-cyan-400'
    ][$color] ?? 'text-blue-500';
@endphp

<div class="{{ $centered ? 'text-center mx-auto' : 'text-left' }} max-w-3xl space-y-4">
    @if($subtitle)
        <span class="inline-block font-title font-extrabold text-xs uppercase tracking-widest {{ $colorClass }}">
            {{ $subtitle }}
        </span>
    @endif
    
    @if($title)
        <h2 class="font-title font-extrabold text-3xl sm:text-4xl md:text-5xl text-white tracking-tight leading-tight">
            {{ $title }}
        </h2>
    @endif
    
    @if($description)
        <p class="text-slate-400 text-sm sm:text-base leading-relaxed max-w-2xl {{ $centered ? 'mx-auto' : '' }}">
            {{ $description }}
        </p>
    @endif
</div>
