@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Partners &amp; Associations</h1>
            <p class="text-xs sm:text-sm text-slate-500">Manage partner logos and affiliations displayed in the trust strip of the homepage.</p>
        </div>
        <a href="{{ route('admin.partners.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-5 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
            Add Partner / Association
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl overflow-hidden shadow-lg">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-950/60 text-slate-400 border-b border-slate-800/80 text-xs font-bold uppercase tracking-wider">
                <tr>
                    <th class="px-6 py-3">Order</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Logo</th>
                    <th class="px-6 py-3">Website Link</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800/50">
                @forelse($partners as $part)
                    <tr class="hover:bg-slate-900/40">
                        <td class="px-6 py-4 font-mono text-slate-500">{{ $part->sort_order }}</td>
                        <td class="px-6 py-4 font-bold text-slate-200">{{ $part->name }}</td>
                        <td class="px-6 py-4">
                            @if($part->logo)
                                <span class="text-xs bg-slate-950 px-3 py-1 rounded text-slate-400 border border-slate-800 font-mono">
                                    {{ Str::limit(basename($part->logo), 20) }}
                                </span>
                            @else
                                <span class="text-slate-600 text-xs">No image</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-mono text-xs text-blue-500 select-all">
                            @if($part->website)
                                <a href="{{ $part->website }}" target="_blank" class="hover:underline">{{ $part->website }}</a>
                            @else
                                <span class="text-slate-600">None</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider {{ $part->is_active ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-red-500/10 text-red-400 border border-rose-500/20' }}">
                                {{ $part->is_active ? 'Active' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center gap-3">
                                <a href="{{ route('admin.partners.edit', $part->id) }}" class="text-xs font-bold text-blue-500 hover:underline">Edit</a>
                                
                                <form action="{{ route('admin.partners.destroy', $part->id) }}" method="POST" onsubmit="return confirm('Delete this technology partner and associated asset links permanently?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-red-500 hover:underline bg-none border-none cursor-pointer">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-500">No technology partners registered.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
