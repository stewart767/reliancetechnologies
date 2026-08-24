@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Homepage Sliders</h1>
            <p class="text-xs sm:text-sm text-slate-500">Manage the cinematic slideshow background images, texts, and CTA links displayed on the home page.</p>
        </div>
        <a href="{{ route('admin.sliders.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-5 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
            Add Slide
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl overflow-hidden shadow-lg">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-950/60 text-slate-400 border-b border-slate-800/80 text-xs font-bold uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3">Order</th>
                    <th class="px-6 py-3">Background Image</th>
                    <th class="px-6 py-3">Heading / Title</th>
                    <th class="px-6 py-3">Call to Actions (CTAs)</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800/50">
                @forelse($sliders as $slide)
                    <tr class="hover:bg-slate-900/40">
                        <td class="px-6 py-4 font-mono text-slate-500">{{ $slide->sort_order }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($slide->background_image)
                                    <img src="{{ Str::startsWith($slide->background_image, 'images/') ? asset($slide->background_image) : asset('storage/' . $slide->background_image) }}" 
                                         alt="Slide preview" 
                                         class="h-10 w-16 object-cover rounded border border-slate-800">
                                @else
                                    <span class="text-slate-650 text-xs">No Image</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 max-w-xs md:max-w-sm">
                            <div class="font-bold text-slate-200 line-clamp-1">{{ $slide->title ?? 'Untitled Slide' }}</div>
                            <div class="text-slate-500 text-xs line-clamp-1 mt-0.5">{{ $slide->description ?? 'No description' }}</div>
                        </td>
                        <td class="px-6 py-4 space-y-1">
                            @if($slide->primary_cta_text)
                                <div class="text-xs">
                                    <span class="text-slate-500 uppercase tracking-widest text-[9px] font-bold">Primary:</span>
                                    <span class="text-slate-300 font-semibold">{{ $slide->primary_cta_text }}</span> 
                                    <span class="text-blue-500 font-mono text-[10px]">({{ $slide->primary_cta_url }})</span>
                                </div>
                            @endif
                            @if($slide->secondary_cta_text)
                                <div class="text-xs">
                                    <span class="text-slate-500 uppercase tracking-widest text-[9px] font-bold">Secondary:</span>
                                    <span class="text-slate-300 font-semibold">{{ $slide->secondary_cta_text }}</span>
                                    <span class="text-blue-500 font-mono text-[10px]">({{ $slide->secondary_cta_url }})</span>
                                </div>
                            @endif
                            @if(!$slide->primary_cta_text && !$slide->secondary_cta_text)
                                <span class="text-slate-600 text-xs">No buttons</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider {{ $slide->is_active ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-red-500/10 text-red-400 border border-rose-500/20' }}">
                                {{ $slide->is_active ? 'Active' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center gap-3">
                                <a href="{{ route('admin.sliders.edit', $slide->id) }}" class="text-xs font-bold text-blue-500 hover:underline">Edit</a>
                                
                                <form action="{{ route('admin.sliders.destroy', $slide->id) }}" method="POST" onsubmit="return confirm('Delete this hero slide and its background image permanently?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-red-500 hover:underline bg-none border-none cursor-pointer">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-500">No custom homepage slides registered. It will display the default system slides.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
