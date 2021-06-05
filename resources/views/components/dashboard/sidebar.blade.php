@php
    $items = [
        [
            'name' => 'Dashbord',
            'icon' => "<i class='ni ni-tv-2 text-primary'></i>",
            'link' => 'home'
        ],
        [
            'name' => 'Slides',
            'icon' => "<i class='fab fa-slideshare text-blue'></i>",
            'link' => 'dashboard.slides.index',
            'links' => [
                ['link' => 'dashboard.slides.index'],
                ['link' => 'dashboard.slides.create'],
                ['link' => 'dashboard.slides.show'],
                ['link' => 'dashboard.slides.edit']
            ]
        ],
        [
            'name' => 'Blog',
            'icon' => "<i class='fa fa-rss text-darker'></i>",
            'link' => 'dashboard.blog.index',
            'links' => [
                ['link' => 'dashboard.blog.index'],
                ['link' => 'dashboard.blog.create'],
                ['link' => 'dashboard.blog.show'],
                ['link' => 'dashboard.blog.edit']
            ]
        ],
        // [
        //     'name' => 'Páginas Estáticas',
        //     'icon' => "<i class='ni ni-briefcase-24 text-danger'></i>",
        //     'link' => 'dashboard.pages.index',
        //     'links' => [
        //         ['link' => 'dashboard.pages.index'],
        //         ['link' => 'dashboard.pages.create'],
        //         ['link' => 'dashboard.pages.show'],
        //         ['link' => 'dashboard.pages.edit']
        //     ]
        // ],
        [
            'name' => 'Produtos',
            'icon' => "<i class='fas fa-shopping-cart text-gray-dark'></i>",
            'link' => 'dashboard.products.index',
            'links' => [
                ['link' => 'dashboard.products.index'],
                ['link' => 'dashboard.products.create'],
                ['link' => 'dashboard.products.show'],
                ['link' => 'dashboard.products.edit']
            ]
        ],
    ];

    $settings = [
          [
            'name' => 'Minha Conta',
            'icon' => "<i class='fas fa-user-circle text-danger'></i>",
            'link' => 'dashboard.profile.edit',
        ],
        [
            'name' => 'Configurações',
            'icon' => "<i class='fas fa-cogs text-default'></i>",
            'link' => 'dashboard.settings.index',
            'links' => [
                ['link' => 'dashboard.settings.index'],
                ['link' => 'dashboard.settings.create'],
                ['link' => 'dashboard.settings.show'],
                ['link' => 'dashboard.settings.edit']
            ]
        ]
    ];
@endphp
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon/img/brand/logo.svg') }}" class="navbar-brand-img w-100" alt="{{ env('APP_NAME') }}">
        </a>
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('images/min/avatar-woman.svg') }}">
                            Argila
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('dashboard.profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon/img/brand/logo.svg') }}" class="navbar-brand-img w-100" alt="{{ env('APP_NAME') }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav">
                @foreach ($items as $item)
                    <li class="nav-item">
                        <a class="nav-link @isset($item['links']) @foreach ($item['links'] as
                            $link) {{ Route::is($link['link']) ? 'active' : '' }} @endforeach @endisset" href="{{ route($item['link']) }}">
                            {!! $item['icon'] !!} {{ __($item['name']) }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading text-muted">Configurações</h6>
            <ul class="navbar-nav">
                @foreach ($settings as $item)
                    <li class="nav-item">
                        <a class="nav-link @isset($item['links']) @foreach ($item['links'] as
                            $link) {{ Route::is($link['link']) ? 'active' : '' }} @endforeach @endisset" href="{{ route($item['link']) }}">
                            {!! $item['icon'] !!} {{ __($item['name']) }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading text-muted">Documentation</h6>
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship"></i> Getting started
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://argon-dashboard-laravel.creative-tim.com/docs/foundation/colors.html">
                        <i class="ni ni-palette"></i> Foundation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://argon-dashboard-laravel.creative-tim.com/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Components
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
