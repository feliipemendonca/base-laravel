<x-dashboard>
    <x-slot name="title">{{ __('Minha Conta') }}</x-slot>
    <x-slot name="header">
        {{-- @include('layouts.headers.cards') --}}
    </x-slot>

    {{-- {{ dd(auth()->user()->hasfiles->file) }} --}}
    <x-slot name="content">
        <div class="container-fluid mt--7">
            <form method="post" action="{{ route('dashboard.profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                        <div class="card card-profile shadow">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 order-lg-2">
                                    <div class="card-profile-image d-flex">
                                        <img id="imagem" src="{{ auth()->user()->hasfiles ? Storage::url(auth()->user()->hasfiles->file->filename) : asset('argon/img/theme/team-4-800x800.jpg') }}" class="rounded-circle" style="width: 200px;height: 168px;">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0 pt-md-4 pt-5">
                                <div class="row pt-5">
                                    <div class="col">
                                        <div class="card-profile-stats d-flex justify-content-center flex-column mt-md-5 pt-5">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="input-image" name="file">
                                                <label class="custom-file-label text-left" for="customFileLang">Select file</label>
                                            </div>
                                            <x-error field="file" class="text-danger" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 order-xl-1">
                        <div class="card bg-secondary" style="border-bottom: none; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">
                            <div class="card-header bg-white border-0">
                                <div class="row align-items-center">
                                    <h3 class="mb-0">{{ __('Editar Conta') }}</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="heading-small text-muted mb-4">{{ __('Informa????o de Usu??rio') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Nome') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('E-mail') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Contato') }}</label>
                                        <input type="tel" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Contato') }}" value="{{ old('phone', auth()->user()->phone) }}">

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
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
            <div class="row">
                <div class="col-xl-8">
                    <div class="card bg-secondary" style="border-top: none; border-top-left-radius: 0; border-top-right-radius: 0;">
                        <div class="card-body">
                            <form method="post" action="{{ route('dashboard.profile.password') }}" autocomplete="off">
                                @csrf
                                @method('put')
                                <h6 class="heading-small text-muted mb-4">{{ __('Senha') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-current-password">{{ __('Senha') }}</label>
                                        <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Senha antiga') }}" value="">
                                        
                                        @if ($errors->has('old_password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('old_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-password">{{ __('Nova Senha') }}</label>
                                        <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Nova Senha') }}" value="">
                                        
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-password-confirmation">{{ __('Confirmar Nova Senha') }}</label>
                                        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirmar Nova Senha') }}" value="">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-dark mt-4">{{ __('Atualizar Dados') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-dashboard>
