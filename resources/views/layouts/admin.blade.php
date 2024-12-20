<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <x-head />
    </head>

    <body class="dark:bg-neutral-800 bg-neutral-100 dark:text-white">
        <x-sidebar />

        <main class="dashboard-main">
            <x-navbar />

            <div class="dashboard-main-body">
                {{ $slot }}
            </div>

            <x-footer />
        </main>

        <x-scripts />

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const toast = document.querySelector('[role="alert"]');
                if (toast) {
                    setTimeout(() => {
                        toast.remove();
                    }, 5000); // 5 detik
                }
            });
        </script>
    </body>
</html>
