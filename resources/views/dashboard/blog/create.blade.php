<x-dashboard>
    <x-slot name="title">{{ __('Blog / Adicionar') }}</x-slot>
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
                    <x-form action="{{ route('dashboard.blog.store') }}" has-files>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-8">
                                    <div class="form-group">
                                        <x-label for="Título" />
                                        <x-input name="title" class="form-control" value="{{ old('title') }}" />
                                        <x-error field="title" class="text-danger" />
                                    </div>
                                    <div class="form-group">
                                        <x-label for="Palavras Chaves" />
                                        <x-input name="tags" class="form-control" value="{{ old('tags') }}" />
                                        <x-error field="tags" class="text-danger" />
                                    </div>
                                    <div class="form-group">
                                        <x-label for="Descrição do post" />
                                        <x-input name="seo" class="form-control" value="{{ old('seo') }}" />
                                        <x-error field="seo" class="text-danger" />
                                    </div>
                                    <div class="form-group">
                                        <x-label for="Caption(texto que ficar abaixo da imagem)" />
                                        <x-input name="caption" class="form-control" value="{{ old('caption') }}" />
                                        <x-error field="caption" class="text-danger" />
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <x-label for="ativo" />
                                                <select name="active" class="form-control">
                                                    <option value="1" {{ old('active') == 1 ? 'selected' : '' }}>Sim</option>
                                                    <option value="0" {{ old('active') == 0 ? 'selected' : '' }}>Não</option>
                                                </select>
                                                <x-error field="active" class="text-danger" />
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <x-label for="Publicação" />
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="ni ni-calendar-grid-58"></i>
                                                        </span>
                                                    </div>
                                                    <x-input class="form-control" placeholder="Inicio" name="publish_at"
                                                        type="date" value="{{ old('publish_at') }}" />
                                                </div>
                                                <x-error field="publish_at" class="text-danger" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <x-label for="Conteúdo" />
                                        <x-textarea name="description" class="form-control" id="content">{{ old('description') }}</x-textarea>
                                        <x-error field="description" class="text-danger" />
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="form-group">
                                        <x-label for="Imagem" />
                                        <x-input name="file" type="file" id="input-image"/>
                                        <img id="imagem" class="img-fluid" src="">
                                        <x-error field="file" class="text-danger" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </nav>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </x-slot>
</x-dashboard>