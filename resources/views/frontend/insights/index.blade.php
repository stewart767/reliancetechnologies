@extends('layouts.app')

@section('seo')
    <x-seo 
        title="Technology Insights & Advisories"
        description="Access B2B technology advisories, infrastructure guides, zero-trust checklists, and electric mobility updates authored by Reliance senior engineers."
    />
@endsection

@section('content')
    <!-- HERO HEADER -->
    <header class="bg-slate-900 border-b border-slate-800/80 pt-36 pb-16 md:pt-48 md:pb-24">
        <div class="container space-y-4">
            <span class="inline-block font-title font-extrabold text-xs uppercase tracking-widest text-blue-500">Corporate Blog</span>
            <h1 class="font-title font-extrabold text-4xl sm:text-5xl text-white leading-tight">Insights & Advisories</h1>
            <p class="text-slate-400 text-sm sm:text-base md:text-lg max-w-3xl leading-relaxed">
                Read technology briefs, cybersecurity reports, and system integration strategies written by our development and security architects.
            </p>
        </div>
    </header>

    <!-- CONTENT LAYOUT -->
    <section class="py-24 bg-slate-950 border-b border-slate-800/80">
        <div class="container grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left: Blog Posts -->
            <div class="lg:col-span-8 space-y-12">
                @if(isset($category))
                    <div class="p-4 bg-blue-500/5 border border-blue-500/20 rounded-xl text-sm flex items-center justify-between text-blue-400">
                        <span>Showing posts in category: <strong>{{ $category->name }}</strong></span>
                        <a href="{{ route('insights.index') }}" class="underline hover:text-white transition-colors">Clear Filter</a>
                    </div>
                @endif

                @if($posts->count() == 0)
                    <div class="border border-dashed border-slate-800 rounded-xl p-16 text-center space-y-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-slate-600 mx-auto" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        <h3 class="font-title font-bold text-white text-lg">No Insights Articles Found</h3>
                        <p class="text-slate-400 text-xs sm:text-sm">There are no articles published in this category yet.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        @foreach($posts as $post)
                            <x-blog-card :post="$post" />
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="pt-8">
                        {{ $posts->links() }}
                    </div>
                @endif
            </div>

            <!-- Right: Categories & Search Sidebar -->
            <div class="lg:col-span-4 space-y-8">
                <!-- Search bar -->
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-lg">
                    <h3 class="font-title font-bold text-white text-base mb-4">Search Insights</h3>
                    <form action="{{ route('search') }}" method="GET" class="relative">
                        <input type="text" name="q" placeholder="Type keywords..." required
                               class="w-full bg-slate-950 border border-slate-800 rounded-lg pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:border-blue-500 transition-colors text-slate-100 placeholder-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-500 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </form>
                </div>

                <!-- Categories list -->
                <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-lg">
                    <h3 class="font-title font-bold text-white text-base mb-4">Categories</h3>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <a href="{{ route('insights.index') }}" class="flex items-center justify-between text-slate-400 hover:text-white transition-colors">
                                <span>All Categories</span>
                            </a>
                        </li>
                        @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('insights.category', $cat->slug) }}" class="flex items-center justify-between transition-colors {{ isset($category) && $category->id == $cat->id ? 'text-blue-400 font-bold' : 'text-slate-400 hover:text-white' }}">
                                    <span>{{ $cat->name }}</span>
                                    <span class="bg-slate-950 px-2 py-0.5 rounded text-[10px] border border-slate-800/80">{{ $cat->posts_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
        </div>
    </section>
@endsection
