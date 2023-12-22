@extends('layouts.auth')
@section('content')  
    <div class="row m-0 g-1">
        <div class="col-12 text-center pt-3 mt-5">
            <div class="fs-2" style="font-weight:900">Iniciar Sesión </div> 
            <div class="text-center">Prueba Técnica Fenix</div>
        </div>
        <div class="col-12 mt-1 mb-1">
            <div class="row g-1 justify-content-md-center pt-3">            
                <div class="col-12 col-sm-4 col-lg-4 p-4 px-5 ">
                    <form action="{{route('auth.singin.post')}}" method="post" id="loginForm" class="needs-validation" novalidate> 
                    {{ csrf_field() }} 
                    <div class="form-floating mb-3 ">
                        <input type="text" class="form-control border-0" id="username" name="username"  autocomplete="off" data-field="username"  placeholder="" required>
                        <label for="floatingInput">Identificación | Username </label>
                        <div class="invalid-feedback"> Ingresar usuario</div>
                    </div>
                    <div class="form-floating ">
                        <input type="password" class="form-control border-0 fw-bold" id="password" name="password" data-field="password" autocomplete="off" placeholder="Password" required >
                        <label for="floatingPassword">Contraseña</label>
                        <div class="invalid-feedback"> Ingresar contraseña</div>
                    </div>

                    <div class="p-3 text-end"><a href="#" class="text-decoration-none" >¿Olvidaste tu email o contraseña?</a></div>

                    <div class="d-grid p-3 text-center">
                        <button id="sLoginAccess" name="save_information" type="submit" class="btn btn-primary" >Iniciar Sesión</button>
                    </div>
                    </form> 

                </div>
            </div>
        </div>

    </div>
    <script>
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection