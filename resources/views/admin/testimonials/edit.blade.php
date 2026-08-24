@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-2xl">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Edit Testimonial</h1>
            <p class="text-xs sm:text-sm text-slate-500">Modify client operations review parameters.</p>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to Directory</a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 md:p-8 shadow-lg">
        <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="client_name" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Client Name *</label>
                    <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $testimonial->client_name) }}" required placeholder="e.g. Fatma Said"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="company" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Company Name *</label>
                    <input type="text" name="company" id="company" value="{{ old('company', $testimonial->company) }}" required placeholder="e.g. East Coast Logistics"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="position" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Job Title / Position *</label>
                    <input type="text" name="position" id="position" value="{{ old('position', $testimonial->position) }}" required placeholder="e.g. Logistics Director"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="sort_order" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Sort Order Index</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="space-y-2">
                <label for="testimonial" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Testimonial Statement *</label>
                <textarea name="testimonial" id="testimonial" rows="5" required placeholder="Write the client's operations feedback..."
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('testimonial', $testimonial->testimonial) }}</textarea>
            </div>

            <div class="space-y-2">
                <label for="image" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Client Avatar Image (Optional)</label>
                @if($testimonial->image)
                    <div class="flex items-center gap-4 mb-2">
                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->client_name }}" class="w-12 h-12 object-cover rounded-full border border-slate-850">
                        <span class="text-[10px] text-slate-500">Current avatar</span>
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*"
                       class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-blue-500 transition-colors text-slate-400 file:mr-4 file:py-1.5 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-600/10 file:text-blue-400 file:cursor-pointer hover:file:bg-blue-600/20">
                <p class="text-[10px] text-slate-500">Image size limit is 2MB. Leave blank to retain existing.</p>
            </div>

            <div class="flex items-center pt-4 border-t border-slate-800">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}
                       class="w-4 h-4 rounded text-blue-600 bg-slate-950 border-slate-800 focus:ring-blue-500 cursor-pointer">
                <label for="is_active" class="ml-2 text-xs font-semibold text-slate-350 cursor-pointer">Publish Active</label>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
                    Update Testimonial
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
