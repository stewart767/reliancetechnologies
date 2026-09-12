@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-3xl">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Create Product</h1>
            <p class="text-xs sm:text-sm text-slate-500">Draft a new software solution or hardware item for the catalog.</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to Directory</a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 md:p-8 shadow-lg">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6"
              x-data="{ type: '{{ old('type', 'software') }}', features: {{ json_encode(old('features', [''])) }}, specs: {{ json_encode(old('specs', [''])) }} }">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="type" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Product Type *</label>
                    <select name="type" id="type" x-model="type" required
                            class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                        <option value="software">Software Product</option>
                        <option value="hardware">Hardware / Infrastructure</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Product Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="e.g. Smart Sale POS"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="space-y-2">
                <label for="description" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Description *</label>
                <textarea name="description" id="description" rows="5" required placeholder="Describe product details, benefits, and target market..."
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('description') }}</textarea>
            </div>

            <!-- Website Link (Software Only) -->
            <div class="space-y-2" x-show="type === 'software'">
                <label for="website_url" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Website URL</label>
                <input type="text" name="website_url" id="website_url" value="{{ old('website_url') }}" placeholder="e.g. https://www.smartsale.co.tz"
                       class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
            </div>

            <!-- Price field (Hardware Only) -->
            <div class="space-y-2" x-show="type === 'hardware'">
                <label for="price" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Pricing / Label *</label>
                <input type="text" name="price" id="price" value="{{ old('price') }}" placeholder="e.g. TZS 2,400,000"
                       class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
            </div>

            <!-- Dynamic Software Features (Software Only) -->
            <div class="space-y-4" x-show="type === 'software'">
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Core Features</label>
                <p class="text-[10px] text-slate-500 leading-relaxed">List distinct functionality highlights for the software suite.</p>
                
                <div class="space-y-3">
                    <template x-for="(feat, index) in features" :key="index">
                        <div class="flex gap-2 items-center">
                            <input type="text" name="features[]" x-model="features[index]" placeholder="e.g. Offline Sales Buffer Sync"
                                   class="flex-grow bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                            <button type="button" @click="features.splice(index, 1)" x-show="features.length > 1" 
                                    class="bg-rose-500/10 border border-rose-500/20 hover:bg-rose-500 hover:text-white text-rose-400 px-3 py-2.5 rounded-lg text-xs font-bold transition-all cursor-pointer">
                                Remove
                            </button>
                        </div>
                    </template>
                </div>
                
                <button type="button" @click="features.push('')" 
                        class="bg-blue-600/10 border border-blue-500/20 hover:bg-blue-600 hover:text-white text-blue-400 px-4 py-2 rounded-lg text-xs font-bold transition-all cursor-pointer">
                    + Add Feature
                </button>
            </div>

            <!-- Dynamic Hardware Specifications (Hardware Only) -->
            <div class="space-y-4" x-show="type === 'hardware'">
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Hardware Specifications</label>
                <p class="text-[10px] text-slate-500 leading-relaxed">List hardware parameters, dimensions, processing cores, or warranty terms.</p>
                
                <div class="space-y-3">
                    <template x-for="(spec, index) in specs" :key="index">
                        <div class="flex gap-2 items-center">
                            <input type="text" name="specs[]" x-model="specs[index]" placeholder="e.g. 16GB DDR5 4800MHz RAM"
                                   class="flex-grow bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                            <button type="button" @click="specs.splice(index, 1)" x-show="specs.length > 1" 
                                    class="bg-rose-500/10 border border-rose-500/20 hover:bg-rose-500 hover:text-white text-rose-400 px-3 py-2.5 rounded-lg text-xs font-bold transition-all cursor-pointer">
                                Remove
                            </button>
                        </div>
                    </template>
                </div>
                
                <button type="button" @click="specs.push('')" 
                        class="bg-blue-600/10 border border-blue-500/20 hover:bg-blue-600 hover:text-white text-blue-400 px-4 py-2 rounded-lg text-xs font-bold transition-all cursor-pointer">
                    + Add Spec
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2 md:col-span-2">
                    <label for="icon" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Icon SVG HTML (Optional)</label>
                    <input type="text" name="icon" id="icon" value="{{ old('icon') }}" placeholder='<svg class="w-6 h-6 text-blue-500" fill="none" ...></svg>'
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="sort_order" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Sort Order Index</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="image" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Product Photo / Image</label>
                    <input type="file" name="image" id="image" accept="image/*"
                           class="w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-600/10 file:text-blue-500 hover:file:bg-blue-650/20">
                </div>

                <div class="flex items-center gap-6 pt-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                               class="w-4 h-4 rounded text-blue-600 bg-slate-950 border-slate-800 focus:ring-blue-500 cursor-pointer">
                        <label for="is_active" class="ml-2 text-xs font-semibold text-slate-350 cursor-pointer">Publish Active</label>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-800">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
                    Save Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
