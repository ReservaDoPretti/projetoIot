<div class="container mt-4">
        

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center text-white">
            <h2 class="text-dark d-flex flex-row justify-content-start mb-2" > Sensores <i
                    class="bi bi-person-fill"></i></h2>

          
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
                            <th>Ambiente_ID</th>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Descrição</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sensores as $sensors)
                            <tr>
                                <td>{{ $sensor->ambienteID }}</td>
                                <td>{{ $sensor->codigo }}</td>
                                <td>{{ $sensor->tipo }}</td>
                                <td>{{ $sensor->descricao }}</td>
                                <td>{{ $sensor->status }}</td>
                                <td>
                                    <a href="{{ route('sensor.create', $ambiente->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Nenhum ambiente encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $ambientes->links() }}
            </div>
        </div>
    </div>
</div>