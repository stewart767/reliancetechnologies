@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-3xl">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Create Project</h1>
            <p class="text-xs sm:text-sm text-slate-500">Add a new representative case study.</p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to Directory</a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 md:p-8 shadow-lg">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Project Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required placeholder="e.g. Microfinance Core Sync Integration"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="slug" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">URL Slug (leave blank to generate)</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="e.g. microfinance-sync"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="industry_id" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Target Industry Sector *</label>
                    <select name="industry_id" id="industry_id" required
                            class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                        <option value="" disabled selected>-- Select Sector --</option>
                        @foreach($industries as $ind)
                            <option value="{{ $ind->id }}" {{ old('industry_id') == $ind->id ? 'selected' : '' }}>{{ $ind->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="client_name" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Client (leave blank for NDAs)</label>
                    <input type="text" name="client_name" id="client_name" value="{{ old('client_name') }}" placeholder="e.g. Confidential Financial Institution"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="space-y-2">
                <label for="challenge" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Challenge (Friction) *</label>
                <textarea name="challenge" id="challenge" rows="3" required placeholder="What operational bottleneck existed..."
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('challenge') }}</textarea>
            </div>

            <div class="space-y-2">
                <label for="solution" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Solution (Architecture) *</label>
                <textarea name="solution" id="solution" rows="4" required placeholder="How we aligned services and wrote software bridges..."
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('solution') }}</textarea>
            </div>

            <div class="space-y-2">
                <label for="results" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Results (Outcomes) *</label>
                <textarea name="results" id="results" rows="3" required placeholder="Efficiency metrics achieved..."
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('results') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="technology" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Technology Stack Used *</label>
                    <input type="text" name="technology" id="technology" value="{{ old('technology') }}" required placeholder="e.g. PHP 8.2, MySQL, API Sync Modules"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="featured_image" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Featured Image</label>
                    <input type="file" name="featured_image" id="featured_image" accept="image/*"
                           class="w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-600/10 file:text-blue-500 hover:file:bg-blue-650/20">
                </div>
            </div>

            <div class="space-y-2">
                <label for="gallery" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Project Gallery Images (Optional)</label>
                <input type="file" name="gallery[]" id="gallery" accept="image/*" multiple
                       class="w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-600/10 file:text-blue-500 hover:file:bg-blue-650/20">
                <p class="text-[10px] text-slate-500">You can select multiple images to show in the project's bottom grid showcase.</p>
            </div>

            <div class="flex items-center gap-6 pt-4 border-t border-slate-800">
                <div class="flex items-center">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                           class="w-4 h-4 rounded text-blue-600 bg-slate-950 border-slate-800 focus:ring-blue-500 cursor-pointer">
                    <label for="is_featured" class="ml-2 text-xs font-semibold text-slate-350 cursor-pointer">Feature on Homepage</label>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded text-blue-600 bg-slate-950 border-slate-800 focus:ring-blue-500 cursor-pointer">
                    <label for="is_published" class="ml-2 text-xs font-semibold text-slate-350 cursor-pointer">Publish Active</label>
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
                    Save Case Study
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
