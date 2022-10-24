@include('common.modalView.modalHeader')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card" >
                <div class="card-body ">
                    <div class="bg-success p-2 ">
                        <h5>Informacion de usuario</h5>
                    </div>
                    <section class="">
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
                                <div class="col-12">
                                    <strong>Linea de investigacion: </strong><span>{{$info->linea_investigacions->linea_investigacion}}</span>
                                </div>
                                <div class="col-12">
                                    <strong>Area: </strong><span>{{$info->linea_investigacions->area}}</span>
                                </div>
                                <div class="col-12">
                                    <strong>Laboratorio: </strong><span>{{$info->laboratorios->laboratorio}}</span>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <div class="bg-success p-2 ">
                        <h5>Datos de informe</h5>
                    </div>
                    <section>
                        <div class="row">
                            <div class="col-6 p-2">
                                <strong>fecha: </strong><span>{{$fecha}}</span>
                            </div>
                            <div class="col-6 p-2">
                                <strong>Hora: </strong><span>{{$hora}}</span>
                            </div>
                            <div class="col-12">
                                <strong>Resumen: </strong><p>{{$resumen}}</p>
                            </div>
                            <div class="col-12">
                                <strong>Procedimiento: </strong><p>{{$procedimiento}}</p>
                            </div>
                            <div class="col-12">
                                <strong>Observacion: </strong><p>{{$observacion}}</p>
                            </div>
                        </div>
                    </section>
                </div>
              </div>
        </div>
    </div>
</div>
@include('common.modalView.modalFooter')
