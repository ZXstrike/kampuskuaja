<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Page Title' }}</title>

    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>


    @vite('resources/css/app.css')

    <style>
        .show-scroll::-webkit-scrollbar {
            display: block;
        }

        body::-webkit-scrollbar {
            display: none;
        }

        ::-webkit-scrollbar {
            display: none;
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            margin: 5px 10px;
            background-color: rgba(128, 128, 128, 0.433);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-track {
            display: none;
        }
    </style>
</head>

<body class="h-screen w-screen">
    <x-navbar />
    {{ $slot }}
    <footer class="w-full h-[15vh] bg-cyan-800 align-middle justify-center content-center text-white text-center">
        <p>&copy; 2024 ZXSTTM. All rights reserved.</p>
    </footer>
</body>

</html>
