<meta name="keywords" content="{{ $metatags['keywords'] }}" />
<meta name="title" content="{{ $metatags['title'] }}" />
<meta name="description" content="{{ $metatags['description'] }}" />

<!-- Schema.org markup (Google) -->
<meta itemprop="name" content="{{ $metatags['title'] }}">
<meta itemprop="description" content="{{ $metatags['description'] }}">
<meta itemprop="image" content="{{ url('/') }}/images/logo.jpeg">

<!-- Twitter Card markup-->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ url()->current() }}">
<meta name="twitter:title" content="{{ $metatags['title'] }}">
<meta name="twitter:description" content="{{ $metatags['description'] }}">
<meta name="twitter:creator" content="">
<!-- Twitter summary card with large image must be at least 280x150px -->
<meta name="twitter:image" content="{{ url('/') }}/images/logo.jpeg">
<meta name="twitter:image:alt" content="">

<!-- Open Graph markup (Facebook, Pinterest) -->
<meta property="og:title" content="{{ $metatags['title'] }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:image" content="{{ url('/') }}/images/logo.jpeg" />
<meta property="og:description" content="{{ $metatags['description'] }}" />
<meta property="og:site_name" content="Metall Vsem" />