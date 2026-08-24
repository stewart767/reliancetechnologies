@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-4xl">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Insight Categories</h1>
            <p class="text-xs sm:text-sm text-slate-500">Manage categories grouping thought leadership blog posts.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-5 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
            Create Category
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl overflow-hidden shadow-lg">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-950/60 text-slate-400 border-b border-slate-800/80 text-xs font-bold uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3">Category Name</th>
                    <th class="px-6 py-3">Slug</th>
                    <th class="px-6 py-3">Articles Count</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800/50">
                @forelse($categories as $cat)
                    <tr class="hover:bg-slate-900/40">
                        <td class="px-6 py-4 font-bold text-slate-200">{{ $cat->name }}</td>
                        <td class="px-6 py-4 font-mono text-slate-400 text-xs">{{ $cat->slug }}</td>
                        <td class="px-6 py-4 font-semibold text-slate-300">{{ $cat->posts_count }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center gap-3">
                                <a href="{{ route('admin.categories.edit', $cat->id) }}" class="text-xs font-bold text-blue-500 hover:underline">Edit</a>
                                
                                <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Delete this category? Dynamic posts under it might lose binding!');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-red-500 hover:underline bg-none border-none cursor-pointer">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-slate-500">No category options created.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
