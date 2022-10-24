@include('common.modalAddUpdate.modalHeader')
<form action="" class="p-0 p-sm-2 p-md-4">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input wire:model.lazy="titulo" type="text" class="form-control" placeholder="Ej: Campos electricos">
                @error('titulo') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="area">Area Investigacion</label>
                <input wire:model.lazy="area" type="text" class="form-control" placeholder="Ej: area big data">
                @error('area') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="linea_investigacion">Linea de investigacion</label>
                <input wire:model.lazy="linea_investigacion" type="text" class="form-control" placeholder="Ej: Sistemas">
                @error('linea_investigacion') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea wire:model.lazy="descripcion" type="text" class="form-control" placeholder="Ej: Laboratorio dedicado para el avence necesario de los cambios..." rows="5"></textarea>
                @error('descripcion') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
    </div>
</form>
@include('common.modalAddUpdate.modalFooter')
