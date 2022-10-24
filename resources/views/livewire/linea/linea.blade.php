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
                                <th scope="col">Titulo</th>
                                <th scope="col">Area</th>
                                <th scope="col">Linea de investigacion</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $linea)
                                    <tr> 
                                        <th scope="row">{{$linea->id}}</th>
                                        <td>{{$linea->titulo}}</td>
                                        <td>{{$linea->area}}</td>
                                        <td>{{$linea->linea_investigacion}}</td>
                                        <td>{{$linea->descripcion}}</td>
                                        {{--  --}}
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-success" wire:click="Edit({{$linea->id}})"><i class="bi bi-file-earmark-plus"></i></button>
                                                <button class="btn btn-info" title="Ver" wire:click="View({{$linea->id}})"><i class="bi bi-eye"></i></button>
                                                <button class="btn btn-danger" onclick="openConfirm('{{$linea->id}}')"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{$data->links()}} --}}
                    </div>
                </section>
                @include('livewire.linea.formAddUpdate')
                @include('livewire.linea.formView')
            </div>
        </div>
    </section>
<!-- /.content -->
</div>
{{--  --}}