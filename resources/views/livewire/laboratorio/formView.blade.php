@include('common.modalView.modalHeader')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card" >
                <div class="card-body ">
                    <div class="bg-primary rounded px-3"><strong>Laboratorio :</strong><br>  {{$lab}}</div>
                    <section class="p-0 p-sm-2">
                        <div><strong>Descripcion : </strong><p>{{$descripcion}}</p></div>
                    </section>
                </div>
              </div>
        </div>
    </div>
</div>
@include('common.modalView.modalFooter')
