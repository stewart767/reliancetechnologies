@extends('layouts.app')

@section('seo')
    <x-seo 
        title="{{ $post->meta_title ?: $post->title }}"
        description="{{ $post->meta_description ?: $post->summary }}"
    />
@endsection

@section('content')
    @php
        $imagePath = match($post->category->slug ?? '') {
            'it-consulting' => 'images/services/software-development.jpg',
            'cybersecurity' => 'images/services/cybersecurity.jpg',
            'yaoyao-energies' => 'images/yaoyao/electric-tricycle.jpg',
            default => 'images/hero/hero-bg.jpg'
        };
    @endphp

    <!-- HEADER -->
    <header class="relative bg-slate-900 pt-36 pb-20 md:pt-48 md:pb-28 overflow-hidden">
        <div class="absolute inset-0 bg-radial-gradient from-blue-500/5 via-transparent to-transparent pointer-events-none"></div>
        <div class="container relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <div class="flex items-center gap-4 text-xs">
                    <span class="bg-blue-600/10 text-blue-400 font-bold px-2.5 py-1 rounded">{{ $post->category->name }}</span>
                    <span class="text-slate-500">{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                </div>
                <h1 class="font-title font-extrabold text-3xl sm:text-4xl md:text-5xl text-white leading-tight">{{ $post->title }}</h1>
            </div>
            
            <div class="lg:col-span-5 relative">
                <div class="rounded-3xl overflow-hidden border border-slate-800 shadow-2xl">
                    <img src="{{ asset($imagePath) }}" alt="{{ $post->title }}" class="w-full h-48 sm:h-64 object-cover">
                </div>
            </div>
        </div>
    </header>

    <!-- CONTENT -->
    <section class="py-24 bg-slate-950">
        <div class="container grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left Layout: Content -->
            <div class="lg:col-span-8 space-y-8">
                <!-- Breadcrumbs -->
                <div class="flex items-center gap-2 text-xs text-slate-500 mb-6 flex-wrap">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                    <span>&rarr;</span>
                    <a href="{{ route('insights.index') }}" class="hover:text-white transition-colors">Insights</a>
                    <span>&rarr;</span>
                    <span class="truncate max-w-[200px] text-slate-350">{{ $post->title }}</span>
                </div>
                
                <!-- Blog Content Body (styled for B2B) -->
                <div class="prose prose-slate max-w-none text-slate-300 leading-relaxed text-sm sm:text-base space-y-6">
                    {!! $post->content !!}
                </div>
                
                <div class="pt-8 border-t border-slate-900 flex justify-between items-center">
                    <a href="{{ route('insights.index') }}" class="text-sm font-bold text-slate-400 hover:text-white transition-colors">&larr; Back to Insights</a>
                    <a href="{{ route('contact.index') }}?service={{ urlencode('Inquiry relating to insight: ' . $post->title) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-6 py-3 rounded-lg transition-colors cursor-pointer">
                        Discuss Strategy
                    </a>
                </div>
            </div>
            
            <!-- Right Layout: Categories -->
            <div class="lg:col-span-4 space-y-8">
                <!-- Categories list -->
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-lg">
                    <h3 class="font-title font-bold text-white text-base mb-4">Categories</h3>
                    <ul class="space-y-3 text-sm">
                        @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('insights.category', $cat->slug) }}" class="flex items-center justify-between transition-colors {{ $post->category_id == $cat->id ? 'text-blue-400 font-bold' : 'text-slate-400 hover:text-white' }}">
                                    <span>{{ $cat->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
        </div>
    </section>
@endsection
