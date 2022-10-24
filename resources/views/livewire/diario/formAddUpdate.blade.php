@include('common.modalAddUpdate.modalHeader')
<form action="" class="p-0 p-sm-2 p-md-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="fecha">Fecha de inicio</label>
                <div class="input-group ">
                    <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3" wire:model.lazy="fecha">
                </div>
                @error('fecha') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="hora">Fecha de inicio</label>
                <div class="input-group ">
                    <input type="time" class="form-control" id="basic-url" aria-describedby="basic-addon3" wire:model.lazy="hora">
                </div>
                @error('hora') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="resumen">Resumen</label>
                <textarea wire:model.lazy="resumen" type="text" class="form-control" placeholder="Ej: Laboratorio dedicado para el avence necesario de los cambios..." rows="7"></textarea>
                @error('resumen') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="procedimiento">Procedimiento</label>
                <textarea wire:model.lazy="procedimiento" type="text" class="form-control" placeholder="Ej: Laboratorio dedicado para el avence necesario de los cambios..." rows="7"></textarea>
                @error('procedimiento') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="descripcion">Observaciones</label>
                <textarea wire:model.lazy="observacion" type="text" class="form-control" placeholder="Ej: Laboratorio dedicado para el avence necesario de los cambios..." rows="4"></textarea>
                @error('observacion') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
    </div>
</form>
@include('common.modalAddUpdate.modalFooter')
