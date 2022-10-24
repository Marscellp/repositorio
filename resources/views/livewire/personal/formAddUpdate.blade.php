@include('common.modalAddUpdate.modalHeader')
<span action="" class="p-0 p-sm-2 p-md-4">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <label for="Nombre">Usuario</label>
                <select wire:model='user_id' class="form-control">
                    <option value="Elegir" disable>Elegir</option>
                    @foreach($data_user as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('user_id') <span class="text-danger">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <label for="Nombre">Linea de investigacion</label>
                <select wire:model='linea_investigacions_id' class="form-control">
                    <option value="Elegir" disable>Elegir</option>
                    @foreach($data_linea as $linea)
                    <option value="{{$linea->id}}">{{$linea->titulo}}</option>
                    @endforeach
                </select>
                @error('linea_investigacions_id') <span class="text-danger">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                <label for="Nombre">Laboratorio</label>
                <select wire:model='laboratorios_id' class="form-control">
                    <option value="Elegir" disable>Elegir</option>
                    @foreach($data_laboratorio as $laboratorion)
                    <option value="{{$laboratorion->id}}">{{$laboratorion->laboratorio}}</option>
                    @endforeach
                </select>
                @error('laboratorios_id') <span class="text-danger">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="fecha_inicio">Fecha de inicio</label>
                <div class="input-group ">
                    <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3" wire:model.lazy="fecha_inicio">
                </div>
                @error('fecha_inicio') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="fecha_final">Fecha Final</label>
                <div class="input-group ">
                    <input type="date" class="form-control" id="basic-url" aria-describedby="basic-addon3" wire:model.lazy="fecha_final">
                </div>
                @error('fecha_final') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="linea_investigacion">Horario&nbsp;<button class="btn btn-success btn-sm"><i class="bi bi-cloud-download-fill"></i><small> &nbsp;Plantilla</small> </button></label>
                <div class="custom-file">
                    <input 
                        type="file" 
                        id="subirpdf"
                        class="custom-file-input" 
                        wire:model="horario" 
                        accept="application/pdf">
                    <label 
                        id="lblArchivo" 
                        class="custom-file-label" 
                        >
                        {{is_null($horario) ? 'Cargar archivo pdf' : 'ARCHIVO PDF CARGADO'}}
                    </label>
                </div>
                @error('horario') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label for="linea_investigacion">Firma&nbsp;<button class="btn btn-danger btn-sm"><i class="bi bi-youtube"></i><small> &nbsp;Instrucciones</small> </button></label>
                <div class="custom-file">
                    <input 
                        type="file" 
                        id="subirpdf"
                        class="custom-file-input" 
                        wire:model="firma" 
                        accept="image/x-png, image/gif, image/jpeg">
                    <label 
                        id="lblArchivo" 
                        class="custom-file-label" 
                        >
                        {{is_null($firma) ? 'Cargar archivo imagen' : 'ARCHIVO IMAGEN CARGADO'}}
                    </label>
                </div>
                @error('firma') <span class="text-danger er">{{$message}}</span>@enderror
            </div>
        </div>
    </div>
</span>
@include('common.modalAddUpdate.modalFooter')
