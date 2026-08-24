@extends('layouts.app')

@section('seo')
    <x-seo 
        title="Privacy Policy"
        description="Privacy Policy and data security guidelines of Reliance Solutions & Technology."
    />
@endsection

@section('content')
    <header class="bg-slate-900 border-b border-slate-800 pt-32 pb-16 md:pt-40 md:pb-24">
        <div class="container space-y-4">
            <span class="font-title font-bold text-xs uppercase tracking-widest text-blue-500">Legal Documents</span>
            <h1 class="font-title font-extrabold text-3xl sm:text-4xl text-white leading-tight">Privacy Policy</h1>
        </div>
    </header>

    <section class="py-24 bg-slate-950">
        <div class="container max-w-3xl prose prose-slate text-slate-300 text-sm sm:text-base space-y-6">
            {!! setting('privacy_policy') !!}
        </div>
    </section>
@endsection
