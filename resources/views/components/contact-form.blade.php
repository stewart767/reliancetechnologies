@props([
    'selectedService' => null
])

@php
    $selectedService = $selectedService ?? request()->query('service');
    $action = request()->query('action');
    $defaultMessage = request()->query('message') ?? '';
    if (empty($defaultMessage) && $selectedService) {
        if ($action === 'buy') {
            $defaultMessage = "Hello, I am interested in purchasing/acquiring the '{$selectedService}'. Please provide information regarding licensing, pricing, and deployment timelines.";
        } elseif ($action === 'request') {
            if (str_contains(strtolower($selectedService), 'server') || str_contains(strtolower($selectedService), 'network') || str_contains(strtolower($selectedService), 'surveillance') || str_contains(strtolower($selectedService), 'access control') || str_contains(strtolower($selectedService), 'firewall') || str_contains(strtolower($selectedService), 'workstation')) {
                $defaultMessage = "Hello, I would like to request a technical audit / consultation for the '{$selectedService}'. Please let me know your availability.";
            } else {
                $defaultMessage = "Hello, I would like to request a demonstration and detailed information for the '{$selectedService}'. Please let me know your availability.";
            }
        }
    }
@endphp

<div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 md:p-8 shadow-xl">
    <!-- Success Alert -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Error Alert -->
    @if(session('error'))
        <div class="mb-6 p-4 bg-rose-500/10 border border-rose-500/20 text-rose-400 rounded-lg text-sm">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 p-4 bg-rose-500/10 border border-rose-500/20 text-rose-400 rounded-lg text-sm">
            <ul class="list-disc pl-5 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Honeypot field (bots fill this in, standard users do not see it) -->
        <div class="hidden" style="display: none;">
            <label for="website_title">Website Title</label>
            <input type="text" name="website_title" id="website_title" value="">
        </div>

        <div>
            <label for="name" class="block text-sm font-semibold text-slate-300 mb-2">Full Name *</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="e.g. John Doe" required
                   class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 transition-colors">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="company" class="block text-sm font-semibold text-slate-300 mb-2">Company / Org *</label>
                <input type="text" name="company" id="company" value="{{ old('company') }}" placeholder="e.g. Enterprise Ltd" required
                       class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 transition-colors">
            </div>

            <div>
                <label for="phone" class="block text-sm font-semibold text-slate-300 mb-2">Phone Number *</label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" placeholder="e.g. +255 700 000 000" required
                       class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 transition-colors">
            </div>
        </div>

        <div>
            <label for="email" class="block text-sm font-semibold text-slate-300 mb-2">Email Address *</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="e.g. john@company.com" required
                   class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 transition-colors">
        </div>

        <div>
            <label for="service" class="block text-sm font-semibold text-slate-300 mb-2">Service / Solution Required *</label>
            <select name="service" id="service" required
                    class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-slate-100 focus:outline-none focus:border-blue-500 transition-colors">
                <option value="" disabled {{ !old('service') && !$selectedService ? 'selected' : '' }}>-- Select an option --</option>
                @if($selectedService && !in_array($selectedService, ['AI & Automation', 'IT Consulting', 'Cybersecurity', 'Software Development', 'ICT Infrastructure', 'YAOYAO Energies', 'Industry-Specific', 'System Integration', 'General Inquiry']))
                    <option value="{{ $selectedService }}" selected>{{ $selectedService }}</option>
                @endif
                <option value="AI & Automation" {{ old('service') == 'AI & Automation' || $selectedService == 'AI & Automation' ? 'selected' : '' }}>AI, Automation & Intelligent Technology</option>
                <option value="IT Consulting" {{ old('service') == 'IT Consulting' || $selectedService == 'IT Consulting' ? 'selected' : '' }}>IT Consulting & Managed Services</option>
                <option value="Cybersecurity" {{ old('service') == 'Cybersecurity' || $selectedService == 'Cybersecurity' ? 'selected' : '' }}>Cybersecurity Services</option>
                <option value="Software Development" {{ old('service') == 'Software Development' || $selectedService == 'Software Development' ? 'selected' : '' }}>Software Development Services</option>
                <option value="ICT Infrastructure" {{ old('service') == 'ICT Infrastructure' || $selectedService == 'ICT Infrastructure' ? 'selected' : '' }}>ICT Infrastructure Services</option>
                <option value="YAOYAO Energies" {{ old('service') == 'YAOYAO Energies' || $selectedService == 'YAOYAO Energies' ? 'selected' : '' }}>YAOYAO Energies Tricycles</option>
                <option value="Industry-Specific" {{ old('service') == 'Industry-Specific' || $selectedService == 'Industry-Specific' ? 'selected' : '' }}>Industry-Specific Technology Solutions</option>
                <option value="System Integration" {{ old('service') == 'System Integration' || $selectedService == 'System Integration' ? 'selected' : '' }}>System Integration Services</option>
                <option value="General Inquiry" {{ old('service') == 'General Inquiry' || $selectedService == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
            </select>
        </div>

        <div>
            <label for="message" class="block text-sm font-semibold text-slate-300 mb-2">Project Description *</label>
            <textarea name="message" id="message" rows="5" placeholder="Describe your systems challenges, tricycle fleet requirements, or project details..." required
                      class="w-full bg-slate-950 border border-slate-800 rounded-lg px-4 py-3 text-slate-100 placeholder-slate-600 focus:outline-none focus:border-blue-500 transition-colors resize-y">{{ old('message', $defaultMessage) }}</textarea>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-lg transition-colors shadow-lg hover:shadow-blue-500/20 focus:outline-none cursor-pointer">
            Send Inquiry
        </button>
    </form>
</div>
