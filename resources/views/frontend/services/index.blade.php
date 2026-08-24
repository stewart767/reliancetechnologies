@extends('layouts.app')

@section('seo')
    <x-seo 
        title="Technical Services Directory"
        description="Deep-dive into the eight technology pillars of Reliance Solutions, including custom software, zero-trust security audits, structured network wiring, and green mobility."
    />
@endsection

@section('content')
    <!-- SERVICES HERO -->
    <header class="bg-slate-900 border-b border-slate-800/80 pt-36 pb-16 md:pt-48 md:pb-24">
        <div class="container space-y-4">
            <span class="inline-block font-title font-extrabold text-xs uppercase tracking-widest text-blue-500">Technical Directory</span>
            <h1 class="font-title font-extrabold text-4xl sm:text-5xl text-white leading-tight">Our Services</h1>
            <p class="text-slate-400 text-sm sm:text-base md:text-lg max-w-3xl leading-relaxed">
                We deliver professional technology services across eight database-driven lanes, designed for reliability and enterprise scale.
            </p>
        </div>
    </header>

    <!-- LISTING SECTION -->
    <section class="py-24 bg-slate-950 border-b border-slate-800/80">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $svc)
                    <div id="{{ $svc->slug }}">
                        <x-service-card :service="$svc" :iteration="$loop->iteration" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Bottom CTA -->
    <section class="pb-24 bg-slate-950">
        <div class="container">
            <x-cta-banner 
                title="Need a custom technical engineering assessment?"
                description="Our specialists run network wiring audits, database load optimization, or zero-trust boundary scans at client facilities."
                buttonText="Request Site Audit"
            />
        </div>
    </section>
@endsection
