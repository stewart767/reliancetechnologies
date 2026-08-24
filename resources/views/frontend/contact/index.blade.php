@extends('layouts.app')

@section('seo')
    <x-seo 
        title="Contact Our Enterprise Systems Architects"
        description="Coordinate with our technology teams. Send inquires regarding custom software, cybersecurity monitoring, network cabling, or electric cargo fleets."
    />
@endsection

@section('content')
    <!-- CONTACT CONTENT SECTION -->
    <section class="bg-slate-950 pt-36 pb-24 md:pt-48 md:pb-32 border-b border-slate-800/80">
        <div class="container grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            
            <!-- Left: Contact Header & Info Cards -->
            <div class="lg:col-span-5 space-y-10">
                <div class="space-y-4">
                    <span class="inline-block font-title font-extrabold text-xs uppercase tracking-widest text-blue-500">{{ setting('contact_page_subtitle', 'Get In Touch') }}</span>
                    <h1 class="font-title font-extrabold text-4xl sm:text-5xl text-white leading-tight">{{ setting('contact_page_title', 'Contact Us') }}</h1>
                    <p class="text-slate-400 text-sm sm:text-base leading-relaxed">
                        {{ setting('contact_page_desc', 'Coordinate with our systems engineering team to schedule infrastructure audits, discuss software parameters, or customize electric logistics units.') }}
                    </p>
                </div>

                <div>
                    <h2 class="font-title font-extrabold text-2xl text-white mb-4">{{ setting('contact_info_title', 'Reliance Solutions & Technology') }}</h2>
                    <p class="text-slate-450 leading-relaxed text-sm">{{ setting('contact_info_desc', 'We serve enterprise operations, government agencies, logistics networks, and industrial projects across Tanzania and East Africa.') }}</p>
                </div>
                
                <div class="space-y-6">
                    <div class="bg-slate-900/40 border border-slate-800/80 rounded-xl p-5 flex gap-4 hover:border-blue-500/25 transition-all">
                        <span class="w-10 h-10 bg-blue-500/10 text-blue-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        </span>
                        <div>
                            <strong class="font-title font-bold text-white text-sm block mb-1">Office Location</strong>
                            <p class="text-slate-450 text-xs sm:text-sm leading-relaxed">{{ setting('address', 'Dar es Salaam, Tanzania') }}</p>
                        </div>
                    </div>
                    
                    <div class="bg-slate-900/40 border border-slate-800/80 rounded-xl p-5 flex gap-4 hover:border-blue-500/25 transition-all">
                        <span class="w-10 h-10 bg-blue-500/10 text-blue-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        </span>
                        <div>
                            <strong class="font-title font-bold text-white text-sm block mb-1">Electronic Mail</strong>
                            <p class="text-slate-450 text-xs sm:text-sm leading-relaxed">
                                <a href="mailto:{{ setting('contact_email', 'info@reliancesolutions.co.tz') }}" class="text-cyan-400 hover:underline">
                                    {{ setting('contact_email', 'info@reliancesolutions.co.tz') }}
                                </a>
                            </p>
                        </div>
                    </div>
                    
                    <div class="bg-slate-900/40 border border-slate-800/80 rounded-xl p-5 flex gap-4 hover:border-blue-500/25 transition-all">
                        <span class="w-10 h-10 bg-blue-500/10 text-blue-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        </span>
                        <div>
                            <strong class="font-title font-bold text-white text-sm block mb-1">Telephone Support</strong>
                            <p class="text-slate-450 text-xs sm:text-sm leading-relaxed">{{ setting('contact_phone', '+255 22 212 3456') }}</p>
                        </div>
                    </div>
                    
                    <div class="bg-slate-900/40 border border-slate-800/80 rounded-xl p-5 flex gap-4 hover:border-blue-500/25 transition-all">
                        <span class="w-10 h-10 bg-emerald-500/10 text-emerald-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                        </span>
                        <div>
                            <strong class="font-title font-bold text-white text-sm block mb-1">Instant Messaging</strong>
                            <p class="text-xs sm:text-sm leading-relaxed">
                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('whatsapp_number', '')) }}" target="_blank" class="text-emerald-400 hover:underline font-semibold">
                                    Message us on WhatsApp
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right: Form -->
            <div class="lg:col-span-7">
                <x-contact-form />
            </div>
            
        </div>
    </section>

    <!-- MAP SECTION -->
    <section class="py-24 bg-slate-900 border-b border-slate-800/80">
        <div class="container space-y-8">
            <div class="max-w-3xl space-y-2">
                <span class="inline-block font-title font-extrabold text-xs uppercase tracking-widest text-blue-500">{{ setting('contact_map_subtitle', 'Find Us') }}</span>
                <h2 class="font-title font-extrabold text-3xl text-white">{{ setting('contact_map_title', 'Our Head Office') }}</h2>
                <p class="text-slate-400 text-sm sm:text-base leading-relaxed">
                    {{ setting('contact_map_desc', 'Drop by our headquarters or use the map below to get directions. We are located in the heart of Dar es Salaam, Tanzania.') }}
                </p>
            </div>
            
            <!-- Map Container -->
            <div class="relative w-full h-[450px] bg-slate-950 rounded-2xl border border-slate-800 overflow-hidden shadow-2xl group">
                <!-- Decorative Glows -->
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl opacity-10 group-hover:opacity-20 blur transition duration-1000"></div>
                
                <!-- The Map Iframe -->
                <iframe 
                    class="relative w-full h-full border-0 grayscale opacity-90 focus:outline-none"
                    src="https://maps.google.com/maps?q={{ urlencode(setting('contact_map_address', setting('address', 'Dar es Salaam, Tanzania'))) }}&t=&z=15&ie=UTF8&iwloc=&output=embed" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                
                <!-- Glassmorphic Address Overlay Card -->
                <div class="absolute bottom-6 left-6 right-6 md:right-auto md:w-96 bg-slate-900/90 backdrop-blur-md border border-slate-800/85 p-6 rounded-xl shadow-xl flex gap-4 items-start">
                    <span class="w-10 h-10 bg-blue-500/10 text-blue-400 rounded-lg flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </span>
                    <div class="space-y-2">
                        <h4 class="font-title font-bold text-white text-sm">{{ setting('contact_info_title', 'Reliance Solutions & Technology') }}</h4>
                        <p class="text-slate-450 text-xs leading-relaxed">{{ setting('address', 'Dar es Salaam, Tanzania') }}</p>
                        <a href="https://maps.google.com/maps?daddr={{ urlencode(setting('contact_map_address', setting('address', 'Dar es Salaam, Tanzania'))) }}" 
                           target="_blank" 
                           class="inline-flex items-center gap-1.5 text-xs text-blue-400 hover:text-blue-300 font-semibold transition-colors pt-1">
                            Get Directions 
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
