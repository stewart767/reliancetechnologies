@props([
    'step',
    'title',
    'description',
    'isLeft' => true
])

<div class="relative flex flex-col sm:flex-row items-start sm:items-center">
    <!-- Timeline Dot -->
    <div class="absolute left-4 sm:left-1/2 w-4 h-4 bg-slate-950 border-4 border-blue-500 rounded-full -translate-x-1/2 z-10 shadow-[0_0_10px_rgba(58,134,255,0.8)]"></div>
    
    <div class="pl-12 sm:pl-0 sm:w-1/2 {{ $isLeft ? 'sm:text-right sm:pr-12' : 'sm:ml-auto sm:pl-12' }} space-y-2">
        <span class="text-xs font-extrabold text-blue-500 uppercase tracking-widest">Phase {{ str_pad($step, 2, '0', STR_PAD_LEFT) }}</span>
        <h3 class="font-title font-bold text-white text-lg sm:text-xl">{{ $title }}</h3>
        <p class="text-slate-400 text-sm leading-relaxed">{{ $description }}</p>
    </div>
</div>
