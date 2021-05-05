<x-dashboard>
    <x-slot name="title">{{ __('Slides / Adicionar') }}</x-slot>
    <x-slot name="header">
        {{-- @include('layouts.headers.cards') --}}
    </x-slot>
    <x-slot name="content"> 
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="card w-100">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col-8">
                                <h3 class="mb-0">Adicionar</h3>
                            </div>
                            <div class="col-4 d-flex justify-content-end">
                                <a href="javascript:history.back();" class="btn btn-danger btn-sm">Voltar</a>
                            </div>
                        </div>
                    </div>
                    <x-form action="{{ route('dashboard.slides.update', $item) }}" has-files>
                        @method('put')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="form-group">
                                        <x-label for="Title" />
                                        <x-input name="title" class="form-control" value="{{ $item->title }}" />
                                        <x-error field="title" class="text-danger" />
                                    </div>
                                    <div class="form-group">
                                        <x-label for="Link" />
                                        <x-input name="link" type="url" class="form-control" value="{{ $item->link }}" />
                                        <x-error field="link" class="text-danger" />
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-12 col-md-6">
                                            <x-label for="ativo" />
                                            <select name="active" class="form-control">
                                                <option value="1" {{ $item->active == 1 ? 'selected' : '' }}>Sim</option>
                                                <option value="0" {{ $item->active == 0 ? 'selected' : '' }}>Não</option>
                                            </select>
                                            <x-error field="active" class="text-danger" />
                                        </div>
                                        <div class="form-group col-12 col-md-6">
                                            <x-label for="Posição" />
                                            <x-input name="position" type="number" class="form-control" value="{{ $item->position }}" />
                                            <x-error field="position" class="text-danger" />
                                        </div>
                                    </div>
                                    <div class="form-row w-100 input-daterange datepicker row align-items-center">
                                        <div class="col">
                                            <div class="form-group">
                                                <x-label for="Início" />
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="ni ni-calendar-grid-58"></i>
                                                        </span>
                                                    </div>
                                                    <x-input class="form-control" placeholder="Inicio" name="start_at"
                                                        type="date" value="{{ $item->start_at }}" />
                                                </div>
                                                <x-error field="start_at" class="text-danger" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <x-label for="Fim" />
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="ni ni-calendar-grid-58"></i>
                                                        </span>
                                                    </div>
                                                    <x-input class="form-control" placeholder="Fim" name="finish_at"
                                                        type="date" value="{{ $item->finish_at }}" />
                                                </div>
                                                <x-error field="finish_at" class="text-danger" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                        <x-label for="Imagem" />
                                        <x-input name="file" type="file" id="input-image"/>
                                        <img id="imagem" class="img-fluid" src="{{ Storage::url($item->files->filename) }}">
                                        <x-error field="file" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </nav>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="js">
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader()
                    reader.onload = function(e) {
                        $('#imagem').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(input.files[0])
                }
            }
            $('#input-image').change(function() {
                readURL(this)
            })
        </script>
    </x-slot>
</x-dashboard>