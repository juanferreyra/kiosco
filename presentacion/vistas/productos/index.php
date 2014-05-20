
<header class="codrops-header">
	<h1>Ver productos</h1>
</header>
<div id="dialogVerProducto">

	<div align="center"; ><table id="jqprodu" ></table></div>

</div>


<script type="text/javascript">
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

</script>