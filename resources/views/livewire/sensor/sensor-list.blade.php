<div class="container mt-4">
        

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center text-white">
                <h2 class="text-dark d-flex flex-row justify-content-start mb-2"> Sensores <i class="bi bi-diagram-3-fill"></i></h2>

                <div class="d-flex flex-row justify-content-end mb-2">
                   <a href="{{ route('sensor.create') }}" class="btn btn-primary">
                        <i class="bi bi-diagram-3"></i> Novo Sensor

                    </a>
                </div>
            </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" wire:model.live="search" class="form-control" wire:model.live="search"
                        placeholder="Buscar Sensores..." class="btn btn-primary">
                </div>

                <div class="col-md-3">
                    <select wire:model="perPage" class="form-select">
                        <option value="10">10 por página</option>
                        <option value="25">25 por página</option>
                        <option value="50">50 por página</option>
                        <option value="100">100 por página</option>
                    </select>
                </div>
            </div> 

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sensores as $sensor)
                            <tr>
                                <td>{{ $sensor->ambiente_id }}</td>
                                <td>{{ $sensor->codigo }}</td>
                                <td>{{ $sensor->tipo }}</td>
                                <td>{{ $sensor->descricao }}</td>
                                <td>{{ $sensor->status }}</td>
                               <td>
                                    <a href="{{ route('sensor.edit', $sensor->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button wire:click="delete({{ $sensor->id }})"
                                            class="btn btn-sm btn-danger"wire:confirm="Tem certeza que deseja excluir">
                                            <i class="bi bi-trash"></i>
                                     </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Nenhum sensor encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $sensores->links() }}
            </div>
        </div>
    </div>
</div>