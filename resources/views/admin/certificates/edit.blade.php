@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-3xl">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Edit Certificate</h1>
            <p class="text-xs sm:text-sm text-slate-500">Edit parameters for: <strong class="text-slate-350">{{ $certificate->title }}</strong></p>
        </div>
        <a href="{{ route('admin.certificates.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to Directory</a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 md:p-8 shadow-lg">
        <form action="{{ route('admin.certificates.update', $certificate->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Certificate Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $certificate->title) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="authority" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Issuing Authority *</label>
                    <input type="text" name="authority" id="authority" value="{{ old('authority', $certificate->authority) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="space-y-2">
                <label for="description" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Description *</label>
                <textarea name="description" id="description" rows="4" required
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('description', $certificate->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="edition_year" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Edition / Status Label *</label>
                    <input type="text" name="edition_year" id="edition_year" value="{{ old('edition_year', $certificate->edition_year) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="sort_order" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Sort Order Index</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $certificate->sort_order) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="space-y-2">
                <label for="icon" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Badge SVG HTML (Optional)</label>
                @if($certificate->icon)
                    <div class="flex items-center gap-3 mb-2 text-blue-400">
                        <div class="w-8 h-8 bg-blue-500/10 rounded-lg flex items-center justify-center border border-slate-800">
                            {!! $certificate->icon !!}
                        </div>
                        <span class="text-xs text-slate-500">Current Icon Preview</span>
                    </div>
                @endif
                <textarea name="icon" id="icon" rows="3"
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('icon', $certificate->icon) }}</textarea>
            </div>

            <div class="flex items-center pt-2">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $certificate->is_active) ? 'checked' : '' }}
                       class="w-4 h-4 rounded text-blue-600 bg-slate-950 border-slate-800 focus:ring-blue-500 cursor-pointer">
                <label for="is_active" class="ml-2 text-xs font-semibold text-slate-350 cursor-pointer">Publish Active</label>
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-800">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
                    Update Certificate
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
