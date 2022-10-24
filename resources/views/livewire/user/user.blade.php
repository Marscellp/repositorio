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
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">CI</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)
                                    <tr> 
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->ci}}</td>
                                        {{--  --}}
                                        @if ($user->type === 'ADMIN')
                                            <td><span class="badge badge-success">Administrador</span></td>
                                        @elseif($user->type === 'DOCENTE')
                                            <td><span class="badge badge-danger">Docente</span></td>
                                        @elseif($user->type === 'AUXILIAR')
                                            <td><span class="badge badge-warning">Auxiliar</span></td>
                                        @elseif($user->type === 'DIRECTOR')
                                            <td><span class="badge badge-info">Director</span></td>
                                        @else
                                            <td><span class="badge badge-secondary">General</span></td>
                                        @endif
                                        {{--  --}}
                                        <td>{{$user->phone}}</td>
                                        {{--  --}}
                                        @if ($user->status === 'ENABLED')
                                            <td><span class="badge badge-success">Habilitado</span></td>
                                        @else
                                            <td><span class="badge badge-danger">Inhabilitado</span></td>
                                        @endif
                                        {{--  --}}
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-success" wire:click="Edit({{$user->id}})"><i class="bi bi-file-earmark-plus"></i></button>
                                                <button class="btn btn-info" title="Ver" wire:click="View({{$user->id}})"><i class="bi bi-eye"></i></button>
                                                <button class="btn btn-danger" onclick="openConfirm('{{$user->id}}')"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$data->links()}}
                    </div>
                </section>
                @include('livewire.user.formAddUpdate')
                @include('livewire.user.formView')
            </div>
        </div>
    </section>
<!-- /.content -->
</div>
{{--  --}}