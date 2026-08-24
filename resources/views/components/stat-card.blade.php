@props([
    'number',
    'label',
    'description'
])

<div class="premium-3d-card scroll-reveal bg-slate-900/50 border border-slate-800/80 rounded-2xl p-6 text-center space-y-3 group">
    <div class="pop-3d font-title font-extrabold text-4xl sm:text-5xl bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent transition-all duration-300">
        {{ $number }}
    </div>
    <div class="pop-3d font-title font-bold text-white text-xs sm:text-sm uppercase tracking-wider">
        {{ $label }}
    </div>
    <p class="pop-3d text-slate-400 text-xs sm:text-sm leading-relaxed">
        {{ $description }}
    </p>
</div>
