@extends('layouts.app')

@section('seo')
    <x-seo 
        title="Certifications, Compliance & Awards"
        description="Verify the professional compliance standards, partner credentials, and green energy awards of Reliance Solutions & Technology."
    />
@endsection

@section('content')
    <!-- 1. HERO -->
    <header class="relative bg-slate-900 border-b border-slate-800 pt-36 pb-20 md:pt-48 md:pb-28 overflow-hidden">
        <!-- Grid pattern -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(58,134,255,0.02)_1px,transparent_1px),linear-gradient(to_bottom,rgba(58,134,255,0.02)_1px,transparent_1px)] bg-[size:4rem_4rem] pointer-events-none"></div>
        <div class="absolute inset-0 bg-radial-gradient from-blue-500/5 via-transparent to-transparent pointer-events-none"></div>
        
        <div class="container relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6">
                <span class="inline-flex items-center gap-1.5 bg-blue-500/10 border border-blue-500/20 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider text-blue-600">
                    Compliance & Awards
                </span>
                <h1 class="font-title font-extrabold text-4xl sm:text-5xl text-white leading-tight tracking-tight">
                    Certificates & <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-800 bg-clip-text text-transparent">Corporate Awards</span>
                </h1>
                <p class="text-slate-400 text-sm sm:text-base md:text-lg leading-relaxed max-w-2xl font-medium font-sans">
                    We maintain certifications across cybersecurity, structured cabling, systems integration, and environmental energy compliance to guarantee outstanding outcomes.
                </p>
            </div>
            
            <div class="lg:col-span-5 relative mt-6 lg:mt-0">
                <div class="bg-gradient-to-br from-blue-500/10 to-transparent p-1 border border-slate-800 rounded-3xl relative overflow-hidden shadow-2xl">
                    <div class="absolute -right-16 -top-16 w-32 h-32 bg-blue-500/10 rounded-full blur-xl"></div>
                    <div class="bg-slate-950/90 backdrop-blur-md rounded-[22px] p-8 md:p-10 space-y-4 shadow-2xl">
                        <span class="inline-block bg-blue-500/10 border border-blue-500/20 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider text-blue-600">
                            Standards Compliance
                        </span>
                        <h3 class="font-title font-extrabold text-white text-lg">Verified Credentials</h3>
                        <p class="text-xs sm:text-sm text-slate-400 leading-relaxed font-medium font-sans">
                            By adhering strictly to global frameworks like ISO, Cisco, and Microsoft, we ensure all projects satisfy stringent enterprise specifications.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- 2. CERTIFICATES SHOWCASE -->
    <section class="py-24 bg-slate-955 border-b border-slate-800/80">
        <div class="container space-y-16">
            <x-section-heading 
                subtitle="Credential Portfolio"
                title="Professional Endorsements"
                description="We hold technical registrations and partnerships that authorize us to deploy elite networks and systems."
            />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($certificates as $cert)
                    <div class="premium-3d-card scroll-reveal bg-slate-900 border border-slate-850 hover:border-blue-500/20 rounded-2xl p-8 relative group flex flex-col justify-between shadow-lg">
                        <div class="sheen-effect"></div>
                        <div class="absolute -right-8 -top-8 w-24 h-24 bg-blue-500/5 rounded-full blur-xl group-hover:bg-blue-500/10 transition-colors"></div>
                        
                        <div class="space-y-5 pop-3d">
                            <!-- Card Header -->
                            <div class="flex items-center justify-between gap-4">
                                <div class="w-12 h-12 bg-blue-500/10 text-blue-500 rounded-2xl flex items-center justify-center shrink-0 shadow-inner group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                                    {!! $cert->icon ?: '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>' !!}
                                </div>
                                
                                <span class="inline-flex items-center gap-1 bg-emerald-500/10 border border-emerald-500/20 px-2 py-0.5 rounded-full text-[9px] font-bold text-emerald-600 uppercase tracking-wider group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                                    <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full group-hover:bg-white"></span>
                                    Verified
                                </span>
                            </div>

                            <!-- Card Body -->
                            <div class="space-y-2">
                                <h3 class="font-title font-extrabold text-white text-lg group-hover:text-blue-500 transition-colors block">{{ $cert->title }}</h3>
                                <p class="text-slate-400 text-xs sm:text-sm leading-relaxed font-medium font-sans">
                                    {{ $cert->description }}
                                </p>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="pt-4 border-t border-slate-800 mt-4 flex items-center justify-between text-[10px] text-slate-500 font-bold uppercase font-sans pop-3d">
                            <span>{{ $cert->authority }}</span>
                            <span class="text-blue-500 group-hover:scale-105 transition-transform duration-300">{{ $cert->edition_year }}</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-slate-500 py-12 font-medium">No certificates currently listed.</div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- 3. CTA -->
    <section class="py-24 bg-slate-900 border-t border-b border-slate-800">
        <div class="container text-center max-w-3xl space-y-6">
            <h2 class="font-title font-extrabold text-3xl text-white">Require Compliance Verification?</h2>
            <p class="text-slate-400 text-sm leading-relaxed max-w-2xl mx-auto font-medium font-sans">
                Our certifications are backed by verified records and active registrations. If your procurement or risk compliance audit requires documentation, contact our corporate secretary.
            </p>
            <div class="pt-4">
                <a href="{{ route('contact.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-6 py-3.5 rounded-lg transition-all shadow-lg hover:shadow-blue-500/10 cursor-pointer hover:-translate-y-0.5 inline-block">
                    Request Compliance Copies
                </a>
            </div>
        </div>
    </section>
@endsection
