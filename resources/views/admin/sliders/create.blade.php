@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-3xl">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Create Homepage Slide</h1>
            <p class="text-xs sm:text-sm text-slate-500">Design a new cinematic hero slide background, message and action targets.</p>
        </div>
        <a href="{{ route('admin.sliders.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to List</a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 md:p-8 shadow-lg">
        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Heading / Title -->
            <div class="space-y-2">
                <label for="title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Slide Heading / Title (Optional)</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="e.g. Technology That Moves Your Business Forward."
                       class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
            </div>

            <!-- Description -->
            <div class="space-y-2">
                <label for="description" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Slide Subtitle / Description (Optional)</label>
                <textarea name="description" id="description" rows="3" placeholder="Provide subtitle, sub-heading, or description details displayed below title..."
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('description') }}</textarea>
            </div>

            <!-- CTA Primary Group -->
            <div class="bg-slate-950/40 p-4 border border-slate-800/60 rounded-lg space-y-4">
                <h4 class="text-xs font-bold text-blue-400 uppercase tracking-wider">Primary Call-to-Action (CTA) Button</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="primary_cta_text" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Button Text (Optional)</label>
                        <input type="text" name="primary_cta_text" id="primary_cta_text" value="{{ old('primary_cta_text') }}" placeholder="e.g. Talk to an Expert"
                               class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                    </div>
                    <div class="space-y-2">
                        <label for="primary_cta_url" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Button Destination Link (Optional)</label>
                        <input type="text" name="primary_cta_url" id="primary_cta_url" value="{{ old('primary_cta_url') }}" placeholder="e.g. /contact"
                               class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                    </div>
                </div>
            </div>

            <!-- CTA Secondary Group -->
            <div class="bg-slate-955/30 p-4 border border-slate-850 rounded-lg space-y-4">
                <h4 class="text-xs font-bold text-cyan-400 uppercase tracking-wider">Secondary Call-to-Action (CTA) Button</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label for="secondary_cta_text" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Button Text (Optional)</label>
                        <input type="text" name="secondary_cta_text" id="secondary_cta_text" value="{{ old('secondary_cta_text') }}" placeholder="e.g. Explore Solutions"
                               class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                    </div>
                    <div class="space-y-2">
                        <label for="secondary_cta_url" class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">Button Destination Link (Optional)</label>
                        <input type="text" name="secondary_cta_url" id="secondary_cta_url" value="{{ old('secondary_cta_url') }}" placeholder="e.g. #solutions"
                               class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                    </div>
                </div>
            </div>

            <!-- Sort order and background image -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label for="sort_order" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Sort Order Index</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="md:col-span-2 space-y-2">
                    <label for="background_image" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Background Image File *</label>
                    <input type="file" name="background_image" id="background_image" accept="image/*" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-blue-500 transition-colors text-slate-400 file:mr-4 file:py-1.5 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-600/10 file:text-blue-400 file:cursor-pointer hover:file:bg-blue-600/20">
                    <p class="text-[10px] text-slate-500">Image recommended: 1920x1080px or higher. Size limit is 2MB.</p>
                </div>
            </div>

            <!-- Visibility / Active publish state -->
            <div class="flex items-center pt-4 border-t border-slate-800">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                       class="w-4 h-4 rounded text-blue-600 bg-slate-950 border-slate-800 focus:ring-blue-500 cursor-pointer">
                <label for="is_active" class="ml-2 text-xs font-semibold text-slate-350 cursor-pointer">Publish Active</label>
            </div>

            <!-- Action buttons -->
            <div class="flex justify-end gap-3 pt-4 border-t border-slate-800">
                <a href="{{ route('admin.sliders.index') }}" class="bg-slate-850 hover:bg-slate-800 text-slate-400 font-semibold px-6 py-2.5 rounded-lg transition-colors cursor-pointer text-sm">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors cursor-pointer shadow text-sm">
                    Save Slide
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
