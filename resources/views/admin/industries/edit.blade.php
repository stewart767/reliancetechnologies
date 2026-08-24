@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-3xl">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Edit Industry</h1>
            <p class="text-xs sm:text-sm text-slate-500">Edit parameters for: <strong class="text-slate-350">{{ $industry->name }}</strong></p>
        </div>
        <a href="{{ route('admin.industries.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to Directory</a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 md:p-8 shadow-lg">
        <form action="{{ route('admin.industries.update', $industry->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="name" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Sector Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $industry->name) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="slug" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">URL Slug *</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $industry->slug) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="space-y-2">
                <label for="challenge" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Operational Challenge *</label>
                <textarea name="challenge" id="challenge" rows="3" required
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('challenge', $industry->challenge) }}</textarea>
            </div>

            <div class="space-y-2">
                <label for="opportunity" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Technology Opportunity *</label>
                <textarea name="opportunity" id="opportunity" rows="3" required
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('opportunity', $industry->opportunity) }}</textarea>
            </div>

            <div class="space-y-2">
                <label for="solution_desc" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Reliance Solutions Alignment *</label>
                <textarea name="solution_desc" id="solution_desc" rows="4" required
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('solution_desc', $industry->solution_desc) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
                <div class="space-y-2">
                    <label for="sort_order" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Sort Order Index</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $industry->sort_order) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="flex items-center pt-8">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $industry->is_active) ? 'checked' : '' }}
                           class="w-4 h-4 rounded text-blue-600 bg-slate-950 border-slate-800 focus:ring-blue-500 cursor-pointer">
                    <label for="is_active" class="ml-2 text-xs font-semibold text-slate-350 cursor-pointer">Publish Active</label>
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-800">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
                    Update Sector
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
