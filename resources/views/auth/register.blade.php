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
        <div class="container mt--9 pb-5">
            <!-- Table -->
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <img class="img-fluid w-50" src="{{ asset('argon/img/brand/logo.svg') }}" alt="{{ env('APP_NAME') }}">
                            </div>
                            <form role="form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                        </div>
                                        <x-input class="form-control" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name') }}" required autofocus />
                                    </div>
                                    <x-error field="name" class="invalid-feedback" />
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <x-input class="form-control" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required />
                                    </div>
                                    <x-error field="email" class="invalid-feedback" />
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <x-input class="form-control" placeholder="{{ __('Password') }}" type="password" name="password" required/>
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
                                     <x-error field="password_confirmation" class="invalid-feedback" />
                                </div>
                                <div class="text-muted font-italic">
                                    <small>{{ __('password strength') }}: <span class="text-danger font-weight-700">{{ __('strong') }}strong</span></small>
                                </div>
                                <div class="row my-4">
                                    <div class="col-12">
                                        <div class="custom-control custom-control-alternative custom-checkbox">
                                            <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                            <label class="custom-control-label" for="customCheckRegister">
                                                <span class="text-muted">{{ __('I agree with the') }} <a href="#!" class="text-dark">{{ __('Privacy Policy') }}</a></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark mt-4">{{ __('Create account') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-dashboard>
