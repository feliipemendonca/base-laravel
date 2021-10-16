<x-dashboard>
    <x-slot name="title">{{ __('Minha Conta') }}</x-slot>
    <x-slot name="header">
        {{-- @include('layouts.headers.cards') --}}
    </x-slot>
    <x-slot name="content">
        <div class="container-fluid mt--7">
            <form method="post" action="{{ route('dashboard.profile.update') }}" autocomplete="off">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                        <div class="card card-profile shadow">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 order-lg-2">
                                    <div class="card-profile-image d-flex">
                                        <img id="imagem" src="{{ old('file') ?? asset('argon/img/theme/team-4-800x800.jpg') }}" class="rounded-circle" style="width: 200px;height: 168px;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0 pt-md-4 pt-5">
                                <div class="row">
                                    <div class="col">
                                        <div class="card-profile-stats d-flex justify-content-center mt-md-5 pt-5">
                                            <div class="pt-5 w-75">
                                                <x-input name="file" type="file" id="input-image"/>
                                                <x-error field="file" class="text-danger"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 order-xl-1">
                        <div class="card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <div class="row align-items-center">
                                    <h3 class="mb-0">{{ __('Editar Conta') }}</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="heading-small text-muted mb-4">{{ __('Informação de Usuário') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Nome') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('E-mail') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <h6 class="heading-small text-muted mb-4">{{ __('Senha') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-current-password">{{ __('Senha') }}</label>
                                        <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                                        
                                        @if ($errors->has('old_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('old_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-password">{{ __('Nova Senha') }}</label>
                                        <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                        
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-password-confirmation">{{ __('Confirmar Nova Senha') }}</label>
                                        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-dark mt-4">{{ __('Atualizar Dados') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
</x-dashboard>
