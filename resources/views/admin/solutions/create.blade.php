@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-3xl">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Create Solution</h1>
            <p class="text-xs sm:text-sm text-slate-500">Draft a new integrated technology solution.</p>
        </div>
        <a href="{{ route('admin.solutions.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to Directory</a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 md:p-8 shadow-lg">
        <form action="{{ route('admin.solutions.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Solution Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="e.g. Digital Transformation Systems"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="slug" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">URL Slug (leave blank to generate)</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="e.g. digital-transformation-systems"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="space-y-2">
                <label for="subtitle" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Subtitle / Baseline *</label>
                <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle') }}" required placeholder="e.g. Aligning operations under unified dashboard controls"
                       class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
            </div>

            <div class="space-y-2">
                <label for="short_description" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Short Description (lists) *</label>
                <textarea name="short_description" id="short_description" rows="3" required placeholder="A brief marketing summary..."
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('short_description') }}</textarea>
            </div>

            <div class="space-y-2">
                <label for="description" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Detailed Description *</label>
                <textarea name="description" id="description" rows="6" required placeholder="Detailed operational overview..."
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('description') }}</textarea>
            </div>

            <!-- Dynamic Capabilities Array with Alpine.js -->
            <div class="space-y-4" x-data="{ capabilities: {{ json_encode(old('capabilities', [''])) }} }">
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Core Focus Areas (Capabilities List)</label>
                <p class="text-[10px] text-slate-500 leading-relaxed">List specific technical checkpoints included in this solution.</p>
                
                <div class="space-y-3">
                    <template x-for="(cap, index) in capabilities" :key="index">
                        <div class="flex gap-2 items-center">
                            <input type="text" name="capabilities[]" x-model="capabilities[index]" placeholder="e.g. Zero-Trust Access Bridges" required
                                   class="flex-grow bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                            <button type="button" @click="capabilities.splice(index, 1)" x-show="capabilities.length > 1" 
                                    class="bg-rose-500/10 border border-rose-500/20 hover:bg-rose-500 hover:text-white text-rose-400 px-3 py-2.5 rounded-lg text-xs font-bold transition-all cursor-pointer">
                                Remove
                            </button>
                        </div>
                    </template>
                </div>
                
                <button type="button" @click="capabilities.push('')" 
                        class="bg-blue-600/10 border border-blue-500/20 hover:bg-blue-600 hover:text-white text-blue-400 px-4 py-2 rounded-lg text-xs font-bold transition-all cursor-pointer">
                    + Add Focus Area
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
                <div class="space-y-2">
                    <label for="sort_order" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Sort Order Index</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="image" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Featured Image</label>
                    <input type="file" name="image" id="image" accept="image/*"
                           class="w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-600/10 file:text-blue-500 hover:file:bg-blue-650/20">
                </div>
            </div>

            <div class="flex items-center gap-6 pt-4 border-t border-slate-800">
                <div class="flex items-center">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                           class="w-4 h-4 rounded text-blue-600 bg-slate-950 border-slate-800 focus:ring-blue-500 cursor-pointer">
                    <label for="is_featured" class="ml-2 text-xs font-semibold text-slate-350 cursor-pointer">Feature on Homepage</label>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded text-blue-600 bg-slate-950 border-slate-800 focus:ring-blue-500 cursor-pointer">
                    <label for="is_active" class="ml-2 text-xs font-semibold text-slate-350 cursor-pointer">Publish Active</label>
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
                    Save Solution
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
