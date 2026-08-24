@extends('layouts.app')

@section('seo')
    <x-seo 
        title="Search Results for: {{ $query }}"
        description="Search results matching: {{ $query }} on reliancesolutions.co.tz"
    />
@endsection

@section('content')
    <!-- HERO HEADER -->
    <header class="bg-slate-900 border-b border-slate-800 pt-32 pb-16 md:pt-40 md:pb-24">
        <div class="container space-y-4">
            <span class="font-title font-bold text-xs uppercase tracking-widest text-blue-500">Website Search</span>
            <h1 class="font-title font-extrabold text-3xl sm:text-4xl text-white leading-tight">Search Results</h1>
            <p class="text-slate-400 text-sm sm:text-base leading-relaxed">
                Showing results matching: <strong class="text-white">"{{ $query }}"</strong>
            </p>
        </div>
    </header>

    <!-- RESULTS SECTION -->
    <section class="py-24 bg-slate-950">
        <div class="container max-w-4xl space-y-12">
            
            @php $hasResults = false; @endphp

            @if(!empty($results))
                <!-- 1. Services -->
                @if(isset($results['services']) && $results['services']->count() > 0)
                    @php $hasResults = true; @endphp
                    <div class="space-y-4">
                        <h2 class="font-title font-bold text-white text-lg border-b border-slate-950 pb-2">Matching Services</h2>
                        <div class="space-y-3">
                            @foreach($results['services'] as $svc)
                                <a href="{{ route('services.show', $svc->slug) }}" class="block bg-slate-900 border border-slate-800 p-6 rounded-xl hover:border-blue-500 transition-colors">
                                    <h3 class="font-title font-bold text-white text-base mb-1">{{ $svc->title }}</h3>
                                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">{{ $svc->short_description }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 2. Solutions -->
                @if(isset($results['solutions']) && $results['solutions']->count() > 0)
                    @php $hasResults = true; @endphp
                    <div class="space-y-4 pt-6">
                        <h2 class="font-title font-bold text-white text-lg border-b border-slate-950 pb-2">Matching Solutions</h2>
                        <div class="space-y-3">
                            @foreach($results['solutions'] as $sol)
                                <a href="{{ route('solutions.show', $sol->slug) }}" class="block bg-slate-900 border border-slate-800 p-6 rounded-xl hover:border-blue-500 transition-colors">
                                    <h3 class="font-title font-bold text-white text-base mb-1">{{ $sol->title }}</h3>
                                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">{{ $sol->short_description }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 3. Projects -->
                @if(isset($results['projects']) && $results['projects']->count() > 0)
                    @php $hasResults = true; @endphp
                    <div class="space-y-4 pt-6">
                        <h2 class="font-title font-bold text-white text-lg border-b border-slate-950 pb-2">Matching Projects</h2>
                        <div class="space-y-3">
                            @foreach($results['projects'] as $proj)
                                <a href="{{ route('projects.show', $proj->slug) }}" class="block bg-slate-900 border border-slate-800 p-6 rounded-xl hover:border-blue-500 transition-colors">
                                    <h3 class="font-title font-bold text-white text-base mb-1">{{ $proj->title }}</h3>
                                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">{{ $proj->challenge }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 4. Posts -->
                @if(isset($results['posts']) && $results['posts']->count() > 0)
                    @php $hasResults = true; @endphp
                    <div class="space-y-4 pt-6">
                        <h2 class="font-title font-bold text-white text-lg border-b border-slate-950 pb-2">Matching Insights</h2>
                        <div class="space-y-3">
                            @foreach($results['posts'] as $post)
                                <a href="{{ route('insights.show', $post->slug) }}" class="block bg-slate-900 border border-slate-800 p-6 rounded-xl hover:border-blue-500 transition-colors">
                                    <h3 class="font-title font-bold text-white text-base mb-1">{{ $post->title }}</h3>
                                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">{{ $post->summary }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif

            @if(!$hasResults)
                <!-- Empty State -->
                <div class="border border-dashed border-slate-800 rounded-xl p-16 text-center space-y-4 max-w-2xl mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-slate-600 mx-auto" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <h3 class="font-title font-bold text-white text-lg">No Results Found</h3>
                    <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">No services, solutions, projects, or blog posts matched your query. Try searching for broader terms like "security", "custom software", or "cabling".</p>
                    <div class="pt-4">
                        <a href="{{ route('home') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-6 py-3 rounded-lg transition-colors cursor-pointer">
                            Return Home
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
