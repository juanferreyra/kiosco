$(document).ready(function() {

	$("#btnVerProducto").click(function(){
      $("#contenedor").load("vistas/productos/");      
    });


  $("#btnAgregarProducto").click(function(){
      $("#dialogAgregarProducto").load("../presentacion/includes/forms/form_agregarProducto.php");
      $( "#dialog:ui-dialog" ).dialog( "destroy" );
      $( "#dialogAgregarProducto" ).css('visibility',"visible");
      $( "#dialogAgregarProducto" ).dialog({
        title:"Agregar Producto",
        buttons: {
          "Guardar": function() {
            $.ajax({
              data: $('#agregarprodu').serialize(),
              type: "POST",
              dataType: "json",
              url: "../presentacion/includes/ajaxFunctions/AgregarProductos.php",
              success: function(data)
              {
                if(data.result)
                {
                  alert("Produto Agregado.");
                  $('#agregarprodu').get(0).reset();
                  $("#jqprodu").trigger("reloadGrid"); 
                }
                else
                {
                  if($('#habilitado').val()=='false')
                  {
                    alert('presione cancelar para salir');
                  }
                  else
                  {
                    alert("Producto no agregado");
                  }
                }
              }
            });
          },
          "Cerrar": function() {
            $(this).dialog("close");
          }
        }
      });       
    });

 $("#btnAgregarRubro").click(function(){
      $("#dialogAgregarRubro").load("../presentacion/includes/forms/form_agregarRubro.php");
      $( "#dialog:ui-dialog" ).dialog( "destroy" );
      $( "#dialogAgregarRubro" ).css('visibility',"visible");
      $( "#dialogAgregarRubro" ).dialog({
        width:500,
        high:1000,
        title:"Agregar Rubro",
        buttons: {
          "Guardar": function() {
            descripcionrubro=$('#descripcionrubro').val();
            $.ajax({
              data: "descripcion="+descripcionrubro,
              type: "POST",
              dataType: "json",
              url: "../presentacion/includes/ajaxFunctions/AgregarRubros.php",
              success: function(data)
              {
                if(data.result)
                {
                  alert("Rubro Agregado.");
                  $('#descripcionrubro').val('');
                  $("#jqrubro").trigger("reloadGrid"); 
                }
                else
                {
                  if($('#habilitado').val()=='false')
                  {
                    alert('presione cancelar para salir');
                  }
                  else
                  {
                    alert("Rubro no agregado");
                  }
                }
              }
            });
          },
          "Cerrar": function() {
            $(this).dialog("close");
          }
        }
      });       
    });


    $("#btnVerRubro").click(function(){
      $("#contenedor").load("vistas/rubros/");       
    });

    $("#btnIngresarCompra").click(function(){
      $( "#dialog:ui-dialog" ).dialog( "destroy" );
      $( "#dialogIngresarCompra" ).css('visibility',"visible");
      $( "#dialogIngresarCompra" ).dialog({
        // modal: true,
        width:500,
    high:1000,
        title:"Ingresar Compra",
        buttons: {
          "Si": function() {
            $.ajax({
              //dataType: "json",
              //url: "aplicarMedicacion/includes/ajaxFunctions/jsonCancelarEgresoDeProductos.php",
              success: function(data){
                if(data.result){
                }
                else
                {
                  alert(data.message);
                }
              }
            });
          },
          "No": function() {
            $(this).dialog("close");
          }
        }
      });       
    });

    $("#btnVerFacturas").click(function(){
      $( "#dialog:ui-dialog" ).dialog( "destroy" );
      $( "#dialogVerFacturas" ).css('visibility',"visible");
      $( "#dialogVerFacturas" ).dialog({
        // modal: true,
        width:500,
    high:1000,
        title:"Var Facturas",
        buttons: {
          "Si": function() {
            $.ajax({
              //dataType: "json",
              //url: "aplicarMedicacion/includes/ajaxFunctions/jsonCancelarEgresoDeProductos.php",
              success: function(data){
                if(data.result){
                }
                else
                {
                  alert(data.message);
                }
              }
            });
          },
          "No": function() {
            $(this).dialog("close");
          }
        }
      });       
    });

    $("#btnIngresarVenta").click(function(){
      $( "#dialog:ui-dialog" ).dialog( "destroy" );
      $( "#dialogIngresarVenta" ).css('visibility',"visible");
      $( "#dialogIngresarVenta" ).dialog({
        // modal: true,
        width:500,
    high:1000,
        title:"Ingresar Venta",
        buttons: {
          "Si": function() {
            $.ajax({
              //dataType: "json",
              //url: "aplicarMedicacion/includes/ajaxFunctions/jsonCancelarEgresoDeProductos.php",
              success: function(data){
                if(data.result){
                }
                else
                {
                  alert(data.message);
                }
              }
            });
          },
          "No": function() {
            $(this).dialog("close");
          }
        }
      });       
    });

    $("#btnVentasEnCaja").click(function(){
      $( "#dialog:ui-dialog" ).dialog( "destroy" );
      $( "#dialogVentasEnCaja" ).css('visibility',"visible");
      $( "#dialogVentasEnCaja" ).dialog({
        // modal: true,
        width:500,
    high:1000,
        title:"Ventas en caja actual",
        buttons: {
          "Si": function() {
            $.ajax({
              //dataType: "json",
              //url: "aplicarMedicacion/includes/ajaxFunctions/jsonCancelarEgresoDeProductos.php",
              success: function(data){
                if(data.result){
                }
                else
                {
                  alert(data.message);
                }
              }
            });
          },
          "No": function() {
            $(this).dialog("close");
          }
        }
      });       
    });

    $("#btnProductoMasVendido").click(function(){
      $( "#dialog:ui-dialog" ).dialog( "destroy" );
      $( "#dialogProductoMasVendido" ).css('visibility',"visible");
      $( "#dialogProductoMasVendido" ).dialog({
        // modal: true,
        width:500,
    high:1000,
        title:"Productos mas vendidos",
        buttons: {
          "Si": function() {
            $.ajax({
              //dataType: "json",
              //url: "aplicarMedicacion/includes/ajaxFunctions/jsonCancelarEgresoDeProductos.php",
              success: function(data){
                if(data.result){
                }
                else
                {
                  alert(data.message);
                }
              }
            });
          },
          "No": function() {
            $(this).dialog("close");
          }
        }
      });       
    });

    $("#btnCaja").click(function(){
      $( "#dialog:ui-dialog" ).dialog( "destroy" );
      $( "#dialogCaja" ).css('visibility',"visible");
      $( "#dialogCaja" ).dialog({
        // modal: true,
        width:500,
    high:1000,
        title:"Caja",
        buttons: {
          "Si": function() {
            $.ajax({
              //dataType: "json",
              //url: "aplicarMedicacion/includes/ajaxFunctions/jsonCancelarEgresoDeProductos.php",
              success: function(data){
                if(data.result){
                }
                else
                {
                  alert(data.message);
                }
              }
            });
          },
          "No": function() {
            $(this).dialog("close");
          }
        }
      });       
    });

    

    

});