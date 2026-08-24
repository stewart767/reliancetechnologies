@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-4xl">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Inquiry Details</h1>
            <p class="text-xs sm:text-sm text-slate-500">Submitted by: <strong class="text-slate-350">{{ $submission->name }}</strong></p>
        </div>
        <a href="{{ route('admin.contact-submissions.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to Listings</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left details -->
        <div class="lg:col-span-8 bg-slate-900 border border-slate-800 rounded-xl p-6 md:p-8 space-y-6 shadow-lg">
            <div class="border-b border-slate-800 pb-4">
                <span class="text-[10px] uppercase font-bold text-slate-500 tracking-wider block mb-1">Service Requested:</span>
                <span class="text-lg font-bold text-white font-title">{{ $submission->service }}</span>
            </div>
            
            <div class="space-y-2">
                <span class="text-[10px] uppercase font-bold text-slate-500 tracking-wider block">Message:</span>
                <div class="bg-slate-950 border border-slate-850 p-6 rounded-lg text-sm sm:text-base text-slate-300 leading-relaxed whitespace-pre-wrap select-all">{{ $submission->message }}</div>
            </div>
        </div>

        <!-- Right details -->
        <div class="lg:col-span-4 space-y-6">
            <!-- Contact info card -->
            <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 shadow-lg space-y-4">
                <h3 class="font-title font-bold text-white text-sm uppercase tracking-wider border-b border-slate-850 pb-2">Sender Metadata</h3>
                <div class="space-y-3 text-xs">
                    <div>
                        <strong class="text-slate-500 block mb-0.5">Company:</strong>
                        <span class="text-slate-300">{{ $submission->company }}</span>
                    </div>
                    <div>
                        <strong class="text-slate-500 block mb-0.5">Email Address:</strong>
                        <a href="mailto:{{ $submission->email }}" class="text-blue-500 hover:underline">{{ $submission->email }}</a>
                    </div>
                    <div>
                        <strong class="text-slate-500 block mb-0.5">Phone Number:</strong>
                        <span class="text-slate-300">{{ $submission->phone }}</span>
                    </div>
                    <div>
                        <strong class="text-slate-500 block mb-0.5">Submitted At:</strong>
                        <span class="text-slate-300">{{ $submission->created_at->format('M d, Y H:i:s') }}</span>
                    </div>
                </div>
            </div>

            <!-- Status toggler -->
            <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 shadow-lg space-y-4">
                <h3 class="font-title font-bold text-white text-sm uppercase tracking-wider border-b border-slate-850 pb-2">Modify Status</h3>
                <form action="{{ route('admin.contact-submissions.status', $submission->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    
                    <select name="status" class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-xs text-white focus:outline-none focus:border-blue-500 transition-colors">
                        <option value="pending" {{ $submission->status == 'pending' ? 'selected' : '' }}>Pending Review</option>
                        <option value="processed" {{ $submission->status == 'processed' ? 'selected' : '' }}>Processed / Replied</option>
                        <option value="archived" {{ $submission->status == 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>

                    <button type="submit" class="w-full bg-blue-650 hover:bg-blue-750 text-white font-semibold text-xs py-2.5 rounded-lg transition-colors cursor-pointer shadow">
                        Update Status
                    </button>
                </form>
            </div>
        </div>
        
    </div>
</div>
@endsection
