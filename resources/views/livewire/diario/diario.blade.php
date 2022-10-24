<div class="content-wrapper">
    {{-- TITLE --}}
    @include('template.components.title')
    {{-- ***** --}}
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">
                {{-- @include('livewire.home.body') --}}
                <section class="titulo">
                    <div class="row">
                        <div class="col-12">
                            <h5>Informacion Usuario</h5> 
                            <hr>
                            <div class="card p-4">
                                <div class="row">
                                    @foreach ($data as $info)
                                        <div class="col-12">
                                            <strong>Nombre personal: </strong><span>{{$info->user->name}}</span>
                                        </div>
                                        <div class="col-4">
                                            <strong>Email: </strong><span>{{$info->user->email}}</span>
                                        </div>
                                        <div class="col-4">
                                            <strong>Telefono: </strong><span>{{$info->user->phone}}</span>
                                        </div>
                                        <div class="col-4">
                                            <strong>Permisos: </strong><span>{{$info->user->type}}</span>
                                        </div>
                                        <hr>
                                        <div class="col-12">
                                            <strong>Titulo: </strong><span>{{$info->linea_investigacions->titulo}}</span>
                                        </div>
                                        <div class="col-4">
                                            <strong>Linea de investigacion: </strong><span>{{$info->linea_investigacions->linea_investigacion}}</span>
                                        </div>
                                        <div class="col-4">
                                            <strong>Area: </strong><span>{{$info->linea_investigacions->area}}</span>
                                        </div>
                                        <div class="col-4">
                                            <strong>Laboratorio: </strong><span>{{$info->laboratorios->laboratorio}}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
                <section class="tablas mt-4">
                    <div class="container-fluid">
                        <table class="table table-bordered table-responsive-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nro</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Linea de investigacion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_diario as $diario)
                                    <tr> 
                                        <th scope="row">{{$diario->id}}</th>
                                        <td>{{$diario->fecha}}</td>
                                        <td>{{$diario->hora}}</td>
                                        <td>{{$diario->personals->user->name}}</td>
                                        <td>{{$diario->linea_investigacions->titulo}}</td>
                                        {{--  --}}
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-success" wire:click="Edit({{$diario->id}})"><i class="bi bi-file-earmark-plus"></i></button>
                                                <button class="btn btn-info" title="Ver" wire:click="View({{$diario->id}})"><i class="bi bi-eye"></i></button>
                                                <a href="{{url('/diario/pdf/informe/' . $diario->id)}}" target="_blank" class="btn btn-warning" title="Ver"><i class="bi bi-printer-fill"></i></a>
                                                <button class="btn btn-danger" onclick="openConfirm('{{$diario->id}}')"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
                @include('livewire.diario.formAddUpdate')
                @include('livewire.diario.formView')
            </div>
        </div>
    </section>
<!-- /.content -->
</div>