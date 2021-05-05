<div class="card w-100">
    <!-- Card header -->
    <div class="card-header border-0">

        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h3 class="mb-0">Lista</h3>
            </div>
            <div class="col-sm-12 col-md-4">
                <div id="datatable-basic_filter" class="dataTables_filter">
                    <input wire:model="search" class="form-control form-control-sm" type="text" placeholder="Pesquisar">
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="empresa">Image</th>
                    <th scope="col" class="sort" data-sort="empresa">Title</th>
                    <th scope="col" class="sort" data-sort="usuario">Position</th>
                    <th scope="col" class="sort" data-sort="ativo">Ativo</th>
                    <th scope="col" class="sort" data-sort="cadastro">Cadastro</th>
                    <th scope="col" class="sort" data-sort="cadastro">Atualizado</th>
                    <th scope="col" class="sort" data-sort="opcoes">Opções</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($items as $item)
                    <tr>
                        <th>
                            <img src="{{ Storage::get($item->files->filename) }}" width="300">
                        </th>
                        <td class="budget">
                            {{ $item->title }}
                        </td>
                        <td>
                            <p class="badge badge-{{ $item->active == 1 ? 'success' : 'danger' }}">
                                {{ $item->active == 1 ? 'Ativo' : 'Inativo' }}
                            </p>
                        </td>
                        <td>
                            {{ $item->created_at->format('d-m-Y') }}
                        </td>
                        <td>
                            {{ $item->updated_at->format('d-m-Y') }}
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ni ni-archive-2"></i>Opções
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('dashboard.slides.edit', $item) }}">
                                        <i class="fas fa-edit"></i>Editar
                                    </a>
                                    @livewire('delete', ['route' => route('dashboard.slides.destroy',
                                    $item)],key($item->id))
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
