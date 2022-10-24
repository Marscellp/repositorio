@include('common.modalView.modalHeader')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-6">
            <img class="img-fluid" src="{{$avatar}}" alt="">
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="card" >
                <div class="card-body ">
                    <div class="bg-primary rounded px-3"><strong>Nombre :</strong><br>  {{$name}}</div>
                    <section class="p-0 p-sm-2">
                        <div><strong>email : </strong>{{$email}}</div>
                        <div><strong>CI : </strong>{{$ci}}</div>
                        <div><strong>Tipo : </strong>{{$type == 'ADMIN' ? 'Administrador' : 'Estudiante'}}</div>
                        <div><strong>Telefono : </strong>{{$phone}}</div>
                        <div><strong>Estado : </strong>{{$status == 'ENABLED' ? 'Habilitado' : 'Deshabilitado'}}</div>
                    </section>
                </div>
              </div>
        </div>
    </div>
</div>
@include('common.modalView.modalFooter')
