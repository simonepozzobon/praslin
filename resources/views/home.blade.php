<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="BH050ogg4vGRm3YqxKWv3OWKlBdqDGO-S5iLgIJAbdI" />
        {{-- csrf token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Praslin Pro Divers</title>

        <link rel="stylesheet" href="/css/app.css">

        <script>
            window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};
        </script>
    </head>
    <body>
        <div id="app">
            <main-template></main-template>
        </div>
        <script src="/js/manifest.js"></script>
        <script src="/js/vendor.js"></script>
        <script src="/js/app.js"></script>
    </body>
</html>
