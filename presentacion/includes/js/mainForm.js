$(document).ready(function() {

	$("#btnVerProducto").click(function(){
      $( "#dialog:ui-dialog" ).dialog( "destroy" );
      $( "#dialogVerProducto" ).css('visibility',"visible");
      $( "#dialogVerProducto" ).dialog({
        // modal: true,
        width:'70%',
		    height:500,
        title:"Ver Articulos",
        buttons: {
          "Cerrar": function() {
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
            codigoprodu=$('#codigoprodu').val();
            rubroprodu=$('#rubroprodu').val();
            stockminprodu=$('#stockminprodu').val();
            preciocompraprodu=$('#preciocompraprodu').val();
            precioventaprodu=$('#precioventaprodu').val();
            descripcionprodu=$('#descripcionprodu').val();
            $.ajax({
              data: "codigo="+codigoprodu+"&rubro="+rubroprodu+"&stockminimo="+stockminprodu+"&preciocompra="+preciocompraprodu+"&precioventa="+precioventaprodu+"&descripcion="+descripcionprodu,
              type: "POST",
              dataType: "json",
              url: "../presentacion/includes/ajaxFunctions/AgregarProductos.php",
              success: function(data)
              {
                if(data.result)
                {
                  alert("Produto Agregado.");
                  $('#codigoprodu').val('');
                  $('#rubroprodu').val('');
                  $('#stockminprodu').val('');
                  $('#preciocompraprodu').val('');
                  $('#precioventaprodu').val('');
                  $('#descripcionprodu').val('');
                 $("#jqprodu").trigger("reloadGrid"); 
                }
                else
                {
                  alert("Producto no agregado");
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

    $("#jqprodu").jqGrid(
    { 

      url:'includes/ajaxFunctions/MostrarProductos.php', 
      mtype: "POST",
      datatype: "json", 
      colNames:['Codigo', 'Nombre','Precio Venta', 'Precio Compra' ,'Rubro','Stock Minimo',''], 
      colModel:[ 
        {name:'codigo', index:'codigo',width:'120%',align:"left",fixed:true},
        {name:'nombre', index:'nombre',width:'200%',align:"left",fixed:true},
        {name:'precioVenta', index:'precioVenta',width:'100%',align:"center",fixed:true},
        {name:'precioCompra', index:'precioCompra',width:'100%',align:"center",fixed:true},
        {name:'rubro', index:'rubro',width:'100%',align:"left",fixed:true},
        {name:'stock_minimo', index:'stock_minimo',width:'100%',align:"center",fixed:true},
        {name:'myac', width:50, fixed:true, sortable:false, resize:false, formatter:'actions',search:false, formatoptions:{keys:true,"delbutton":true,"editbutton":false}}
        ], 
       rowNum:true, 
       viewrecords: true,
       altRows : true,
       editurl :'includes/ajaxFunctions/QuitarProductos.php',
       width: '100%',
       height: '100%'
    }); 

    

});