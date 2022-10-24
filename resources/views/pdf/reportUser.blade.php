<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}"> --}}

    <title>Document</title>
</head>
<body>
    {{-- @foreach ($data as $user)
        <h2 class="bg-primary">{{$user->name}}</h2>
    @endforeach --}}
    {{-- {{$prueba}} --}}
    <section class="">
        <div class="row">
            @foreach ($data as $info)
                <div class="col-12">
                    <strong>Nombre personal: </strong><span>{{$info->personals->user->name}}</span>
                </div>
                <div class="col-4">
                    <strong>Email: </strong><span>{{$info->personals->user->email}}</span>
                </div>
                <div class="col-4">
                    <strong>Telefono: </strong><span>{{$info->personals->user->phone}}</span>
                </div>
                <div class="col-4">
                    <strong>Permisos: </strong><span>{{$info->personals->user->type}}</span>
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
        <h3>Datos de informe</h3>
    </div>
    <section>
        <div class="row">
            <div class="col-6 p-2">
                <strong>fecha: </strong><span>{{$info->fecha}}</span>
            </div>
            <div class="col-6 p-2">
                <strong>Hora: </strong><span>{{$info->hora}}</span>
            </div>
            <div class="col-12">
                <strong>Resumen: </strong><p>{{$info->resumen}}</p>
            </div>
            <div class="col-12">
                <strong>Procedimiento: </strong><p>{{$info->procedimiento}}</p>
            </div>
            <div class="col-12">
                <strong>Observacion: </strong><p>{{$info->observacion}}</p>
            </div>
        </div>
    </section>
</body>
</html>