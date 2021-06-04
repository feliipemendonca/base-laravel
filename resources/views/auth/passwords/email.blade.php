<x-dashboard>
    <x-slot name="title">{{ __('Bem vindo') }}</x-slot>
    <x-slot name="css">
        <style>
            body{
                background: linear-gradient(87deg, #212529 0, #212229 100%) !important;
            }
        </style>
    </x-slot>
    <x-slot name="content">

        <div class="container mt--7 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <img class="img-fluid w-50" src="{{ asset('argon/img/brand/logo.svg') }}" alt="{{ env('APP_NAME') }}">
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if (session('info'))
                                <div class="alert alert-info" role="alert">
                                    {{ session('info') }}
                                </div>
                            @endif
                             @if (session('error'))
                            {{ dd(session('error')) }}
                            @endif

                            <form role="form" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <x-input class="form-control" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required autofocus/>
                                    </div>
                                    <x-error field="email" class="invalid-feedback" />
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark my-4">{{ __('Send Password Reset Link') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-dashboard>
