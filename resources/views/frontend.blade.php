<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test App</title>
        @vite('resources/sass/app.scss')
    </head>
    <body>
        <div id="app"></div>
        @vite('resources/js/main.ts')
    </body>
    <script>
        window.onload = function () {
            window.createApp('#app', {
                files: @json($files),
            });
        };
    </script>
</html>
