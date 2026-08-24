@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-3xl">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Edit Specification</h1>
            <p class="text-xs sm:text-sm text-slate-500">Edit settings for: <strong class="text-slate-350">{{ $yaoyaoSpec->key }}</strong></p>
        </div>
        <a href="{{ route('admin.yaoyao-specs.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to Directory</a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 md:p-8 shadow-lg">
        <form action="{{ route('admin.yaoyao-specs.update', $yaoyaoSpec->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label for="group" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Specification Group *</label>
                <select name="group" id="group" required
                        class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                    <option value="General Specifications" {{ old('group', $yaoyaoSpec->group) === 'General Specifications' ? 'selected' : '' }}>General Specifications</option>
                    <option value="Performance Metrics" {{ old('group', $yaoyaoSpec->group) === 'Performance Metrics' ? 'selected' : '' }}>Performance Metrics</option>
                    <option value="Battery & Charging" {{ old('group', $yaoyaoSpec->group) === 'Battery & Charging' ? 'selected' : '' }}>Battery & Charging</option>
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="key" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Parameter Name (Key) *</label>
                    <input type="text" name="key" id="key" value="{{ old('key', $yaoyaoSpec->key) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="value" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Specification Value *</label>
                    <input type="text" name="value" id="value" value="{{ old('value', $yaoyaoSpec->value) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="space-y-2">
                <label for="sort_order" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Sort Order Index</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $yaoyaoSpec->sort_order) }}" required
                       class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-800">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
                    Update Specification
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
