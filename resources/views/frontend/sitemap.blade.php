{!! '<' . '?xml version="1.0" encoding="UTF-8"?' . '>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Static Routes -->
    <url>
        <loc>{{ route('home') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('about.overview') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>

    <url>
        <loc>{{ route('about.leadership') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('about.certificates') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('services.index') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('solutions.index') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('industries.index') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('projects.index') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('insights.index') }}</loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('yaoyao') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('contact.index') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- Services Dynamic Routes -->
    @foreach($services as $service)
        <url>
            <loc>{{ route('services.show', $service->slug) }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach

    <!-- Solutions Dynamic Routes -->
    @foreach($solutions as $solution)
        <url>
            <loc>{{ route('solutions.show', $solution->slug) }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach

    <!-- Industries Dynamic Routes -->
    @foreach($industries as $industry)
        <url>
            <loc>{{ route('industries.show', $industry->slug) }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    <!-- Projects Dynamic Routes -->
    @foreach($projects as $project)
        <url>
            <loc>{{ route('projects.show', $project->slug) }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach

    <!-- Blog Posts Dynamic Routes -->
    @foreach($posts as $post)
        <url>
            <loc>{{ route('insights.show', $post->slug) }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach
</urlset>
