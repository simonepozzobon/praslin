<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="BH050ogg4vGRm3YqxKWv3OWKlBdqDGO-S5iLgIJAbdI" />
    @yield('seo')
    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Praslin Pro Divers - @yield('title')</title>

    <link rel="stylesheet" href="/css/app.css">

    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};
    </script>

    <script src="/js/manifest.js"></script>
    <script src="/js/vendor.js"></script>
    <script src="/js/app.js"></script>
</head>
