@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    <div class="space-y-2">
        <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Dashboard Overview</h1>
        <p class="text-xs sm:text-sm text-slate-500">Summary statistics and recent corporate B2B inquiries.</p>
    </div>

    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-6 gap-6">
        <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 space-y-2">
            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Services</span>
            <p class="text-3xl font-extrabold text-white font-title">{{ $stats['services'] }}</p>
        </div>
        <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 space-y-2">
            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Solutions</span>
            <p class="text-3xl font-extrabold text-white font-title">{{ $stats['solutions'] }}</p>
        </div>
        <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 space-y-2">
            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Industries</span>
            <p class="text-3xl font-extrabold text-white font-title">{{ $stats['industries'] }}</p>
        </div>
        <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 space-y-2">
            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Projects</span>
            <p class="text-3xl font-extrabold text-white font-title">{{ $stats['projects'] }}</p>
        </div>
        <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 space-y-2">
            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Articles</span>
            <p class="text-3xl font-extrabold text-white font-title">{{ $stats['posts'] }}</p>
        </div>
        <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 space-y-2 ring-1 ring-red-500/20 bg-red-500/5">
            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">New Queries</span>
            <p class="text-3xl font-extrabold text-red-400 font-title">{{ $stats['inquiries'] }}</p>
        </div>
    </div>

    <!-- Recent Submissions Table -->
    <div class="bg-slate-900 border border-slate-800 rounded-xl overflow-hidden shadow-lg">
        <div class="px-6 py-4 border-b border-slate-800 bg-slate-900/60 flex items-center justify-between">
            <h3 class="font-title font-bold text-white text-base">Recent B2B Inquiries</h3>
            <a href="{{ route('admin.contact-submissions.index') }}" class="text-xs font-bold text-blue-500 hover:underline">View All</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-950/60 text-slate-400 border-b border-slate-800/80 text-xs font-bold uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-3">Submitter</th>
                        <th class="px-6 py-3">Company</th>
                        <th class="px-6 py-3">Service</th>
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
                            <td class="px-6 py-4 text-slate-400">{{ $sub->service }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider 
                                    {{ $sub->status == 'pending' ? 'bg-red-500/10 text-red-400 border border-red-500/20' : ($sub->status == 'processed' ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-slate-950 text-slate-500 border border-slate-800') }}">
                                    {{ $sub->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-500 text-xs">{{ $sub->created_at->format('M d, Y H:i') }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.contact-submissions.show', $sub->id) }}" class="text-xs font-bold text-blue-500 hover:underline">Inspect</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-500">No contact submissions received yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
