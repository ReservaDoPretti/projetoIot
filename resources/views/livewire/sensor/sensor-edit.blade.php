<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">
                <i class="bi bi-pencil-square"></i> Editar Ambiente
            </h4>
        </div>

        <div class="card-body">
            <form wire:submit.prevent="update">
                  <div>
                    <label class="form-label"><i class=""></i> Ambiente ID</label>
                    <select class="form-select" aria-label="Status" wire:model='status'>
                        <option hidden></option>
                        <option value="1">ativo </option>
                        <option value="0">inativo</option>
                    </select>
                    @error('ambiente_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-person"></i> Nome</label>
                    <input type="text" wire:model="nome" class="form-control">
                    @error('nome')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-credit-card"></i> Descricao</label>
                    <input type="text" wire:model="descricao" class="form-control">
                    @error('descricao')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div>
                    <label class="form-label"><i class=""></i> Status</label>
                    <select class="form-select" aria-label="Status" wire:model='status'>
                        <option hidden></option>
                        <option value="1">ativo </option>
                        <option value="0">inativo</option>
                    </select>
                    @error('cargo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="d-flex justify-content-between">
                    <button wire:click type="submit" class="btn btn-success"
                        wire:confirm = "Tem certeza que deseja cadastrar?">
                        <i class="bi bi-check-circle"></i> Editar
                    </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>