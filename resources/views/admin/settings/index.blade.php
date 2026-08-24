@extends('layouts.admin')

@section('content')
<div class="space-y-8 max-w-4xl">
    <div class="space-y-2">
        <h1 class="font-title font-extrabold text-2xl md:text-3xl text-white">Company Settings</h1>
        <p class="text-xs sm:text-sm text-slate-500">Manage support desk contact numbers, emails, and social media links dynamically.</p>
    </div>

    @if($errors->any())
        <div class="p-4 bg-rose-500/10 border border-rose-500/20 text-rose-400 rounded-lg text-xs">
            <ul class="list-disc pl-5 space-y-0.5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        @foreach($settings as $group => $items)
            <div class="bg-slate-900 border border-slate-800 rounded-xl p-6 md:p-8 space-y-6 shadow-lg">
                <h3 class="font-title font-bold text-white text-base border-b border-slate-800 pb-3 uppercase tracking-wider text-xs text-blue-500">
                    {{ Str::title(str_replace('_', ' ', $group)) }} Configuration
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($items as $item)
                        <div class="space-y-2 {{ $item->type === 'textarea' ? 'md:col-span-2' : '' }}">
                            <label for="settings_{{ $item->key }}" class="block text-xs font-bold text-slate-400 uppercase tracking-wider">
                                {{ $item->display_name }}
                            </label>
                            
                            @if($item->type === 'file')
                                @if($item->value)
                                    <div class="flex items-center gap-4 mb-2">
                                        <img src="{{ Str::startsWith($item->value, 'images/') ? asset($item->value) : asset('storage/' . $item->value) }}" alt="{{ $item->display_name }}" class="h-10 w-16 object-contain rounded border border-slate-850">
                                        <span class="text-[10px] text-slate-500">Current asset</span>
                                    </div>
                                @endif
                                <input type="file" 
                                       name="settings[{{ $item->key }}]" 
                                       id="settings_{{ $item->key }}"
                                       class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-blue-500 transition-colors text-slate-400 file:mr-4 file:py-1.5 file:px-4 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-blue-600/10 file:text-blue-400 file:cursor-pointer hover:file:bg-blue-600/20">
                            @elseif($item->type === 'textarea')
                                <textarea name="settings[{{ $item->key }}]" 
                                          id="settings_{{ $item->key }}" 
                                          rows="4"
                                          placeholder="Provide configuration value..."
                                          class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white placeholder-slate-700 resize-y">{{ old('settings.' . $item->key, $item->value) }}</textarea>
                            @else
                                <input type="text" 
                                       name="settings[{{ $item->key }}]" 
                                       id="settings_{{ $item->key }}" 
                                       value="{{ old('settings.' . $item->key, $item->value) }}"
                                       placeholder="Provide configuration value..."
                                       class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-white placeholder-slate-700">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="flex justify-end pt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors cursor-pointer shadow-lg hover:shadow-blue-500/10">
                Save Settings
            </button>
        </div>
    </form>
</div>
@endsection
