<header class="header-user c-navigation " >  
<div class="row g-0">
	<nav class="navbar navbar-expand-lg  " >

		<div class="col-lg-5  ">
			<div class="title_module px-3">
				@yield('title_module','')
			</div>
			<div class="subtitle_module px-3">
				@yield('subtitle_module','')
			</div>
		</div>

  		<div class="col-lg-2 text-center ">
		  	<?php 
				$dateObj   = DateTime::createFromFormat('!m',  date('m'));
				$monthName = $dateObj->format('F');
			?>			
			<div class="time-hours text-center ">
				<div id='hora' class="hour"></div><div>:</div><div id='minuto' class="minutes"></div><div id='segundo' class="seconds"></div>
			</div>
			<div class="datetime_name text-center "> <?php echo $monthName." ".date('d').", ".date('Y') ?> </div>
  		</div>

		<div class="col-lg-3 text-center "> {{ Auth::User()->name_role }} </div>

  		<div class="col-lg-2 ">
  		<div class="collapse navbar-collapse  " id="navbarNavDarkDropdown">
	      <ul class="navbar-nav">
	        <li class="nav-item dropdown ">
				<a class="nav-link dropdown-toggle text-dark user-login-menu" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					@if(isset(Auth::User()->name))
					{{auth::User()->name}}
					@else
						< username >
					@endif
				</a>
	          	<ul class="dropdown-menu dropdown-menu-end dropdown-menu-white text-dark border-0 rounded-0 " aria-labelledby="navbarDarkDropdownMenuLink px-2" style="font-size:12px;border-radius: 6px;box-shadow: 0 0 17px 0 rgba(23,50,68,.17);border-radius: 6px;z-index: 1051; border:1px solid black ">
		          	<li class="px-3 px-4 fs-6 ln-1 " style="color:#000"> 		          		
		          		<div style="max-width:270px; padding-left: 10px;font-size: 14px;">
		          			<div class="fw-bold text-truncate px-2" >
		          				{{ auth::User()->name }} {{ auth::User()->surname }}
		          			</div>
		          			@if(isset( Auth::User()->email ))
		          			<span class=" px-2 " style="font-size:12px;">{{ Auth::User()->email }}</span> @endif
		          		</div>
		          	</li>
		          	<li class=""><hr class="dropdown-divider"></li>
		          	<div class="items-options" > 
						<li class="p-2 "><a class="border-dark i-menu p-2 " href="{{route('users.edit',Auth::User()->uuid)}}"><i class="icofont-gear"></i> &nbsp; Mi Cuenta</a></li>
						<li class="p-2 "><a class="border-dark i-menu p-2 " href="{{route('security',Auth::User()->uuid)}}"><i class="icofont-key"></i> &nbsp; Contrase&ntilde;a</a></li>
						<li class="p-2 "><a class="border-dark i-menu p-2 " href="{{route('auth.logout')}}"><i class="icofont-logout"></i> &nbsp; Cerrar sesi&oacute;n</a></li>
					</div>

	        	</ul>
	        </li>
	      </ul>
	    </div>
  
  		</div>
 
	</nav>
	</div>	
<script>
	Reloj();
    function Reloj() {
        var tiempo = new Date();
        var hora = tiempo.getHours();
        var minuto = tiempo.getMinutes();
        var segundo = tiempo.getSeconds();

        document.getElementById('hora').innerHTML = hora;
        document.getElementById('minuto').innerHTML = minuto;
        document.getElementById('segundo').innerHTML = segundo;
        setTimeout('Reloj()', 1000);
        str_hora = new String(hora);
        if (str_hora.length == 1) {
            document.getElementById('hora').innerHTML = '0' + hora;
        }
        str_minuto = new String(minuto);
        if (str_minuto.length == 1) {
            document.getElementById('minuto').innerHTML = '0' + minuto;
        }
        str_segundo = new String(segundo);
        if (str_segundo.length == 1) {
            document.getElementById('segundo').innerHTML = '0' + segundo;
        }
    } 
</script>
</header> 