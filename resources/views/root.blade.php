<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ URL::asset('media/images/logos/store-front.png') }}" sizes="192x192">
        <title>{{ config('app.name', '5labs') }} | Loja Oficial</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
        @spladeHead

        <style>
            .carousel__slide {
                align-items: start !important;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        @splade
            
        <script>
            function fallbackCopyTextToClipboard(text) {
                var textArea = document.createElement("textarea");
                textArea.value = text;
                // Avoid scrolling to bottom
                textArea.style.top = "0";
                textArea.style.left = "0";
                textArea.style.position = "fixed";
                document.body.appendChild(textArea);
                textArea.focus();
                textArea.select();
                try {
                    var successful = document.execCommand('copy');
                    var msg = successful ? 'bem-sucedida' : 'malsucedida';
                    alert('A cópia para a área de transferência foi: ' + msg);
                } catch (err) {
                    console.error('Fallback: Oops, unable to copy', err);
                }
                document.body.removeChild(textArea);
            }
            function copyToClipboard(text) {
                if (!navigator.clipboard) {
                    fallbackCopyTextToClipboard(text);
                    return;
                }
                navigator.clipboard.writeText(text).then(function() {
                    alert('A cópia para a área de transferência foi bem-sucedida');
                }, function(err) {
                    console.error('Async: Could not copy text: ', err);
                });
            }
        </script>
        
    </body>
</html>
