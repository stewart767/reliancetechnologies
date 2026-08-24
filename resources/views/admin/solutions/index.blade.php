@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Solutions Directory</h1>
            <p class="text-xs sm:text-sm text-slate-500">Manage integrated technology solutions configured on the website.</p>
        </div>
        <a href="{{ route('admin.solutions.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-5 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
            Create Solution
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl overflow-hidden shadow-lg">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-950/60 text-slate-400 border-b border-slate-800/80 text-xs font-bold uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3">Order</th>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Featured</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800/50">
                @forelse($solutions as $sol)
                    <tr class="hover:bg-slate-900/40">
                        <td class="px-6 py-4 font-mono text-slate-500">{{ $sol->sort_order }}</td>
                        <td class="px-6 py-4">
                            <p class="font-bold text-slate-200">{{ $sol->title }}</p>
                            <p class="text-xs text-slate-500">Slug: {{ $sol->slug }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider {{ $sol->is_featured ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20' : 'bg-slate-950 text-slate-600 border border-slate-800/80' }}">
                                {{ $sol->is_featured ? 'Yes' : 'No' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider {{ $sol->is_active ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-red-500/10 text-red-400 border border-rose-500/20' }}">
                                {{ $sol->is_active ? 'Active' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center gap-3">
                                <a href="{{ route('admin.solutions.edit', $sol->id) }}" class="text-xs font-bold text-blue-500 hover:underline">Edit</a>
                                
                                <form action="{{ route('admin.solutions.destroy', $sol->id) }}" method="POST" onsubmit="return confirm('Delete this solution permanently?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-red-500 hover:underline bg-none border-none cursor-pointer">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-500">No solutions entries configured.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
