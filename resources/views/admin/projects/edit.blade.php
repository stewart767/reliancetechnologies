@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-3xl">
    <div class="flex items-center justify-between flex-wrap gap-4">
        <div class="space-y-2">
            <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Edit Project</h1>
            <p class="text-xs sm:text-sm text-slate-500">Edit parameters for: <strong class="text-slate-350">{{ $project->title }}</strong></p>
        </div>
        <a href="{{ route('admin.projects.index') }}" class="text-xs font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to Directory</a>
    </div>

    <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 md:p-8 shadow-lg">
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="title" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Project Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="slug" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">URL Slug *</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $project->slug) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="industry_id" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Target Industry Sector *</label>
                    <select name="industry_id" id="industry_id" required
                            class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                        @foreach($industries as $ind)
                            <option value="{{ $ind->id }}" {{ old('industry_id', $project->industry_id) == $ind->id ? 'selected' : '' }}>{{ $ind->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="client_name" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Client (leave blank for NDAs)</label>
                    <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $project->client_name) }}"
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>
            </div>

            <div class="space-y-2">
                <label for="challenge" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Challenge (Friction) *</label>
                <textarea name="challenge" id="challenge" rows="3" required
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('challenge', $project->challenge) }}</textarea>
            </div>

            <div class="space-y-2">
                <label for="solution" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Solution (Architecture) *</label>
                <textarea name="solution" id="solution" rows="4" required
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('solution', $project->solution) }}</textarea>
            </div>

            <div class="space-y-2">
                <label for="results" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Results (Outcomes) *</label>
                <textarea name="results" id="results" rows="3" required
                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white resize-y">{{ old('results', $project->results) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="technology" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Technology Stack Used *</label>
                    <input type="text" name="technology" id="technology" value="{{ old('technology', $project->technology) }}" required
                           class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white">
                </div>

                <div class="space-y-2">
                    <label for="featured_image" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Change Featured Image</label>
                    @if($project->featured_image)
                        <div class="flex items-center gap-4 mb-2">
                            <img src="{{ asset('storage/' . $project->featured_image) }}" alt="Featured image" class="h-10 w-16 object-cover rounded border border-slate-850">
                            <span class="text-[10px] text-slate-500">Current featured image</span>
                        </div>
                    @endif
                    <input type="file" name="featured_image" id="featured_image" accept="image/*"
                           class="w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-600/10 file:text-blue-500 hover:file:bg-blue-650/20">
                </div>
            </div>

            <div class="space-y-2">
                <label for="gallery" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Add More Gallery Images</label>
                <input type="file" name="gallery[]" id="gallery" accept="image/*" multiple
                       class="w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-600/10 file:text-blue-500 hover:file:bg-blue-650/20">
                <p class="text-[10px] text-slate-500">Upload additional captures from the deployed system landscape.</p>
            </div>

            @if($project->gallery->isNotEmpty())
                <div class="space-y-4 pt-6 border-t border-slate-800">
                    <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Existing Gallery Images</label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        @foreach($project->gallery as $image)
                            <div class="relative bg-slate-950 border border-slate-850 rounded-lg overflow-hidden p-2">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gallery Image" class="w-full h-24 object-cover rounded">
                                <div class="mt-2 flex justify-end">
                                    <button type="button" onclick="confirm('Delete this gallery image?') ? document.getElementById('delete-image-{{ $image->id }}').submit() : null" class="text-[10px] font-bold text-red-500 hover:underline cursor-pointer bg-transparent border-none">
                                        Delete Image
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @foreach($project->gallery as $image)
                    <form id="delete-image-{{ $image->id }}" action="{{ route('admin.projects.gallery.destroy', [$project->id, $image->id]) }}" method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach
            @endif

            <div class="flex items-center gap-6 pt-4 border-t border-slate-800">
                <div class="flex items-center">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}
                           class="w-4 h-4 rounded text-blue-600 bg-slate-950 border-slate-800 focus:ring-blue-500 cursor-pointer">
                    <label for="is_featured" class="ml-2 text-xs font-semibold text-slate-350 cursor-pointer">Feature on Homepage</label>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $project->is_published) ? 'checked' : '' }}
                           class="w-4 h-4 rounded text-blue-600 bg-slate-950 border-slate-800 focus:ring-blue-500 cursor-pointer">
                    <label for="is_published" class="ml-2 text-xs font-semibold text-slate-350 cursor-pointer">Publish Active</label>
                </div>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg transition-colors cursor-pointer shadow">
                    Update Case Study
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
