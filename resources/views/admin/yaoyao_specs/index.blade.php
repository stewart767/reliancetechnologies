@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">YAOYAO Tricycle Specs</h1>
            <p class="text-xs sm:text-sm text-slate-500">Manage technical parameters, metrics, and capacity fields for YAOYAO Energies cargo electric tricycles.</p>
        </div>
        <a href="{{ route('admin.yaoyao-specs.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-4 py-2.5 rounded-lg transition-colors shadow-lg hover:shadow-blue-500/10 cursor-pointer">
            + Add Specification
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl overflow-hidden shadow-lg">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-400">
                <thead class="text-xs text-slate-400 uppercase bg-slate-950/80 border-b border-slate-800">
                    <tr>
                        <th scope="col" class="px-6 py-4">Group</th>
                        <th scope="col" class="px-6 py-4">Specification Parameter (Key)</th>
                        <th scope="col" class="px-6 py-4">Value</th>
                        <th scope="col" class="px-6 py-4 text-center">Order</th>
                        <th scope="col" class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @php $currentGroup = ''; @endphp
                    @forelse($specs as $spec)
                        @if($currentGroup !== $spec->group)
                            @php $currentGroup = $spec->group; @endphp
                            <tr class="bg-slate-950/60 font-bold text-xs uppercase tracking-wider text-blue-500 border-t border-slate-800">
                                <td colspan="5" class="px-6 py-2 bg-slate-950/40">{{ $currentGroup }}</td>
                            </tr>
                        @endif
                        <tr class="hover:bg-slate-950/20 transition-colors">
                            <td class="px-6 py-4 text-xs font-semibold text-slate-500">{{ $spec->group }}</td>
                            <td class="px-6 py-4 font-semibold text-white">{{ $spec->key }}</td>
                            <td class="px-6 py-4 text-slate-300 font-medium">{{ $spec->value }}</td>
                            <td class="px-6 py-4 text-center text-xs font-bold text-slate-500">{{ $spec->sort_order }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.yaoyao-specs.edit', $spec->id) }}" class="text-xs font-bold text-blue-400 hover:underline">Edit</a>
                                <form action="{{ route('admin.yaoyao-specs.destroy', $spec->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this specification?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-rose-400 hover:underline bg-transparent border-0 cursor-pointer">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-slate-500">No specifications found. Click "Add Specification" to create one.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
