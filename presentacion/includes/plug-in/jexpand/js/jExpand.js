(function($){
    $.fn.jExpand = function(){
        var element = this;

        $(element).find("tr:odd").addClass("odd");
        $(element).find("tr:not(.odd)").hide();
        $(element).find("tr:first-child").show();
        
        $(element).find("tr.odd").click(function(){
            $(this).next("tr").toggle();
            //$(this).find(".arrow").toggleClass("up");
        });
        
        
        /*$(element).find("tr.odd").each(function() {
        	fila = this;
        	$("td.clk",$(fila)).click(function(){
        		alert('hoa');
        		$(fila).next("tr").toggle();
        	});*/
        	
        	/*$(fila).find(".clk").click(function(){
        		$(fila).next("tr").toggle();
        	});*/
            
      //  });
        
    }    
})(jQuery); 