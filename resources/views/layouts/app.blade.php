<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script>
            $(document).ready(function() {
                $('#submitUrl').click(function() {
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    // $('#errorSuccessMsg').html("");
                    $('#errorSuccessMsg').html("");
                    $('#newShortUrl').html("");
                    $.ajax({
                        url: '/api/shorten', 
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        data: {
                            urlEntered: $('#enterUrl').val(),
                            userId: $('#userId').val()
                        }, 
                        success: function(response) {
                            console.log(response);
                            $('#errorSuccessMsg').html(response.message);
                            if(response.success == true){
                                $('#errorSuccessMsg').css('color', 'green');
                                $('#newShortUrl').html(response.data);
                            }
                            else{
                                $('#errorSuccessMsg').css('color', 'red');
                            }
                        },
                        error: function(error) {
                            // console.error(error.responseJSON.errors.urlEntered[0]);
                            $('#errorSuccessMsg').html(error.responseJSON.errors.urlEntered[0]);
                            $('#errorSuccessMsg').css('color', 'red');
                        }
                    });
                });
            });
        </script>
    </body>
</html>
