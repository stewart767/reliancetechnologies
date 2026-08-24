@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-3xl">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Add Certificate</h1>
            <p class="text-xs sm:text-sm text-slate-500">Add a new certification, compliance standard, or green energy award.</p>
        </div>
        <a href="{{ route('admin.certificates.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to Directory</a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 md:p-8 shadow-lg">
        <form action="{{ route('admin.certificates.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Certificate Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                           placeholder="e.g. Cisco Select Partner"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="authority" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Issuing Authority *</label>
                    <input type="text" name="authority" id="authority" value="{{ old('authority') }}" required
                           placeholder="e.g. Cisco Systems, Inc. / TCRA"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="space-y-2">
                <label for="description" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Description *</label>
                <textarea name="description" id="description" rows="4" required
                          placeholder="Provide details about the parameters and validity of the certification..."
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="edition_year" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Edition / Status Label *</label>
                    <input type="text" name="edition_year" id="edition_year" value="{{ old('edition_year', '2026 Edition') }}" required
                           placeholder="e.g. 2026 Edition, ISMS standard, Azure certified"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="sort_order" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Sort Order Index</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="space-y-2">
                <label for="icon" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Badge SVG HTML (Optional)</label>
                <textarea name="icon" id="icon" rows="3"
                          placeholder="&lt;svg ...&gt;&lt;/svg&gt;"
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('icon') }}</textarea>
            </div>

            <div class="flex items-center pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}
                       class="w-4 h-4 rounded text-blue-600 bg-slate-950 border-slate-800 focus:ring-blue-500 cursor-pointer">
                <label for="is_active" class="ml-2 text-xs font-semibold text-slate-350 cursor-pointer">Publish Active</label>
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-800">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
                    Create Certificate
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
