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
    
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <img class="img-fluid w-50" src="{{ asset('argon/img/brand/logo.svg') }}" alt="{{ env('APP_NAME') }}">
                            </div>
                            <form role="form" method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <x-input class="form-control" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus />
                                    </div>
                                    <x-error field="email" class="invalid-feedback" />
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <x-input class="form-control" name="password" placeholder="{{ __('Password') }}" type="password" required/>
                                    </div>
                                    <x-error field="password" class="invalid-feedback" />
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <x-input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required/>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark my-4">{{ __('Reset Password') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-dashboard>
