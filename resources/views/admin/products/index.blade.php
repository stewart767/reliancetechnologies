@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Product Catalog</h1>
            <p class="text-xs sm:text-sm text-slate-500">Manage your software solutions and hardware offerings shown on the live site.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-4 py-2.5 rounded-lg transition-colors shadow-lg hover:shadow-blue-500/10 cursor-pointer">
            + Add Product
        </a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl overflow-hidden shadow-lg">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-400">
                <thead class="text-xs text-slate-400 uppercase bg-slate-950/80 border-b border-slate-800">
                    <tr>
                        <th scope="col" class="px-6 py-4">Image</th>
                        <th scope="col" class="px-6 py-4">Title</th>
                        <th scope="col" class="px-6 py-4">Type</th>
                        <th scope="col" class="px-6 py-4">Price</th>
                        <th scope="col" class="px-6 py-4 text-center">Order</th>
                        <th scope="col" class="px-6 py-4 text-center">Status</th>
                        <th scope="col" class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($products as $product)
                        <tr class="hover:bg-slate-950/20 transition-colors">
                            <td class="px-6 py-4">
                                @if($product->image)
                                    <img src="{{ Str::startsWith($product->image, 'images/') ? asset($product->image) : asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->title }}" 
                                         class="w-12 h-12 object-cover rounded-lg border border-slate-800 bg-slate-950">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-slate-950 border border-slate-800 flex items-center justify-center text-slate-600 text-[10px] font-bold">
                                        No Image
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-semibold text-slate-200">
                                <div class="flex items-center gap-3">
                                    @if($product->icon)
                                        <div class="w-8 h-8 bg-blue-500/10 text-blue-400 rounded-lg flex items-center justify-center shrink-0">
                                            {!! $product->icon !!}
                                        </div>
                                    @else
                                        <div class="w-8 h-8 bg-slate-800 text-slate-500 rounded-lg flex items-center justify-center shrink-0">
                                            📦
                                        </div>
                                    @endif
                                    <span>{{ $product->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($product->type === 'software')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-blue-500/10 text-blue-400 border border-blue-500/20">Software</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">Hardware</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-xs font-bold text-slate-300">
                                {{ $product->price ?: '-' }}
                            </td>
                            <td class="px-6 py-4 text-center text-xs font-bold text-slate-300">{{ $product->sort_order }}</td>
                            <td class="px-6 py-4 text-center">
                                @if($product->is_active)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Active</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-rose-500/10 text-rose-400 border border-rose-500/20">Disabled</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="text-xs font-bold text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-red-650 hover:underline bg-transparent border-0 cursor-pointer">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-slate-500">No products found. Click "Add Product" to create one.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
