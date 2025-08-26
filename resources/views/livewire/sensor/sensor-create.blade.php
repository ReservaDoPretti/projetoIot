<div class="d-flex justify-content-center align-items-center mt-5">
    <div class="card shadow-sm" style="width: 100%; max-width: 600px;">
        <div class="card-body">
            <h4 class="card-title mb-4 text-center">
                <i class="bi bi-diagram-3-fill"></i> Criar Sensor <i class="bi bi-diagram-3"></i>
            </h4>

            <form wire:submit.prevent="store">
                 
                <div>
                    <label class="form-label"><i class="bi bi-pin-map-fill"></i> Ambiente ID</label>
                    <select class="form-select" aria-label="Status" wire:model='status'>
                        <option hidden></option>
                        <option value="1">ativo </option>
                        <option value="0">inativo</option>
                    </select>
                    @foreach ($ambientes as $ambiente)
                                <option value = {{$ambiente->id}} >{{ $ambiente->id }}</option>
                             </select>
                    @endforeach   
                    
                    @error('ambiente_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-upc"></i> Codigo</label>
                    <input type="text" wire:model="nome" class="form-control">
                    @error('nome')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label"><i class="bi bi-bug-fill"></i></i> Tipo</label>
                    <input type="text" wire:model="descricao" class="form-control">
                    @error('descricao')
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
                        wire:confirm = "Tem certeza que deseja cadastrar?">
                        <i class="bi bi-check-circle"></i> Cadastrar
                    </button>
                    </a>
                     <a href="{{ route('sensor.create') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left-circle"></i> Voltar
                        </a>
                </div>
            </form>
        </div>
    </div>
</div>