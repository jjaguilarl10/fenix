@extends('layouts.theme.template')
@section('title', 'Seguridad')
@section('title_module','Seguridad')
@section('subtitle_module','Actualizar datos')

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
            <a href="{{route('users.index')}}">Seguridad</a> - {{ $response['info']->name ? $response['info']->name .' '.  $response['info']->surname : '' }}
        </div>
        <div class="col-lg-6 p-2 px-3 text-end  ">
        </div>
    </div>

    <div class="row g-1 mt-2 mx-2 border  ">
        <div class="col-lg-6 bg-white p-3 ">
            <div class="col-lg-12">
                @if(Session::get('message_security'))
                    <div class="alert alert-success" id="success-alert">
                        {{Session::get('message_security')}}
                    </div>
                @endif
            </div>
            @if(isset($response['info']))
                <form id="editForm" action="{{ route('security.save', $response['info']->uuid ) }}" method="post" enctype="multipart/form-data" class="row g-2 bg-white  " >
                    @csrf
                    <div class="col-lg-6">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password"  value=""  placeholder="Password" required minlength="6" >
                    </div>
                    <div class="col-lg-6">
                        <label for="password2" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_2" name="password_2"  value=""  placeholder="Confirmar Password" required minlength="6">
                    </div>

                    <div class="col-12 pt-5 text-end ">
                        <button id="save_form" type="submit" class="btn btn-primary">Actualizar</button>
                    </div>

                </form>
            @else
            @endif
        </div>
    </div>
@endsection