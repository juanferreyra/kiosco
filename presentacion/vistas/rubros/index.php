
<header class="codrops-header">
	<h1>Ver rubros</h1>
</header>

<div id="dialogVerRubro" >

	<div align="center"; ><table id="jqrubro" ></table></div>

</div>

<script type="text/javascript">

    $("#jqrubro").jqGrid(
    { 
      url:'includes/ajaxFunctions/MostrarRubros.php', 
      mtype: "POST",
      datatype: "json", 
      colNames:['Nombre',''], 
      colModel:[ 
        {name:'nombre', index:'nombre',width:'200%',align:"left",fixed:true},
        {name:'myac', width:50, fixed:true, sortable:false, resize:false, formatter:'actions',search:false, formatoptions:{keys:true,"delbutton":true,"editbutton":false}}
        ], 
       rowNum:true, 
       viewrecords: true,
       altRows : true,
       editurl :'includes/ajaxFunctions/QuitarRubros.php',
       width: '100%',
       height: '100%'
    });

</script>