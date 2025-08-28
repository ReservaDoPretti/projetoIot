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
                    <label class="form-label"><i class="bi bi-pin-map-fill"></i> Ambiente ID</label>
                    <select class="form-select" aria-label="status" wire:model='ambiente'>
                        <option hidden></option>
                        @foreach($ambientes as $ambiente)
                            <option value={{$ambiente->id}}>{{$ambiente->nome}}</option>
                        @endforeach
                    </select>   
                    
                    @error('ambiente_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-upc"></i> Codigo</label>
                    <input type="text" wire:model="codigo" class="form-control">
                    @error('nome')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-bug-fill"></i> Tipo</label>
                    <input type="text" wire:model="tipo" class="form-control">
                    @error('tipo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-chat-left-text-fill"></i> Descricao</label>
                    <input type="text" wire:model="descricao" class="form-control">
                    @error('descricao')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label class="form-label"><i class="bi bi-hand-thumbs-up-fill"></i> Status <i class="bi bi-hand-thumbs-down-fill"></i></label>
                    <select class="form-select" aria-label="Status" wire:model='status'>
                        <option hidden></option>
                        <option value="1">ativo </option>
                        <option value="0">inativo</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <br>
                <div class="d-flex justify-content-between">
                    <button wire:click type="submit" class="btn btn-success"
                        wire:confirm = "Tem certeza que deseja atualizar?">
                        <i class="bi bi-check-circle"></i> Editar
                    </button>
                    </a>
                    <a href="{{ route('sensor.list') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>