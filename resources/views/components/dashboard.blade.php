<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') .' - '. @$title }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    @livewireStyles

    {{ @$css }}
    
</head>
<body>

    @auth()
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <x-dashboard.sidebar />
    @endauth

    <div class="main-content">
        @auth()
            @php
                $title = (String)$title ?? null;
            @endphp
            <x-dashboard.navbar :title="$title"/>
        @endauth
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center">
            <span class="mask bg-gradient-primary opacity-8"></span>
            <div class="container-fluid d-flex align-items-center">
                <div class="row w-100">
                    <div class="col-md-12 {{ @$class ?? '' }}">
                        <h1 class="display-2 text-white">{{ '' }}</h1>
                        <div class="text-white mt-0 mb-5">{!! @$description !!}</div>
                    </div>
                    {{ @$header }}
                </div>
            </div>
        </div>
        {{ $content }}
        <div class="container-fluid">
            <x-dashboard.footer />
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    @livewireScripts
    <script>
        @if(session('success'))
            Swal.fire(
                'Sucesso',
                '{!! session('success') !!}',
                'success'
                
            )
        @endif

        @if(session('error'))
            Swal.fire(
                'Erro!',
                '{!! session('error') !!}',
                'error',
            )
        @endif
    </script>
    {{ @$js }}
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
</body>
</html>