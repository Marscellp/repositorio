@include('common.modalAddUpdate.modalHeader')
<form action="" class="p-0 p-sm-2 p-md-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="name">Nombre completo</label>
                <input wire:model.lazy="name" type="text" class="form-control" placeholder="Ej: Lenny Valencia">
                @error('name') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="email">Email usuario</label>
                <input wire:model.lazy="email" type="text" class="form-control" placeholder="Ej: val@gmail.com">
                @error('email') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="ci">Carnet Identificacion (Password)</label>
                <input wire:model.lazy="ci" type="text" class="form-control" placeholder="Ej: 1234567">
                @error('ci') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="phone">Telefono</label>
                <input wire:model.lazy="phone" type="text" class="form-control" placeholder="Ej: 74123451">
                @error('phone') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="type">Tipo</label>
                <select wire:model='type' class="form-control">
                    <option value="Elegir" disable>Elegir</option>
                    <option value="ADMIN">Administrador</option>
                    <option value="DOCENTE">Docente</option>
                    <option value="AUXILIAR">Auxiliar</option>
                    <option value="DIRECTOR">Director</option>
                    <option value="GENERAL">General</option>
                </select>
                @error('type') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="status">Estado</label>
                <select wire:model='status' class="form-control">
                    <option value="Elegir" disable>Elegir</option>
                    <option value="ENABLED">Habilitado</option>
                    <option value="DISABLED">Inhabilitado</option>
                </select>
                @error('status') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
    </div>
</form>
@include('common.modalAddUpdate.modalFooter')
