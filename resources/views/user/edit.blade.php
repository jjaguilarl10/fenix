@extends('layouts.theme.template')
@section('title', 'Editar Usuario')
@section('title_module','Usuarios')
@section('subtitle_module','Ediat Usuario ')

@section('Css_')
@endsection
@section('Js_')
<script>
    $(document).ready(function() {
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });
    });
</script>
@endsection 

@section('jContent')
    <div class="row g-1 mt-1  ">
        <div class="col-lg-6 p-2 px-3 ">
            <a href="{{route('dash.index')}}">Inicio</a> - 
            <a href="{{route('users.index')}}">Listar Usuarios</a> - {{ $response['data']->name ? $response['data']->name .' '.  $response['data']->surname : '' }}
        </div>
        <div class="col-lg-6 p-2 px-3 text-end  ">
        </div>
    </div>
    
    <div clatss="row g-1 mt-2 mx-2 border  ">
        <div class="col-lg-6 bg-white p-3 ">
            @if(isset($response['data']))
                <div class="col-lg-12">
                    @if(Session::get('message'))
                        <div class="alert alert-success" id="success-alert">
                            {{Session::get('message')}}
                        </div>
                    @endif
                </div>
                <form id="editForm" action="{{ route('users.update', $response['data']->uuid ) }}" method="post" enctype="multipart/form-data" class="row g-2 bg-white  " >
                    @csrf
                    <div class="col-lg-6">
                        <label for="identification" class="form-label">Identificación</label>
                        <input type="text" class="form-control" id="identification" name="identification"  value="{{ $response['data']->identification }}"  placeholder="Identification" required >
                    </div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" value="{{ $response['data']->name }}" id="name" name="name" placeholder="Nombre"  required >
                    </div>
                    <div class="col-lg-6">
                        <label for="surname" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" value="{{ $response['data']->surname }}" id="surname" name="surname"  placeholder="Apellidos"  required >
                    </div>

                    <div class="col-lg-8">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" class="form-control" value="{{ $response['data']->address }}" id="address"  name="address" placeholder="Direccion">
                    </div>
                    <div class="col-lg-4">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="text" class="form-control" value="{{ $response['data']->cellphone }}" id="address" name="cellphone" placeholder="Celular">
                    </div>

                    <div class="col-lg-12">
                        <label for="email" class="form-label">Correo Electronico</label>
                        <input type="email" class="form-control" value="{{ $response['data']->email }}" id="email" name="email" placeholder="Correo Electronico"  required >
                    </div>

                    <div class="col-lg-4">
                        <label for="Gener" class="form-label">Genero </label>
                        <select id="Gener" name="gener" class="form-select">
                            <option selected>Seleccionar Gener</option>
                            @foreach($response['gener'] as $g)
                                <option value="{{ $g->id }}" @if($g->id == $response['data']->gener_id ) selected @endif  >{{ $g->name_gener }}</option>
                            @endforeach 
                        </select>
                    </div>

                    @if(Auth::User()->role_id == 1)

                        <div class="col-lg-4">
                            <label for="Role" class="form-label">Rol </label>
                            <select id="Role" name="role" class="form-select">
                                <option selected>Seleccionar Rol</option>
                                @foreach($response['role'] as $r)
                                    <option value="{{ $r->id }}" @if($r->id == $response['data']->role_id ) selected @endif >{{ $r->name_role }}</option>
                                @endforeach 
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="State" class="form-label">Estado</label>
                            <select id="State" name="state" class="form-select">
                                <option selected>Seleccionar Estado</option>
                                @foreach($response['state'] as $s)
                                    <option value="{{ $s->id }}" @if($s->id == $response['data']->status_id)selected @endif >{{ $s->name_state }}</option>
                                @endforeach 
                            </select>
                        </div>
                    @endif

                    <div class="col-12 pt-5 text-end ">
                        <button id="save_form" type="submit" class="btn btn-primary">Actualizar Información</button>
                    </div>

                </form>
            @else
            @endif
        </div>
    </div>
@endsection