@props([
    'faqs'
])

<div class="space-y-4 max-w-4xl mx-auto" x-data="{ activeIndex: null }">
    @foreach($faqs as $faq)
        <div class="bg-slate-900/60 backdrop-blur-md border border-slate-800/80 rounded-xl overflow-hidden hover:border-slate-700/80 transition-colors">
            <button @click="activeIndex = activeIndex === {{ $loop->index }} ? null : {{ $loop->index }}" 
                    class="w-full flex items-center justify-between px-6 py-5 font-title font-bold text-white text-left text-sm sm:text-base focus:outline-none cursor-pointer">
                <span>{{ $faq->question }}</span>
                <span class="text-blue-500 transition-transform duration-300" :class="{ 'rotate-45': activeIndex === {{ $loop->index }} }">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                </span>
            </button>
            <div x-show="activeIndex === {{ $loop->index }}" 
                 x-collapse
                 x-transition:enter="transition-all ease-out duration-300"
                 x-transition:leave="transition-all ease-in duration-200"
                 class="px-6 pb-6 text-sm text-slate-400 leading-relaxed border-t border-slate-800/40 pt-4"
                 style="display: none;">
                {{ $faq->answer }}
            </div>
        </div>
    @endforeach
</div>
