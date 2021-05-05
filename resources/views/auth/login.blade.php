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
                                <small>
                                    Create new account OR Sign in with these credentials:
                                    <br>
                                    Username <strong>admin@argon.com</strong> Password: <strong>secret</strong>
                                </small>
                            </div>
                            <form role="form" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" value="admin@admin.com" required autofocus>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" value="123123" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customCheckLogin">
                                        <span class="text-muted">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-dark my-4">{{ __('Sign in') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-light">
                                    <small>{{ __('Forgot password?') }}</small>
                                </a>
                            @endif
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('register') }}" class="text-light">
                                <small>{{ __('Create new account') }}</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-dashboard>