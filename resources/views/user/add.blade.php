@extends('layouts.theme.template')
@section('title', 'Crear Usuario')
@section('title_module','Usuarios')
@section('subtitle_module','Crear Nuevo Usuario ')

@section('Css_')
@endsection
@section('Js_')
@endsection 

@section('jContent')
    <div class="row g-1 mt-1  ">
        <div class="col-lg-6 p-2 px-3 ">
            <a href="{{route('dash.index')}}">Inicio</a> - 
            <a href="{{route('users.index')}}">LIstar Usuarios</a> - 
            crear usuario - 
        </div>
        <div class="col-lg-6 p-2 px-3 text-end  ">
        </div>
    </div>

    <div class="row g-1 mt-2 mx-2 border  ">
        <div class="col-lg-6 bg-white p-3 ">
            
            <form id="editForm" action="{{ route('users.save') }}" method="post" enctype="multipart/form-data" class="row g-2 bg-white  " >
                @csrf
                <div class="col-lg-6">
                    <label for="identification" class="form-label">Identificación</label>
                    <input type="text" class="form-control" id="identification" name="identification"  value=""  placeholder="Identification" required >
                </div>
                <div class="col-lg-6"></div>
                <div class="col-lg-6">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" value="" id="name" name="name" placeholder="Nombre"  required >
                </div>
                <div class="col-lg-6">
                    <label for="surname" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" value="" id="surname" name="surname"  placeholder="Apellidos"  required >
                </div>

                <div class="col-lg-8">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" class="form-control" value="" id="address"  name="address" placeholder="Direccion">
                </div>
                <div class="col-lg-4">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" class="form-control" value="" id="address" name="cellphone" placeholder="Celular">
                </div>

                <div class="col-lg-12">
                    <label for="email" class="form-label">Correo Electronico</label>
                    <input type="email" class="form-control" value="" id="email" name="email" placeholder="Correo Electronico"  required >
                </div>

                <div class="col-lg-4">
                    <label for="Gener" class="form-label">Genero </label>
                    <select id="Gener" name="gener" class="form-select">
                        <option selected>Seleccionar Gener</option>
                        @foreach($response['gener'] as $g)
                            <option value="{{ $g->id }}" >{{ $g->name_gener }}</option>
                        @endforeach 
                    </select>
                </div>

                <div class="col-lg-4">
                    <label for="Role" class="form-label">Rol </label>
                    <select id="Role" name="role" class="form-select">
                        <option selected>Seleccionar Rol</option>
                        @foreach($response['role'] as $r)
                            <option value="{{ $r->id }}" >{{ $r->name_role }}</option>
                        @endforeach 
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="State" class="form-label">Estado</label>
                    <select id="State" name="state" class="form-select">
                        <option selected>Seleccionar Estado</option>
                        @foreach($response['state'] as $s)
                            <option value="{{ $s->id }}">{{ $s->name_state }}</option>
                        @endforeach 
                    </select>
                </div>

                <div class="col-12 pt-5 text-end ">
                    <button id="save_form" type="submit" class="btn btn-primary">Agregar Usuario</button>
                </div>

            </form>
            
        </div>
    </div>
@endsection