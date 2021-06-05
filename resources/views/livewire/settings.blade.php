<div class="card w-100">
    <!-- Card header -->
    <div class="card-header border-0">

        <div class="row">
            <div class="col-12 col-sm-3 col-md-3 col-lg-4 col-xl-7">
                <h3 class="mb-0">Lista</h3>
            </div>
            <div class="col-8 col-sm-5 col-md-6 col-lg-6 col-xl-4">
                <div id="datatable-basic_filter" class="dataTables_filter">
                    <input wire:model="search" class="form-control form-control-sm" type="text" placeholder="Pesquisar">
                </div>
            </div>
            <div class="col-4 col-md-3 col-lg-2 col-xl-1">
                <a href="{{ route('dashboard.settings.create') }}" class="btn btn-danger btn-sm">Adicionar</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="empresa">Title</th>
                    <th scope="col" class="sort" data-sort="empresa">Descrição</th>
                    <th scope="col" class="sort" data-sort="empresa">Slug</th>
                    <th scope="col" class="sort" data-sort="cadastro">Cadastro</th>
                    <th scope="col" class="sort" data-sort="cadastro">Atualizado</th>
                    <th scope="col" class="sort" data-sort="opcoes">Opções</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($items as $item)
                    <tr>
                        <td class="budget">
                            {{ $item->title }}
                        </td>
                        <td class="budget">
                            {{ Str::limit($item->description, 100) }}
                        </td>                        
                        <td class="budget">
                            {{ $item->slug }}
                        </td>
                        {{-- <td class="budget">
                            {{ $item->position }}
                        </td> --}}
                        {{-- <td>
                            <p class="badge badge-{{ $item->active == 1 ? 'success' : 'danger' }}">
                                {{ $item->active == 1 ? 'Ativo' : 'Inativo' }}
                            </p>
                        </td> --}}
                        <td>
                            {{ $item->created_at->format('d-m-Y') }}
                        </td>
                        <td>
                            {{ $item->updated_at->format('d-m-Y') }}
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ni ni-archive-2"></i>Opções
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('dashboard.settings.edit', $item) }}">
                                        <i class="fas fa-edit"></i>Editar
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Card footer -->
    <div class="card-footer py-4">
        {{ $items->links() }}
    </div>
</div>
