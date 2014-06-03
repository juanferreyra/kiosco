<?php
include_once '../../../../namespacesAdress.php';
include_once negocio.'kioscoDatabaseLinker.class.php';

$dbKiosco = new KioscoDatabaseLinker();

$acceso = $dbKiosco->traerPermisos();


?>
<script type="text/javascript">

	function validar()
	{
		if(document.forms["eliminarUsuarioform"]["usuario"].value=="" )
		{
			alert("Debe Ingresar el Usuario");
			return false;
		}
		
		return true;
	}

	$("#eliminarUser").click(function(event){
 		event.preventDefault();
 		if(validar())
 		{
            $.ajax({
              	data: $('#eliminarUsuarioform').serialize(),
              	type: "POST",
              	dataType: "json",
              	url: "includes/ajaxFunctions/EliminarUsuarios.php",
             	success: function(data)
              	{
            		alert(data.message);
            		if(data.ret)
            		{
            			$('#eliminarUsuarioform').get(0).reset();	
            		}
              	}
            });
        }

    }); 

</script>

<div class="post" id="wrapper">
	
	<div id="page">

		<form id="eliminarUsuarioform">

			<a>Nombre Completo: </a><input name="usuario" placeholder="Usuario"></br>


			<input class="button" type="submit" id="eliminarUser" value="Destruir" >

		</form>

	</div>

</div>
 
