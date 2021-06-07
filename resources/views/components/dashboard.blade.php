<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('argon/img/brand/favicon.png') }}" type="image/png">

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
        @include('components.dashboard.sidebar')
    @endauth

    <div class="main-content">
        @auth()
            @include('components.dashboard.navbar',['title' => (String)$title ?? null])
        @endauth
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center">
            <span class="mask bg-gradient-dark opacity-8"></span>
            <div class="container-fluid d-flex align-items-center">
                <div class="row w-100">
                    <div class="col-md-12 {{ @$class ?? '' }}">
                        <h1 class="display-2 text-white">{{ '' }}</h1>
                        <div class="text-white mt-0 mb-5">{!! @$description !!}</div>
                    </div>
                    <div class="col-12">{{ @$header }}</div>
                    
                </div>
            </div>
        </div>
        {{ $content }}
        @auth()
        <div class="container-fluid">
            @include('components.dashboard.footer')
        </div>
        @endauth
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('argon/js/custom.js') }}"></script>
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    {{ @$js }}
</body>
</html>