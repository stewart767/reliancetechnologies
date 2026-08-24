<!-- FOOTER -->
<footer class="relative bg-slate-100 deep-dark-section text-slate-400 border-t border-slate-900 pt-20 pb-8 text-sm overflow-hidden">
    <!-- Glowing background accent -->
    <div class="absolute inset-0 bg-slate-100 z-0"></div>
    <div class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-blue-500/5 rounded-full blur-3xl z-0 pointer-events-none"></div>

    <div class="container mx-auto px-6 relative z-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-12 mb-16">
        <!-- Column 1: Company -->
        <div class="space-y-4">
            <h4 class="font-title font-bold text-white text-xs uppercase tracking-wider border-l-[3px] border-[#e11d48] pl-3">COMPANY</h4>
            <ul class="space-y-2.5 text-xs">
                <li><a href="{{ route('about.overview') }}" class="text-slate-400 hover:text-white transition-colors">About Us</a></li>
                <li><a href="{{ route('about.leadership') }}" class="text-slate-400 hover:text-white transition-colors">Leadership</a></li>
                <li><a href="#" class="text-slate-400 hover:text-white transition-colors opacity-60 cursor-not-allowed" onclick="event.preventDefault();">Careers</a></li>
                <li><a href="{{ route('contact.index') }}" class="text-slate-400 hover:text-white transition-colors">Contact</a></li>
            </ul>
        </div>

        <!-- Column 2: Services -->
        <div class="space-y-4">
            <h4 class="font-title font-bold text-white text-xs uppercase tracking-wider border-l-[3px] border-[#e11d48] pl-3">SERVICES</h4>
            <ul class="space-y-2.5 text-xs">
                <li><a href="{{ route('services.show', 'software-development') }}" class="text-slate-400 hover:text-white transition-colors">Software</a></li>
                <li><a href="{{ route('services.show', 'ai-automation') }}" class="text-slate-400 hover:text-white transition-colors">AI</a></li>
                <li><a href="{{ route('services.show', 'cybersecurity') }}" class="text-slate-400 hover:text-white transition-colors">Cybersecurity</a></li>
                <li><a href="{{ route('services.show', 'ict-infrastructure') }}" class="text-slate-400 hover:text-white transition-colors">Infrastructure</a></li>
                <li><a href="{{ route('services.show', 'dcc-cloud-services') }}" class="text-slate-400 hover:text-white transition-colors">Cloud</a></li>
                <li><a href="{{ route('services.show', 'it-consulting') }}" class="text-slate-400 hover:text-white transition-colors">Consulting</a></li>
            </ul>
        </div>

        <!-- Column 3: Solutions -->
        <div class="space-y-4">
            <h4 class="font-title font-bold text-white text-xs uppercase tracking-wider border-l-[3px] border-[#e11d48] pl-3">SOLUTIONS</h4>
            <ul class="space-y-2.5 text-xs">
                <li><a href="{{ route('services.show', 'software-development') }}" class="text-slate-400 hover:text-white transition-colors">Enterprise Systems</a></li>
                <li><a href="{{ route('solutions.show', 'digital-transformation') }}" class="text-slate-400 hover:text-white transition-colors">Digital Transformation</a></li>
                <li><a href="{{ route('services.show', 'system-integration') }}" class="text-slate-400 hover:text-white transition-colors">System Integration</a></li>
                <li><a href="{{ route('services.show', 'ai-automation') }}" class="text-slate-400 hover:text-white transition-colors">Business Intelligence</a></li>
            </ul>
        </div>

        <!-- Column 4: Resources -->
        <div class="space-y-4">
            <h4 class="font-title font-bold text-white text-xs uppercase tracking-wider border-l-[3px] border-[#e11d48] pl-3">RESOURCES</h4>
            <ul class="space-y-2.5 text-xs">
                <li><a href="{{ route('projects.index') }}" class="text-slate-400 hover:text-white transition-colors">Projects</a></li>
                <li><a href="{{ route('insights.index') }}" class="text-slate-400 hover:text-white transition-colors">Insights</a></li>
                <li><a href="{{ route('insights.index') }}" class="text-slate-400 hover:text-white transition-colors">News</a></li>
                <li><a href="{{ route('projects.index') }}" class="text-slate-400 hover:text-white transition-colors">Case Studies</a></li>
            </ul>
        </div>

        <!-- Column 5: Contact -->
        <div class="space-y-4">
            <h4 class="font-title font-bold text-white text-xs uppercase tracking-wider border-l-[3px] border-[#e11d48] pl-3">CONTACT</h4>
            <ul class="space-y-3 text-xs">
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-[#e11d48] shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span class="text-slate-350">{{ setting('contact_phone', '+255 22 212 3456') }}</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-[#e11d48] shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <a href="mailto:{{ setting('contact_email', 'info@reliancesolutions.co.tz') }}" class="text-slate-400 hover:text-white transition-colors break-all">{{ setting('contact_email', 'info@reliancesolutions.co.tz') }}</a>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-[#e11d48] shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span class="text-slate-450 leading-normal">{{ setting('address', 'Dar es Salaam, Tanzania') }}</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('whatsapp_number', '')) }}" target="_blank" class="text-emerald-400 hover:underline font-semibold">WhatsApp Chat</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-slate-900 pt-8 pb-4 relative z-10">
        <div class="container mx-auto px-6 flex flex-col lg:flex-row items-center justify-between gap-6 text-slate-500 text-xs">
            <div class="space-y-1 text-center lg:text-left">
                <p>&copy; {{ date('Y') }} Reliance Solutions & Technology. All Rights Reserved.</p>
            </div>
            
            <div class="flex flex-wrap justify-center gap-6">
                <a href="{{ route('privacy') }}" class="hover:text-slate-300 transition-colors">Privacy Policy</a>
                <a href="{{ route('terms') }}" class="hover:text-slate-300 transition-colors">Terms & Conditions</a>
                <a href="{{ route('sitemap') }}" target="_blank" class="hover:text-slate-300 transition-colors">Sitemap</a>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <div class="absolute bottom-20 right-6 lg:right-12 z-20">
        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="w-11 h-11 bg-slate-900/90 backdrop-blur-md rounded-xl shadow-2xl border border-slate-800/80 flex items-center justify-center text-blue-400 hover:text-cyan-300 hover:border-blue-500/45 hover:bg-slate-800/80 hover:-translate-y-1 transition-all duration-300 cursor-pointer" aria-label="Back to Top">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="19" x2="12" y2="5"></line>
                <polyline points="5 12 12 5 19 12"></polyline>
            </svg>
        </button>
    </div>
</footer>
