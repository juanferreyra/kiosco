<?php
include_once '../../../../namespacesAdress.php';
include_once negocio.'kioscoDatabaseLinker.class.php';

$dbKiosco = new KioscoDatabaseLinker();

$acceso = $dbKiosco->traerPermisos();


?>
<script type="text/javascript">

	function validar()
	{
		if(document.forms["agregarUsuarioform"]["nombre"].value=="" )
		{
			alert("Debe Ingresar el nombre completo");
			return false;
		}
		if(document.forms["agregarUsuarioform"]["detalle"].value=="" )
		{
			alert("Debe Ingresar el nombre de usuario");
			return false;
		}
		if(document.forms["agregarUsuarioform"]["contrasena"].value=="" )
		{
			alert("Debe Ingresar la contraseña");
			return false;
		}
		if(document.forms["agregarUsuarioform"]["contra2"].value=="" )
		{
			alert("Debe Reingresar la contraseña");
			return false;
		}
		
		var acceso= document.getElementsByName('accesos[]');
		var hasChecked=false;
		for(var i=0; i< acceso.length; i++)
		{
			if(acceso[i].checked)
			{
				hasChecked=true;
				break;
			}
		}
		if(hasChecked==false)
		{
			alert("Debe ingresar al menos una pantalla de acceso");
			return false;
		}

		return true;
	}

	$("#guardarUser").click(function(event){
 		event.preventDefault();
 		if(validar())
 		{
            $.ajax({
              	data: $('#agregarUsuarioform').serialize(),
              	type: "POST",
              	dataType: "json",
              	url: "includes/ajaxFunctions/AgregarUsuarios.php",
             	success: function(data)
              	{
            		alert(data.message);
            		if(data.ret)
            		{
            			$('#agregarUsuarioform').get(0).reset();	
            		}
              	}
            });
        }

    }); 

</script>

<div class="post" id="wrapper">
	
	<div id="page">

		<form id="agregarUsuarioform">

			<a>Nombre Completo: </a><input name="nombre" placeholder="Apellido y nombre"></br>

			<a>Usuario de usuario: </a><input name="detalle" placeholder="Identificacion de Usuario"></br>

			<a>Contras&ntilde;a: </a><input type="password" name="contrasena" placeholder="Password"></br>

			<a>Vuelva a ingresar: </a><input type="password" name="contra2" placeholder="Reingresar"></br>

			<a>Este Usuario puede tener acceso a ...</a></br>

			<?php
			for ($i=0; $i < count($acceso); $i++) 
			 { 
				echo "<input type='checkbox' name='accesos[]' value=".$acceso[$i]['idpermiso'].">".$acceso[$i]['detalle']."</br>";
			}
			?>

			<input class="button" type="submit" id="guardarUser" value="Guardar" >

		</form>

	</div>

</div>
 
