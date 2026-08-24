@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Certificates & Awards</h1>
            <p class="text-xs sm:text-sm text-slate-500">Manage compliance certifications, technical partnership badges, and green tech awards.</p>
        </div>
        <a href="{{ route('admin.certificates.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-4 py-2.5 rounded-lg transition-colors shadow-lg hover:shadow-blue-500/10 cursor-pointer">
            + Add Certificate
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl overflow-hidden shadow-lg">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-400">
                <thead class="text-xs text-slate-400 uppercase bg-slate-950/80 border-b border-slate-800">
                    <tr>
                        <th scope="col" class="px-6 py-4">Title</th>
                        <th scope="col" class="px-6 py-4">Authority</th>
                        <th scope="col" class="px-6 py-4">Label/Edition</th>
                        <th scope="col" class="px-6 py-4 text-center">Order</th>
                        <th scope="col" class="px-6 py-4 text-center">Status</th>
                        <th scope="col" class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($certificates as $cert)
                        <tr class="hover:bg-slate-950/20 transition-colors">
                            <td class="px-6 py-4 font-semibold text-white">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-blue-500/10 text-blue-400 rounded-lg flex items-center justify-center shrink-0">
                                        {!! $cert->icon ?: '🏆' !!}
                                    </div>
                                    <span>{{ $cert->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ $cert->authority }}</td>
                            <td class="px-6 py-4"><span class="bg-slate-950 border border-slate-800 px-2 py-0.5 rounded text-xs text-slate-350">{{ $cert->edition_year }}</span></td>
                            <td class="px-6 py-4 text-center text-xs font-bold text-slate-300">{{ $cert->sort_order }}</td>
                            <td class="px-6 py-4 text-center">
                                @if($cert->is_active)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Active</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-rose-500/10 text-rose-400 border border-rose-500/20">Disabled</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.certificates.edit', $cert->id) }}" class="text-xs font-bold text-blue-400 hover:underline">Edit</a>
                                <form action="{{ route('admin.certificates.destroy', $cert->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this certificate?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-rose-400 hover:underline bg-transparent border-0 cursor-pointer">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-slate-500">No certificates found. Click "Add Certificate" to create one.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
