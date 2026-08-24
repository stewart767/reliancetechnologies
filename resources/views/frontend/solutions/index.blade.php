@extends('layouts.app')

@section('seo')
    <x-seo 
        title="Integrated Solutions Directory"
        description="Learn how Reliance Solutions integrates software engineering, network cabling, databases, and cybersecurity into unified client solutions."
    />
@endsection

@section('content')
    <!-- SOLUTIONS HERO -->
    <header class="bg-slate-900 border-b border-slate-800/80 pt-36 pb-16 md:pt-48 md:pb-24">
        <div class="container space-y-4">
            <span class="inline-block font-title font-extrabold text-xs uppercase tracking-widest text-blue-500">Integrated Systems</span>
            <h1 class="font-title font-extrabold text-4xl sm:text-5xl text-white leading-tight">Solutions Designed Around Your Business</h1>
            <p class="text-slate-400 text-sm sm:text-base md:text-lg max-w-3xl leading-relaxed">
                We combine software engineering, cybersecurity, structured wiring, and database syncing into unified operations platforms configured for B2B scale.
            </p>
        </div>
    </header>

    <!-- SOLUTIONS LIST -->
    <section class="py-24 bg-slate-950 border-b border-slate-800/80">
        <div class="container space-y-12">
            @foreach($solutions as $sol)
                <x-solution-card :solution="$sol" />
            @endforeach
        </div>
    </section>

    <!-- Bottom CTA -->
    <section class="pb-24 bg-slate-950">
        <div class="container">
            <x-cta-banner 
                title="Looking for a custom integrated solution?"
                description="Consult with our engineering team to draft systems architectures or run compatibility reviews on legacy database directories."
                buttonText="Request Technical Review"
            />
        </div>
    </section>
@endsection
