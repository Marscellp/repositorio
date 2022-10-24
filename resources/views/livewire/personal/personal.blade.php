<div class="content-wrapper">
    {{-- TITLE --}}
    @include('template.components.title')
    {{-- ***** --}}
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                {{-- @include('livewire.home.body') --}}
                {{-- SECCION BUSQUEDA Y AGREGAR--}}
                <section class="cabecera">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 d-flex justify-content-between">
                            <button href="javascript:void(0)" class="btn btn-primary rounded-pill px-5" type="button" onClick="openModal()">
                                <i class="bi bi-plus-circle"></i> Agregar
                            </button>
                            @include('common.search.search')
                        </div>
                    </div>
                </section>
                <hr>
                <section class="tablas mt-4">
                    <div class="container-fluid">
                        <table class="table table-bordered table-responsive-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nro</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Linea</th>
                                <th scope="col">Laboratorio</th></th>
                                <th scope="col">Fecha Inicio</th>
                                <th scope="col">Fecha Final</th>
                                <th scope="col">Horario</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $info)
                                    <tr> 
                                        <th scope="row">{{$info->id}}</th>
                                        <td>{{$info->user->name}}</td>
                                        {{-- <td>{{$info->linea->titulo}}</td> --}}
                                        <td>{{$info->linea_investigacions->titulo}}</td>
                                        <td>{{$info->laboratorios->laboratorio}}</td>
                                        <td>{{$info->fecha_inicio}}</td>
                                        <td>{{$info->fecha_final}}</td>
                                        <td><a target="_blank" href="{{asset('storage/horario/'. $info->horario)}}" class="btn btn-success btn-sm"><i class="bi bi-cloud-download"></i>{{" "}}Descargar</a></td>
                                        {{--  --}}
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-success" wire:click="Edit({{$info->id}})"><i class="bi bi-file-earmark-plus"></i></button>
                                                <button class="btn btn-info" title="Ver" wire:click="View({{$info->id}})"><i class="bi bi-eye"></i></button>
                                                <button class="btn btn-danger" onclick="openConfirm('{{$info->id}}')"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                          {{-- {{$data->links()}} --}}
                    </div>
                </section>
                @include('livewire.personal.formAddUpdate')
                {{-- @include('livewire.linea.formView') --}}
            </div>
        </div>
    </section>
<!-- /.content -->
</div>
{{--  --}}