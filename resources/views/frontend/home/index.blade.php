@extends('layouts.app')

@section('seo')
    <x-seo 
        title="Enterprise Technology, Custom Software & Cybersecurity Partner"
        description="Reliance Solutions & Technology designs, builds, and secures custom enterprise software, zero-trust cybersecurity, structured network infrastructure, and AI automation for leading organizations."
    />
@endsection

@section('content')
    @php
        $activeSliders = $sliders;
        if ($activeSliders->isEmpty()) {
            $activeSliders = collect([
                (object)[
                    'title' => 'Technology That Moves Your Business Forward.',
                    'description' => 'We design, build and secure intelligent technology solutions that help organizations operate smarter, scale faster and transform with confidence.',
                    'background_image' => 'images/hero/hero-bg.jpg',
                    'primary_cta_text' => 'START A PROJECT',
                    'primary_cta_url' => route('contact.index'),
                    'secondary_cta_text' => 'EXPLORE OUR SERVICES',
                    'secondary_cta_url' => route('services.index'),
                ]
            ]);
        }
    @endphp

    <!-- SECTION 01 — HERO -->
    <header 
        x-data="{ 
            activeSlide: 0, 
            slidesCount: {{ $activeSliders->count() }},
            timer: null,
            activeProgress: 0,
            slideDuration: 6000,
            startTime: null,
            init() {
                this.startTimer();
            },
            startTimer() {
                if (this.slidesCount > 1) {
                    this.startTime = Date.now();
                    this.timer = setInterval(() => {
                        let elapsed = Date.now() - this.startTime;
                        this.activeProgress = Math.min((elapsed / this.slideDuration) * 100, 100);
                        if (this.activeProgress >= 100) {
                            this.nextSlide();
                        }
                    }, 30);
                }
            },
            stopTimer() {
                if (this.timer) {
                    clearInterval(this.timer);
                    this.timer = null;
                }
            },
            nextSlide() {
                this.activeSlide = (this.activeSlide + 1) % this.slidesCount;
                this.resetTimer();
            },
            prevSlide() {
                this.activeSlide = (this.activeSlide - 1 + this.slidesCount) % this.slidesCount;
                this.resetTimer();
            },
            setSlide(index) {
                this.activeSlide = index;
                this.resetTimer();
            },
            resetTimer() {
                this.activeProgress = 0;
                this.startTime = Date.now();
            }
        }"
        class="relative bg-slate-100 deep-dark-section min-h-screen overflow-hidden flex items-center pt-24 pb-28 lg:pb-36"
    >
        <!-- Slides backgrounds with transition -->
        <div class="absolute inset-0 w-full h-full z-0 pointer-events-none">
            @foreach($activeSliders as $index => $slide)
                <div 
                    x-show="activeSlide === {{ $index }}"
                    x-transition:enter="transition ease-out duration-1000 transform"
                    x-transition:enter-start="opacity-0 scale-105"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-1000 transform"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="absolute inset-0 w-full h-full"
                    style="display: none;"
                >
                    <!-- Highly blurred, higher opacity background image for rich ambient atmospheric color -->
                    <div 
                        class="absolute inset-0 bg-cover bg-center bg-no-repeat blur-2xl opacity-45 scale-110"
                        style="background-image: url('{{ Str::startsWith($slide->background_image, 'images/') ? asset($slide->background_image) : asset('storage/' . $slide->background_image) }}');"
                    ></div>
                    <!-- Ambient dark overlay with reduced opacity to let colors shine through -->
                    <div class="absolute inset-0 bg-slate-100/75"></div>
                    
                    <!-- Ambient color glows inside the slide context -->
                    <div class="absolute top-0 right-[-10%] w-[60%] h-[60%] rounded-full bg-blue-600/20 blur-[120px] pointer-events-none"></div>
                    <div class="absolute bottom-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full bg-cyan-500/15 blur-[120px] pointer-events-none"></div>
                </div>
            @endforeach
        </div>

        <!-- Canvas particle node network background -->
        <canvas id="heroCanvas" class="absolute inset-0 w-full h-full z-10 pointer-events-none opacity-20"></canvas>
        
        <!-- Subtle global gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-slate-100/90 via-slate-100/50 to-transparent z-20 pointer-events-none"></div>
        
        <div class="container relative z-30 min-h-[calc(100vh-14rem)] flex items-center w-full">
            <div class="w-full relative">
                @foreach($activeSliders as $index => $slide)
                    <div 
                        x-show="activeSlide === {{ $index }}"
                        x-transition:enter="transition ease-out duration-700 delay-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-8"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-500 absolute w-full top-1/2 transform -translate-y-1/2 left-0"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-8"
                        class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center"
                        style="display: none;"
                    >
                        <!-- Left Info Panel -->
                        <div class="lg:col-span-7 space-y-8 max-w-3xl">
                            <span class="inline-flex items-center gap-2 bg-blue-500/10 border border-blue-500/20 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider text-cyan-400">
                                <span class="w-1.5 h-1.5 bg-cyan-400 rounded-full animate-ping"></span>
                                Software • AI • Infrastructure • Cybersecurity
                            </span>
                            
                            @if($slide->title)
                                <h1 class="font-title font-extrabold text-4xl sm:text-5xl lg:text-6xl text-white leading-tight tracking-tight">
                                    {{ $slide->title }}
                                </h1>
                            @else
                                <h1 class="font-title font-extrabold text-4xl sm:text-5xl lg:text-6xl text-white leading-tight tracking-tight">
                                    Technology That Moves <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-blue-800 bg-clip-text text-transparent">Your Business.</span>
                                </h1>
                            @endif
                            
                            @if($slide->description)
                                <p class="text-base sm:text-lg md:text-xl text-slate-350 leading-relaxed max-w-2xl font-medium font-sans">
                                    {{ $slide->description }}
                                </p>
                            @else
                                <p class="text-base sm:text-lg md:text-xl text-slate-350 leading-relaxed max-w-2xl font-medium font-sans">
                                    We design, build and secure intelligent technology solutions that help organizations operate smarter, scale faster and transform with confidence.
                                </p>
                            @endif
                            
                            <div class="flex flex-wrap gap-4 pt-2">
                                @if($slide->primary_cta_text)
                                    <a id="hero-primary-cta-{{ $index }}" href="{{ $slide->primary_cta_url ?? route('contact.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-8 py-4 rounded-lg transition-all shadow-lg hover:shadow-blue-500/20 hover:-translate-y-0.5 cursor-pointer inline-block">
                                        {{ strtoupper($slide->primary_cta_text) }}
                                    </a>
                                @endif
                                @if($slide->secondary_cta_text)
                                    <a id="hero-secondary-cta-{{ $index }}" href="{{ $slide->secondary_cta_url ?? route('services.index') }}" class="bg-slate-900/60 backdrop-blur-md hover:bg-slate-900 border border-slate-800 hover:border-slate-700 text-white font-semibold text-xs px-8 py-4 rounded-lg transition-all hover:-translate-y-0.5 cursor-pointer inline-block">
                                        {{ strtoupper($slide->secondary_cta_text) }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Right Technology Visual -->
                        <div class="lg:col-span-5 flex justify-center relative">
                            <!-- Advanced technology node visualization behind card -->
                            <div class="absolute w-[110%] h-[110%] rounded-full bg-blue-500/5 flex items-center justify-center animate-float pointer-events-none">
                                <div class="absolute inset-0 border border-blue-500/10 rounded-full animate-spin-slow"></div>
                                <div class="absolute inset-8 border border-dashed border-cyan-400/20 rounded-full animate-spin-slow-reverse"></div>
                                <div class="absolute inset-20 border border-blue-500/10 rounded-full animate-spin-slow"></div>
                            </div>

                            <!-- Framed active slide image with glowing borders -->
                            <div class="relative w-full max-w-lg aspect-[4/3] lg:aspect-[16/11] rounded-2xl overflow-hidden border border-white/10 shadow-2xl group transition-all duration-500 z-10 bg-slate-100">
                                <div class="absolute inset-0 bg-gradient-to-tr from-blue-500/10 to-cyan-500/10 opacity-50 group-hover:opacity-100 transition-opacity z-20 pointer-events-none"></div>
                                <img 
                                    src="{{ Str::startsWith($slide->background_image, 'images/') ? asset($slide->background_image) : asset('storage/' . $slide->background_image) }}" 
                                    alt="{{ $slide->title }}" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-100/80 via-transparent to-transparent z-15"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Slide Indicators / Controls -->
        <template x-if="slidesCount > 1">
            <div class="absolute bottom-8 left-0 right-0 z-30">
                <div class="container">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 border-t border-white/10 pt-6">
                        @foreach($activeSliders as $index => $slide)
                            <button 
                                id="hero-tab-{{ $index }}"
                                @click="setSlide({{ $index }})" 
                                class="group flex flex-col items-start gap-2 text-left cursor-pointer transition-all duration-300 py-2 focus:outline-none"
                            >
                                <div class="flex items-center gap-3">
                                    <span 
                                        class="text-xs font-bold font-title tracking-wider transition-colors duration-300"
                                        :class="activeSlide === {{ $index }} ? 'text-cyan-400' : 'text-slate-500 group-hover:text-slate-350'"
                                    >
                                        0{{ $index + 1 }}
                                    </span>
                                    <span 
                                        class="text-xs font-bold uppercase tracking-wider transition-colors duration-300 line-clamp-1"
                                        :class="activeSlide === {{ $index }} ? 'text-white' : 'text-slate-500 group-hover:text-slate-350'"
                                    >
                                        {{ Str::limit($slide->title, 24) ?: 'Overview' }}
                                    </span>
                                </div>
                                <div class="w-full h-[3px] bg-white/10 rounded-full overflow-hidden relative mt-1">
                                    <div 
                                        x-show="activeSlide === {{ $index }}"
                                        class="absolute inset-y-0 left-0 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full"
                                        :style="`width: ${activeProgress}%`"
                                    ></div>
                                    <div 
                                        x-show="activeSlide !== {{ $index }}"
                                        class="w-0 bg-transparent"
                                    ></div>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </template>
    </header>

    <!-- TRUSTED BY SECTION -->
    <section class="py-12 bg-slate-950 border-t border-b border-slate-900/80 relative z-30 shadow-2xl overflow-hidden">
        <div class="container">
            <div class="flex flex-col items-center justify-center gap-6">
                <h3 class="text-[10px] font-extrabold uppercase tracking-[0.25em] text-slate-500 font-title text-center">
                    Trusted By
                </h3>
                <div class="flex flex-wrap items-center justify-center gap-x-12 gap-y-6 md:gap-x-16 lg:gap-x-20 px-4 w-full">
                    @foreach($partners as $partner)
                        @if($partner->logo)
                            <div class="flex items-center justify-center">
                                @if($partner->website)
                                    <a href="{{ $partner->website }}" target="_blank" class="group block relative transition-all duration-300 hover:scale-105">
                                @else
                                    <div class="group relative transition-all duration-300">
                                @endif
                                    <img 
                                        src="{{ Str::startsWith($partner->logo, 'images/') ? asset($partner->logo) : asset('storage/' . $partner->logo) }}" 
                                        alt="{{ $partner->name }}" 
                                        class="h-11 md:h-14 w-auto max-w-[140px] md:max-w-[170px] object-contain opacity-80 group-hover:opacity-100 transition-all duration-300"
                                        title="{{ $partner->name }}"
                                    >
                                @if($partner->website)
                                    </a>
                                @else
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 02 — TRUST / INTRODUCTION SECTION -->
    <section class="py-28 bg-slate-950 relative z-30">
        <div class="container grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            <div class="lg:col-span-5">
                <div class="relative rounded-2xl overflow-hidden border border-slate-800/80 shadow-2xl group">
                    <img src="{{ Str::startsWith(setting('about_image', 'images/about/who-we-are.jpg'), 'images/') ? asset(setting('about_image', 'images/about/who-we-are.jpg')) : asset('storage/' . setting('about_image')) }}" alt="Reliance Solutions & Technology engineers at work" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-tr from-slate-950 via-transparent to-transparent"></div>
                </div>
            </div>
            
            <div class="lg:col-span-7 space-y-8">
                <x-section-heading 
                    subtitle="Your Technology Partner for the Digital Future"
                    title="Engineering Reliable Systems for Enterprises"
                    description="Reliance Solutions & Technology engineers complete technology portfolios for organizations, government agencies, microfinance systems, and industrial logistics networks. We help you transform operations through integrated systems, active cybersecurity defenses, and reliable cloud topologies."
                    :centered="false"
                />
                
                <p class="text-slate-400 text-xs sm:text-sm leading-relaxed max-w-2xl font-medium font-sans">
                    We combine Software Engineering, Artificial Intelligence workflows, physical network cabling, biometric access security, and dedicated IT advisory to support your operations from inception to scaling and maintenance.
                </p>

                <div class="pt-4">
                    <a href="{{ route('about.overview') }}" class="inline-flex items-center gap-2 text-xs font-bold text-blue-500 hover:text-cyan-400 transition-colors">
                        Discover Reliance &rarr;
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 03 — PRODUCTS SECTION -->
    <section class="py-28 bg-slate-900 border-t border-b border-slate-950 relative z-30" id="products">
        <div class="container space-y-16">
            <x-section-heading 
                subtitle="OUR SYSTEM PORTFOLIO"
                title="B2B Software Products"
                description="Explore our high-performance, custom-engineered software products designed to optimize retail, employment, tracking, housing, and operational pipelines."
            />

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($softwareProducts as $product)
                <!-- Product Card -->
                <div class="bg-slate-955 border border-slate-800/85 rounded-2xl overflow-hidden hover:border-blue-500/20 hover:shadow-2xl transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <!-- Image Header -->
                        <div class="h-48 bg-slate-950 border-b border-slate-800 relative overflow-hidden">
                            @if($product->image)
                                <img src="{{ Str::startsWith($product->image, 'images/') ? asset($product->image) : asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="w-full h-full object-cover">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-955 via-transparent to-transparent opacity-80"></div>
                            
                            <!-- Badges or floating icon -->
                            <div class="absolute top-4 left-4 w-10 h-10 bg-slate-950/80 backdrop-blur border border-slate-800 text-blue-500 rounded-xl flex items-center justify-center shadow-lg">
                                @if($product->icon)
                                    {!! $product->icon !!}
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                @endif
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-8 space-y-4">
                            <h3 class="font-title font-bold text-white text-lg group-hover:text-blue-500 transition-colors">{{ $product->title }}</h3>
                            <p class="text-slate-400 text-xs sm:text-sm leading-relaxed font-sans font-medium">{{ $product->description }}</p>
                        </div>
                    </div>
                    @if($product->website_url)
                    <div class="px-8 pb-8 pt-0 flex items-center justify-between">
                        <a href="{{ $product->website_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-500 hover:text-cyan-400 transition-colors">
                            Visit Website <span class="text-rose-500 text-[9px]">&#9658;</span>
                        </a>
                    </div>
                    @else
                    <div class="px-8 pb-8 pt-0 flex items-center justify-between">
                        <a href="{{ route('contact.index', ['service' => $product->title, 'action' => 'request']) }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-blue-500 hover:text-cyan-400 transition-colors">
                            Request Demo <span class="text-rose-500 text-[9px]">&#9658;</span>
                        </a>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTION 07 — TECHNOLOGY WE WORK WITH -->
    <section class="py-24 bg-slate-900 border-b border-slate-950 relative z-30">
        <div class="container space-y-12">
            <h3 class="font-title font-extrabold text-lg text-white text-center uppercase tracking-wider">Technology We Work With</h3>
            <div class="flex flex-wrap items-center justify-center gap-x-12 gap-y-6 text-slate-500 text-xs font-bold tracking-wider font-sans">
                <span class="hover:text-white transition-colors">Laravel</span>
                <span class="hover:text-white transition-colors">PHP</span>
                <span class="hover:text-white transition-colors">MySQL</span>
                <span class="hover:text-white transition-colors">JavaScript</span>
                <span class="hover:text-white transition-colors">Tailwind CSS</span>
                <span class="hover:text-white transition-colors">React</span>
                <span class="hover:text-white transition-colors">APIs Integration</span>
                <span class="hover:text-white transition-colors">Cloud Servers</span>
                <span class="hover:text-white transition-colors">Artificial Intelligence</span>
                <span class="hover:text-white transition-colors">Cybersecurity Gateways</span>
                <span class="hover:text-white transition-colors">Networking Switched</span>
            </div>
        </div>
    </section>

    <!-- SECTION 08 — WHY RELIANCE -->
    <section class="py-28 bg-slate-950 relative z-30">
        <div class="container grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            <!-- Left Column: Headers -->
            <div class="lg:col-span-5 lg:sticky lg:top-28 space-y-8">
                <x-section-heading 
                    subtitle="THE RELIANCE ADVANTAGE"
                    title="Why Organizations Choose Reliance"
                    description="We align engineering practices with your operational parameters, ensuring database performance, active protection layers, and long-term tech roadmap execution."
                    :centered="false"
                />
                
                <!-- Metrics block -->
                <div class="grid grid-cols-2 gap-6 pt-6 border-t border-slate-900">
                    <div>
                        <span class="block font-title font-black text-3xl text-blue-600">{{ setting('why_metric_1_val', '99.9%') }}</span>
                        <span class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">{{ setting('why_metric_1_lbl', 'Operational Uptime') }}</span>
                    </div>
                    <div>
                        <span class="block font-title font-black text-3xl text-cyan-500">{{ setting('why_metric_2_val', '150+') }}</span>
                        <span class="block text-[10px] font-bold text-slate-500 uppercase tracking-wider">{{ setting('why_metric_2_lbl', 'Systems Integrated') }}</span>
                    </div>
                </div>
            </div>

            <!-- Right Column: 6 Cards -->
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Card 1: Engineering Excellence -->
                <div class="bg-slate-900 border border-slate-800/80 rounded-xl p-6 hover:border-blue-500/25 transition-all">
                    <h4 class="font-title font-bold text-white text-sm mb-2">Engineering Excellence</h4>
                    <p class="text-slate-450 text-xs leading-relaxed font-medium">Solutions designed with scalability, reliability, and database optimization in mind from the starting line.</p>
                </div>
                <!-- Card 2: Security First -->
                <div class="bg-slate-900 border border-slate-800/80 rounded-xl p-6 hover:border-blue-500/25 transition-all">
                    <h4 class="font-title font-bold text-white text-sm mb-2">Security First</h4>
                    <p class="text-slate-455 text-xs leading-relaxed font-medium">Zero-trust architecture configurations, encryption standards, and threat monitoring integrated into technology from the beginning.</p>
                </div>
                <!-- Card 3: Business-Focused Technology -->
                <div class="bg-slate-900 border border-slate-800/80 rounded-xl p-6 hover:border-blue-500/25 transition-all">
                    <h4 class="font-title font-bold text-white text-sm mb-2">Business-Focused Technology</h4>
                    <p class="text-slate-455 text-xs leading-relaxed font-medium">We design workflows and reporting portals to solve business problems, not just technical problems.</p>
                </div>
                <!-- Card 4: Scalable Solutions -->
                <div class="bg-slate-900 border border-slate-800/80 rounded-xl p-6 hover:border-blue-500/25 transition-all">
                    <h4 class="font-title font-bold text-white text-sm mb-2">Scalable Solutions</h4>
                    <p class="text-slate-455 text-xs leading-relaxed font-medium">Systems engineered to grow with organizations, supporting heavy transaction loads and API throughputs.</p>
                </div>
                <!-- Card 5: Local Expertise -->
                <div class="bg-slate-900 border border-slate-800/80 rounded-xl p-6 hover:border-blue-500/25 transition-all">
                    <h4 class="font-title font-bold text-white text-sm mb-2">Local Expertise</h4>
                    <p class="text-slate-455 text-xs leading-relaxed font-medium">Deep understanding of the Tanzanian and African business environment, including payment and tax requirements.</p>
                </div>
                <!-- Card 6: Long-Term Partnership -->
                <div class="bg-slate-900 border border-slate-800/80 rounded-xl p-6 hover:border-blue-500/25 transition-all">
                    <h4 class="font-title font-bold text-white text-sm mb-2">Long-Term Partnership</h4>
                    <p class="text-slate-455 text-xs leading-relaxed font-medium">Outsourced support continues beyond implementation, providing managed SLAs, queries helpdesk, and modifications.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 09 & 10 — LEADERSHIP -->
    <section class="py-28 bg-slate-900 border-t border-b border-slate-950 relative z-30">
        <div class="container space-y-16">
            <x-section-heading 
                subtitle="EXECUTIVE LEADERSHIP"
                title="Meet Our Board & Directors"
                description="Outlining the technical advisors steering our projects, systems integrations, and logistics operations in Tanzania."
            />

            <!-- Directors Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
                <!-- Leader 1: Joseph Lyimo -->
                <div class="bg-slate-955 border border-slate-850 rounded-2xl p-6 flex flex-col justify-between shadow-xl group">
                    <div class="space-y-4">
                        <div class="w-16 h-16 rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center text-xl font-bold uppercase shrink-0">JL</div>
                        <div>
                            <h4 class="font-title font-bold text-white text-base">Joseph Lyimo</h4>
                            <span class="text-[10px] text-blue-500 font-bold uppercase block mt-1">Founder & Managing Director</span>
                        </div>
                        <p class="text-slate-400 text-xs leading-relaxed font-medium font-sans">With over 18 years of executive management experience in regional ICT distribution and telecommunications integration, Joseph oversees corporate growth, board alignments, and government relations.</p>
                    </div>
                </div>

                <!-- Leader 2: Dr. Ahmed Mbarouk -->
                <div class="bg-slate-955 border border-slate-850 rounded-2xl p-6 flex flex-col justify-between shadow-xl group">
                    <div class="space-y-4">
                        <div class="w-16 h-16 rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center text-xl font-bold uppercase shrink-0">AM</div>
                        <div>
                            <h4 class="font-title font-bold text-white text-base">Dr. Ahmed Mbarouk</h4>
                            <span class="text-[10px] text-blue-500 font-bold uppercase block mt-1">Chief Technology Officer</span>
                        </div>
                        <p class="text-slate-400 text-xs leading-relaxed font-medium font-sans">Ahmed manages our system engineering teams and API developers. He holds a Ph.D. in Computer Science and specializes in enterprise software pipelines, complex middleware, and databases.</p>
                    </div>
                </div>

                <!-- Leader 3: Elizabeth Mlay -->
                <div class="bg-slate-955 border border-slate-850 rounded-2xl p-6 flex flex-col justify-between shadow-xl group">
                    <div class="space-y-4">
                        <div class="w-16 h-16 rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center text-xl font-bold uppercase shrink-0">EM</div>
                        <div>
                            <h4 class="font-title font-bold text-white text-base">Elizabeth Mlay</h4>
                            <span class="text-[10px] text-blue-500 font-bold uppercase block mt-1">Head of Cybersecurity & Audits</span>
                        </div>
                        <p class="text-slate-400 text-xs leading-relaxed font-medium font-sans">Elizabeth leads security vulnerability management, penetration testing, and zero-trust deployments. She holds CISM and CISSP certifications with extensive background in financial security integrations.</p>
                    </div>
                </div>

                <!-- Leader 4: Emmanuel Mwakalindile -->
                <div class="bg-slate-955 border border-slate-850 rounded-2xl p-6 flex flex-col justify-between shadow-xl group">
                    <div class="space-y-4">
                        <div class="w-16 h-16 rounded-full bg-blue-500/10 text-blue-500 flex items-center justify-center text-xl font-bold uppercase shrink-0">EM</div>
                        <div>
                            <h4 class="font-title font-bold text-white text-base">Emmanuel Mwakalindile</h4>
                            <span class="text-[10px] text-blue-500 font-bold uppercase block mt-1">Operations & E-Mobility Manager</span>
                        </div>
                        <p class="text-slate-400 text-xs leading-relaxed font-medium font-sans">Emmanuel oversees field operations, structured physical networks installations, and the YAOYAO Energies commercial electric fleet deployments, managing battery swap telemetry networks.</p>
                    </div>
                </div>
            </div>

            <div class="text-center pt-4">
                <a href="{{ route('about.leadership') }}" class="inline-flex items-center gap-2 bg-slate-950/60 backdrop-blur-md hover:bg-slate-950 border border-slate-800 px-6 py-3.5 rounded-lg text-xs font-semibold text-white transition-all shadow-md">
                    MEET OUR LEADERSHIP &rarr;
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION 11 — TESTIMONIALS (What Our Clients Say) -->
    @if($testimonials->isNotEmpty())
        <section class="py-28 bg-slate-950 border-b border-slate-900/80 relative z-30">
            <div class="container space-y-16">
                <x-section-heading 
                    subtitle="CLIENT PARTNERSHIP SUCCESS"
                    title="What Our Clients Say"
                    description="We partner with organizations to build reliable technology systems. Read what their team directors say about our service."
                />
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($testimonials as $test)
                        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-8 flex flex-col justify-between hover:border-blue-500/20 transition-all duration-300 shadow-xl relative group">
                            <div class="absolute -top-4 -left-2 text-7xl font-serif text-blue-500/10 pointer-events-none group-hover:text-blue-500/20 transition-colors select-none">&ldquo;</div>
                            <div class="space-y-4 relative z-10">
                                <p class="text-slate-450 text-xs sm:text-sm leading-relaxed italic">
                                    "{{ $test->testimonial }}"
                                </p>
                            </div>
                            <div class="pt-6 border-t border-slate-950 mt-6 flex items-center gap-3 relative z-10">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-600 to-cyan-400 flex items-center justify-center text-white font-bold text-sm uppercase shadow">
                                    {{ substr($test->client_name, 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="font-title font-bold text-white text-xs leading-none">{{ $test->client_name }}</h4>
                                    <span class="text-[10px] text-slate-500 font-medium block mt-1.5">{{ $test->position }}, {{ $test->company }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- SECTION 12 — CALL TO ACTION (Have a Technology Challenge?) -->
    <section class="py-28 bg-slate-900 deep-dark-section relative z-30 border-t border-b border-slate-950">
        <div class="container space-y-12">
            <div class="max-w-4xl mx-auto text-center space-y-6">
                <span class="inline-flex bg-blue-500/10 border border-blue-500/20 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider text-blue-600">
                    Get In Touch
                </span>
                <h2 class="font-title font-extrabold text-4xl text-white">Have a Technology Challenge?</h2>
                <p class="text-slate-400 text-sm sm:text-base leading-relaxed max-w-2xl mx-auto font-medium font-sans">
                    Let's engineer the right solution for your organization. Contact our technical advisory offices today to coordinate system audits, database designs, or fleet layouts.
                </p>
                <div class="pt-4 flex flex-wrap justify-center gap-4">
                    <a href="{{ route('contact.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs px-8 py-4 rounded-lg transition-all shadow-lg hover:shadow-blue-500/20 hover:-translate-y-0.5 cursor-pointer">
                        START A PROJECT
                    </a>
                    <a href="{{ route('contact.index') }}" class="bg-slate-950/60 backdrop-blur-md hover:bg-slate-950 border border-slate-800 text-white font-semibold text-xs px-8 py-4 rounded-lg transition-all hover:-translate-y-0.5 cursor-pointer">
                        TALK TO AN EXPERT
                    </a>
                </div>
            </div>

            <!-- Contact Strip Info -->
            <div class="bg-slate-955 border border-slate-850 rounded-2xl p-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-xs text-slate-450 text-center sm:text-left shadow-lg">
                <div>
                    <span class="block uppercase tracking-wider text-slate-500 font-bold mb-1">Office Location</span>
                    <span class="text-slate-350">{{ setting('address', 'Dar es Salaam, Tanzania') }}</span>
                </div>
                <div>
                    <span class="block uppercase tracking-wider text-slate-500 font-bold mb-1">Corporate Email</span>
                    <a href="mailto:{{ setting('contact_email', 'info@reliancesolutions.co.tz') }}" class="text-cyan-400 hover:underline">{{ setting('contact_email', 'info@reliancesolutions.co.tz') }}</a>
                </div>
                <div>
                    <span class="block uppercase tracking-wider text-slate-500 font-bold mb-1">Phone Enquiries</span>
                    <span class="text-slate-350">{{ setting('contact_phone', '+255 22 212 3456') }}</span>
                </div>
                <div>
                    <span class="block uppercase tracking-wider text-slate-500 font-bold mb-1">WhatsApp chat</span>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', setting('whatsapp_number', '')) }}" target="_blank" class="text-emerald-400 hover:underline font-semibold">Message our Specialists</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Canvas node connectivity Javascript -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const canvas = document.getElementById('heroCanvas');
            if (!canvas) return;

            const ctx = canvas.getContext('2d');
            let width = canvas.width = canvas.offsetWidth;
            let height = canvas.height = canvas.offsetHeight;

            window.addEventListener('resize', () => {
                width = canvas.width = canvas.offsetWidth;
                height = canvas.height = canvas.offsetHeight;
            });

            const particles = [];
            const particleCount = 60;
            const maxDistance = 100;

            class Particle {
                constructor() {
                    this.x = Math.random() * width;
                    this.y = Math.random() * height;
                    this.vx = (Math.random() - 0.5) * 0.4;
                    this.vy = (Math.random() - 0.5) * 0.4;
                    this.radius = Math.random() * 2 + 1;
                }

                update() {
                    this.x += this.vx;
                    this.y += this.vy;

                    if (this.x < 0 || this.x > width) this.vx = -this.vx;
                    if (this.y < 0 || this.y > height) this.vy = -this.vy;
                }

                draw() {
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                    ctx.fillStyle = 'rgba(0, 136, 255, 0.4)';
                    ctx.fill();
                }
            }

            for (let i = 0; i < particleCount; i++) {
                particles.push(new Particle());
            }

            function animate() {
                ctx.clearRect(0, 0, width, height);

                particles.forEach(p => {
                    p.update();
                    p.draw();
                });

                for (let i = 0; i < particleCount; i++) {
                    for (let j = i + 1; j < particleCount; j++) {
                        const dx = particles[i].x - particles[j].x;
                        const dy = particles[i].y - particles[j].y;
                        const dist = Math.sqrt(dx * dx + dy * dy);

                        if (dist < maxDistance) {
                            ctx.beginPath();
                            ctx.moveTo(particles[i].x, particles[i].y);
                            ctx.lineTo(particles[j].x, particles[j].y);
                            ctx.strokeStyle = `rgba(0, 242, 254, ${0.12 * (1 - dist / maxDistance)})`;
                            ctx.lineWidth = 1;
                            ctx.stroke();
                        }
                    }
                }

                requestAnimationFrame(animate);
            }

            animate();
        });
    </script>
@endsection
