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
                            <a href="javascript:void(0)" class="btn btn-primary rounded-pill px-5" type="button" onClick="openModal()">
                                <i class="bi bi-plus-circle"></i> Agregar
                            </a>
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
                                <th scope="col">Laboratorio</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $laboratorio)
                                    <tr> 
                                        <th scope="row">{{$laboratorio->id}}</th>
                                        <td>{{$laboratorio->laboratorio}}</td>
                                        <td>{{$laboratorio->descripcion}}</td>
                                        {{--  --}}
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-success" wire:click="Edit({{$laboratorio->id}})"><i class="bi bi-file-earmark-plus"></i></button>
                                                <button class="btn btn-info" title="Ver" wire:click="View({{$laboratorio->id}})"><i class="bi bi-eye"></i></button>
                                                <button class="btn btn-danger" onclick="openConfirm('{{$laboratorio->id}}')"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{$data->links()}} --}}
                    </div>
                </section>
                @include('livewire.laboratorio.formAddUpdate')
                @include('livewire.laboratorio.formView')
            </div>
        </div>
    </section>
<!-- /.content -->
</div>
{{--  --}}