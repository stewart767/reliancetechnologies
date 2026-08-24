@props([
    'title' => null,
    'description' => null,
    'image' => null,
])

@php
    $siteName = setting('company_name', 'Reliance Solutions & Technology');
    $fullTitle = $title ? "$title | $siteName" : "$siteName | Technology That Moves Businesses Forward";
    $metaDescription = $description ?: setting('meta_description', 'Reliance Solutions & Technology delivers intelligent B2B tech systems, software development, cybersecurity, and electric tricycles in Tanzania.');
    $metaImage = $image ? asset('storage/' . $image) : asset('images/og-image.jpg');
    $currentUrl = request()->url();
@endphp

<!-- Primary SEO Tags -->
<title>{{ $fullTitle }}</title>
<meta name="title" content="{{ $fullTitle }}">
<meta name="description" content="{{ $metaDescription }}">
<link rel="canonical" href="{{ $currentUrl }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $currentUrl }}">
<meta property="og:title" content="{{ $fullTitle }}">
<meta property="og:description" content="{{ $metaDescription }}">
<meta property="og:image" content="{{ $metaImage }}">
<meta property="og:site_name" content="{{ $siteName }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $currentUrl }}">
<meta property="twitter:title" content="{{ $fullTitle }}">
<meta property="twitter:description" content="{{ $metaDescription }}">
<meta property="twitter:image" content="{{ $metaImage }}">
