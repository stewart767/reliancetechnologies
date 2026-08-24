@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-3xl">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Add Board Member</h1>
            <p class="text-xs sm:text-sm text-slate-500">Create a new executive or manager profile.</p>
        </div>
        <a href="{{ route('admin.leaders.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to Directory</a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 md:p-8 shadow-lg">
        <form action="{{ route('admin.leaders.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="name" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Full Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="role" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Role / Designation *</label>
                    <input type="text" name="role" id="role" value="{{ old('role') }}" required
                           placeholder="e.g. Chief Technology Officer"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="space-y-2">
                <label for="bio" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Biography / Description *</label>
                <textarea name="bio" id="bio" rows="5" required
                          placeholder="Provide a summary of experience and operations oversight..."
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('bio') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="space-y-2">
                    <label for="experience_years" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Years of Experience *</label>
                    <input type="number" name="experience_years" id="experience_years" value="{{ old('experience_years', 5) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="location" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Location / Label *</label>
                    <input type="text" name="location" id="location" value="{{ old('location', 'Dar es Salaam') }}" required
                           placeholder="e.g. Threat Intelligence"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="sort_order" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Sort Order Index</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="space-y-2">
                <label for="avatar" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Upload Avatar Image</label>
                <input type="file" name="avatar" id="avatar" accept="image/*"
                       class="w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-600/10 file:text-blue-500 hover:file:bg-blue-650/20">
            </div>

            <div class="flex items-center pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}
                       class="w-4 h-4 rounded text-blue-600 bg-slate-950 border-slate-800 focus:ring-blue-500 cursor-pointer">
                <label for="is_active" class="ml-2 text-xs font-semibold text-slate-350 cursor-pointer">Publish Active</label>
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-800">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
                    Create Member
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
