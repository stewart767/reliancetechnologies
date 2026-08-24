@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    <div class="space-y-2">
        <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">B2B Contact Inquiries</h1>
        <p class="text-xs sm:text-sm text-slate-500">History log of all client contact form submissions.</p>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl overflow-hidden shadow-lg">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-950/60 text-slate-400 border-b border-slate-800/80 text-xs font-bold uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Submitter</th>
                        <th class="px-6 py-3">Company</th>
                        <th class="px-6 py-3">Telephone</th>
                        <th class="px-6 py-3">Service Required</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Received</th>
                        <th class="px-6 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/50">
                    @forelse($submissions as $sub)
                        <tr class="hover:bg-slate-900/40">
                            <td class="px-6 py-4">
                                <p class="font-bold text-slate-200">{{ $sub->name }}</p>
                                <p class="text-xs text-slate-500">{{ $sub->email }}</p>
                            </td>
                            <td class="px-6 py-4 text-slate-300">{{ $sub->company }}</td>
                            <td class="px-6 py-4 text-slate-400">{{ $sub->phone }}</td>
                            <td class="px-6 py-4 text-slate-400">{{ $sub->service }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider 
                                    {{ $sub->status == 'pending' ? 'bg-red-500/10 text-red-400 border border-red-500/20' : ($sub->status == 'processed' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-slate-950 text-slate-500 border border-slate-800') }}">
                                    {{ $sub->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-500 text-xs">{{ $sub->created_at->format('M d, Y H:i') }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end items-center gap-3">
                                    <a href="{{ route('admin.contact-submissions.show', $sub->id) }}" class="text-xs font-bold text-blue-500 hover:underline">Inspect</a>
                                    
                                    <form action="{{ route('admin.contact-submissions.destroy', $sub->id) }}" method="POST" onsubmit="return confirm('Delete this submission record permanently?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-bold text-red-500 hover:underline bg-none border-none cursor-pointer">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-slate-500">No contact submissions received yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
