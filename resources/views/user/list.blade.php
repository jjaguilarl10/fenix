@extends('layouts.theme.template')
@section('title', 'Users')
@section('title_module','LIstado Usuarios')
@section('subtitle_module','Usuarios Dispobibles')

@section('Css_')
@endsection
@section('Js_')
@endsection 

@section('jContent')
    <div class="row g-1 mt-1  ">
        <div class="col-lg-6 p-2 px-3 ">
            <a href="{{route('dash.index')}}">Inicio</a> - listar Usuarios
        </div>
        <div class="col-lg-6 p-2 px-3 text-end  ">
        <a href="{{ route('users.add') }}" class="btn btn-primary "> + Nuevo Usuario</a>
        </div>
    </div>
    <div class="mx-2">
        @if(isset($message_error))
        {{$message_error}}
        @endif
    </div>
    <div class="row g-1 mt-2 bg-white mx-2">
        <div class="text-end p-2 px-4 " style="font-size:11px">
            Total Usuario {{ sizeof($response['data']) ?  sizeof($response['data']) : 0}}
        </div>
        <div class="jtable pb-4 px-3">
            <table>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Identificaci&oacute;n</th>
                        <th>Nombre usuario</th>
                        <th>Apellidos</th>
                        <th>Dirección</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>Genero</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($response['data'])  && sizeof($response['data']))
                        @foreach($response['data'] as $item)
                        <tr>
                            <td></td>
                            <td>{{ $item->identification }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->surname }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->cellphone }}</td>
                            <td>
                                <div>{{ $item->email }}</div>
                            </td>
                            <td>{{ $item->gener->name_gener }}</td>
                            <td>{{ $item->role->name_role }}</td>
                            <td >{{ $item->state->name_state }}</td>
                            <td > <a href="{{ route('users.edit',$item->uuid)}}">Editar </a></td>
                            <td class="text-danger" ><div class="_jTrashAccount"  data-user='{{ $item->name }} {{ $item->surname }}' data-uuid='{{ $item->uuid }}'>Eliminar</div></td>
                        </tr>
                        @endforeach 
                    
                    @else 
                        <tr>
                            <td colspan="13">
                                <div class="p-5">
                                <div class="fw-bold fs-6">Sin resultados encontrados</div>
                                <div class="">Intente realizar la busqueda con nuevos parametros de busqueda</div>
                                </div>
                            </td>
                        </tr> 
                    @endif
                </tbody>  
            </table>
        </div>
    </div>
    
<script> 
    $("._jTrashAccount").click(function(){ 
        let ctrash = confirm("Confirmar que desea eliminar la cuenta de usuario "+$("._jTrashAccount").data('user'));
        if (ctrash == true) {
            let Protocol_ = window.location.protocol,
            path_ = Protocol_ +"//"+ window.location.hostname +":"+ window.location.port+"/";

            $.ajax({
                type: 'POST',
                url:path_+'intra/users/trash',
                data:{'data_uuid':$("._jTrashAccount").data('uuid')},
                cache: false,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success:function(response){ 
                    
                    if(response['status'] === 200 ){
                    	location.reload()
                    }else{
                        alert(response['message']);
                    } 
                },error: function(xhr, type, exception, thrownError){
                    error_cacth( xhr.status , path_ );
                } 
            }); 
           
        } 
    }); 
</script>
@endsection
