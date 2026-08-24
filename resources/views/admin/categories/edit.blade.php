@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-2xl">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Edit Category</h1>
            <p class="text-xs sm:text-sm text-slate-500">Edit parameters for: <strong class="text-slate-350">{{ $category->name }}</strong></p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to Directory</a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 md:p-8 shadow-lg">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                <div class="space-y-2">
                    <label for="name" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Category Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="slug" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">URL Slug *</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="description" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Description (optional)</label>
                    <textarea name="description" id="description" rows="3"
                              class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('description', $category->description) }}</textarea>
                </div>
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-800">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
                    Update Category
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
