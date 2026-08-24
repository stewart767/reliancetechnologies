@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Board & Executive Management</h1>
            <p class="text-xs sm:text-sm text-slate-500">Manage executive directors and key leaders appearing on the Leadership page.</p>
        </div>
        <a href="{{ route('admin.leaders.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-4 py-2.5 rounded-lg transition-colors shadow-lg hover:shadow-blue-500/10 cursor-pointer">
            + Add Board Member
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl overflow-hidden shadow-lg">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-400">
                <thead class="text-xs text-slate-400 uppercase bg-slate-950/80 border-b border-slate-800">
                    <tr>
                        <th scope="col" class="px-6 py-4">Avatar</th>
                        <th scope="col" class="px-6 py-4">Name</th>
                        <th scope="col" class="px-6 py-4">Role</th>
                        <th scope="col" class="px-6 py-4">Experience</th>
                        <th scope="col" class="px-6 py-4">Location/Label</th>
                        <th scope="col" class="px-6 py-4 text-center">Order</th>
                        <th scope="col" class="px-6 py-4 text-center">Status</th>
                        <th scope="col" class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($leaders as $leader)
                        <tr class="hover:bg-slate-950/20 transition-colors">
                            <td class="px-6 py-4">
                                @if($leader->avatar)
                                    <img src="{{ asset('storage/' . $leader->avatar) }}" alt="{{ $leader->name }}" class="w-10 h-10 rounded-full object-cover border border-slate-800">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-slate-950 border border-slate-850 flex items-center justify-center text-slate-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-semibold text-white">{{ $leader->name }}</td>
                            <td class="px-6 py-4">{{ $leader->role }}</td>
                            <td class="px-6 py-4 text-xs font-semibold">{{ $leader->experience_years }} Yrs</td>
                            <td class="px-6 py-4"><span class="bg-slate-950 border border-slate-800 px-2 py-0.5 rounded text-xs text-slate-350">{{ $leader->location }}</span></td>
                            <td class="px-6 py-4 text-center text-xs font-bold text-slate-300">{{ $leader->sort_order }}</td>
                            <td class="px-6 py-4 text-center">
                                @if($leader->is_active)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Active</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-rose-500/10 text-rose-400 border border-rose-500/20">Disabled</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.leaders.edit', $leader->id) }}" class="text-xs font-bold text-blue-400 hover:underline">Edit</a>
                                <form action="{{ route('admin.leaders.destroy', $leader->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this board member?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-rose-400 hover:underline bg-transparent border-0 cursor-pointer">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-8 text-center text-slate-500">No board members found. Click "Add Board Member" to create one.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
