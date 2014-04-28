$(document).ready(function() {

	$("#btnVerProducto").click(function(){
      $( "#dialog:ui-dialog" ).dialog( "destroy" );
      $( "#dialogVerProducto" ).css('visibility',"visible");
      $( "#dialogVerProducto" ).dialog({
        // modal: true,
        width:500,
		high:1000,
        title:"Ver Articulos",
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

  $("#btnAgregarProducto").click(function(){
      $( "#dialog:ui-dialog" ).dialog( "destroy" );
      $( "#dialogAgregarProducto" ).css('visibility',"visible");
      $( "#dialogAgregarProducto" ).dialog({
        // modal: true,
        width:500,
    high:1000,
        title:"Agregar Producto",
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