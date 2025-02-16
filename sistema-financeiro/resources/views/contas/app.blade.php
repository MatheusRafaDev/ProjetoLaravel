<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Outros elementos do cabeçalho -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/imask"></script>
    
    <!-- Seu JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Máscara para valores decimais
            var decimalMaskElements = document.querySelectorAll('.decimal-mask');
            decimalMaskElements.forEach(function (element) {
                IMask(element, {
                    mask: Number,
                    scale: 2,
                    signed: false,
                    thousandsSeparator: '.',
                    padFractionalZeros: true,
                    normalizeZeros: true,
                    radix: ','
                });
            });

            // Máscara para valores percentuais
            var percentageMaskElements = document.querySelectorAll('.percentage-mask');
            percentageMaskElements.forEach(function (element) {
                IMask(element, {
                    mask: Number,
                    scale: 2,
                    signed: false,
                    suffix: '%',
                    thousandsSeparator: '.',
                    padFractionalZeros: true,
                    normalizeZeros: true,
                    radix: ','
                });
            });
        });
    </script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>