<style>
.catalog-top-filters-fixed {
    background: none repeat scroll 0 0 #28ca70;
    bottom: 0;
    height: 70px;
    left: 0;
    position: fixed;
    width: 100%;
    z-index: 99;
}
.catalog-top-filters-fixed p {
    color: #fff;
    float: left;
    font-size: 10px;
    font-weight: bold;
    line-height: 45px;
    margin-right: 3px;
    padding-top: 6px;
}
.content-limits {
    margin: 0 auto;
    width: 99%;
    font-size: 17px;
}
.catalog-top-filters-fixed ul.catalog-top-filters {
    float: left;
    width: 98%;
}
.clearfix:after, .container_12:after {
    clear: both;
}
.clearfix:after, li:after {
    clear: both;
    content: ".";
    display: block;
    height: 0;
    visibility: hidden;
}
ul.catalog-top-filters {
    display: table;
    margin: 10px 0;
    width: 100%;
}
ul.catalog-top-filters > li {
    float: left;
    padding: 0;
    position: relative;
    width: 14.2%;
}
.clearfix, li {
    display: block;
}
ul.catalog-top-filters > li a.toggle-filter {
    background: none repeat scroll 0 0 #fff;
    border: 1px solid #ddd;
    color: #666;
    cursor: pointer;
    display: block;
    font-family: 'Open Sans Bold';
    line-height: 29px;
    margin: 0 3px;
    padding-left: 10px;
    height: 62px;
}
ul.catalog-top-filters > li a.toggle-filter i.genericon-expand {
    float: right;
    font-size: 20px;
    font-weight: bold;
    height: 20px;
    margin: 4px 0;
    width: 20px;
}
ul.catalog-top-filters > li a.toggle-filter {
    background: none repeat scroll 0 0 #fff;
    border: 1px solid #ddd;
    color: #666;
    cursor: pointer;
    display: block;
    font-family: 'Open Sans Bold';
    line-height: 29px;
    margin: 0 3px;
    padding-left: 10px;
    height: 62px;
}
.genericon-expand:before {
    content: '\f431';
}
ul.catalog-top-filters > li a.toggle-filter i.genericon-expand {
    float: right;
    font-size: 14px;
    font-weight: bold;
    height: 20px;
    margin: 4px 0;
    width: 20px;
}
ul.catalog-top-filters li .filter-menu {
    background: none repeat scroll 0 0 #ffffff;
    border: 1px solid #ddd;
    display: none;
    left: 3px;
    padding: 10px;
    position: absolute;
    bottom: 71px;
    width: 540px;
    z-index: 99;
    color: inherit;
}
ul.catalog-top-filters li .filter-menu .filter-header {
    color: #666;
    font-size: 13px;
    margin-bottom: 10px;
    position: relative;
}
ul.catalog-top-filters li .filter-menu .filter-body {
    margin-bottom: 10px;
}
div.catalog-top-filters-fixed ul {
    list-style: none outside none;
}
ul.catalog-top-filters li .filter-menu ul.rows {
    color: #666;
    display: table;
    font-size: 12px;
    width: 100%;
}
ul.catalog-top-filters li .filter-menu ul.rows label.column {
    display: table-cell;
    width: 33%;
}
ul.catalog-top-filters li .filter-menu ul.rows label {
    cursor: pointer;
}

ul.catalog-top-filters li .filter-menu ul.rows li {
    display: table-row;
}
#estructureFilters { 
	left: -380px;
}
#roscasFilters {
 	left: -377px;
}
#standardFilters {
	left: -7px;
}
</style>
<div class="catalog-top-filters-fixed" style="display: block;">
    <div class="content-limits">
	<ul class="catalog-top-filters clearfix">
        	<li class="category">
                	<a class="toggle-filter" href="javascript:void(17)" onclick="showFilters('category')" href="javascript:void(0)">Categoria<!--<i class="genericon genericon-expand"></i>--></a>
			<div id="categoryFilters" data-link-replace="--brand--" data-link-set="/categoria/--brand--/" data-link-unset="/categoria/" class="filter-menu">
    				<div class="filter-header">
                    			<strong>Filtrar por:</strong>
            			</div>
    				<div class="filter-body">
        			    <ul class="rows">
            				<li>
               				    <label class="column">
                				<!--<input type="checkbox" value="parafusos" name="facet_brand[]" />Parafusos-->
						<a href="/categoria/parafusos/1.html#work">Parafusos</a>
					    </label>
                        		    <label class="column">
                			    	<!--<input type="checkbox" value="arruela" name="facet_brand[]" />Arruela-->
						<a href="/categoria/arruela/1.html#work">Arruela</a>
					    </label>
                        		    <label class="column">
                				<!--<input type="checkbox" value="porcas" name="facet_brand[]">Porcas-->
						<a href="/categoria/porcas/1.html#work">Porcas</a>
					    </label>
				        </li>
            				<li>
	    				    <label class="column">
                				<!--<input type="checkbox" value="chumbadores" name="facet_brand[]">Chumbadores Fixadores-->
						<a href="/categoria/chumbadores-fixadores/1.html#work">Chumbadores Fixadores</a>
					    </label>
					    <label class="column">
                				<!--<input type="checkbox" value="chapa" name="facet_brand[]">Chapa-->
						<a href="/categoria/chapa/1.html#work">Chapa</a>
					    </label>
					    <label class="column">
                				<!--<input type="checkbox" value="porca" name="facet_brand[]">Linha N&aacute;utica-->
						<a href="/categoria/linha-n&aacute;utica/1.html#work">Linha N&aacute;utica</a>
					    </label>
                    			</li>
				    </ul>
				</div>
            			<div class="clearfix">
           	 		    <!--<a class="apply-filter right">Filtrar</a>-->
        			</div>
    				<i class="arrow-down"></i>
			</div>
                </li>
		<?php // Criar ParentId Category: Material ?>
                <li class="material_family">
				<a class="toggle-filter" href="javascript:void(17)" onclick="showFilters('material')">Material<!--<i class="genericon genericon-expand"></i>--></a>
			<div data-link-replace="--facet-material-family--" data-link-set="/category/--facet-material-family--" data-link-unset="/category/" class="filter-menu" id="materialFilters">
    				<div class="filter-header">
                    		    <strong>Filtro por:</strong>
            			</div>
    				<div class="filter-body">
        			    <ul class="rows">
            				<li>
                        		    <label class="column">
                				<!--<input type="checkbox" value="Inox" name="facet_material_family[]">Inox-->
						<a href="/tag/inox/1.html#work">Inox</a>
					    </label>
                        		    <label class="column">
                				<!--<input type="checkbox" value="Latao" name="facet_material_family[]">Lat&aatilde;o-->
						<a href="/tag/lat&atilde;o/1.html#work">Lat&atilde;o</a>
					    </label>
                        		    <label class="column">
                				<!--<input type="checkbox" value="MDF" name="facet_material_family[]">Alum&iacute;nio-->
						<a href="/tag/alum&iacute;nio/1.html#work">Alum&iacute;nio</a>
					    </label>
					</li>
					<li>
                        		    <label class="column">
                				<!--<input type="checkbox" value="Metal" name="facet_material_family[]">A&ccedil;o-->
						<a href="/tag/a&ccedil;o/1.html#work">A&ccedil;o</a>
					    </label>
                    			</li>
				    </ul>
				</div>
            			<div class="clearfix">
            			    <!--<a class="reset-filter left">Limpar seleções</a>
            			    <a class="apply-filter right">Aplicar filtros</a>-->
        			</div>
    				<i class="arrow-down"></i>
			</div>
                </li>
 		<?php // Criar ParentId Category: Acabamento ?>
                <li class="color">
               		<a class="toggle-filter" href="javascript:void(17)" onclick="showFilters('acabamento')">Acabamento<!--<i class="genericon genericon-expand">--></i></a>
			<div data-link-replace="--facet-color-family--" data-link-set="/category/?color=--facet-color-family--" data-link-unset="/eletro/eletroeletronicos/" class="filter-menu" id="acabamentoFilters">
    			<div class="filter-header">
                    	    <strong>Filtrar por:</strong>
            		</div>
    			<div class="filter-body">
        		    <ul class="fct-colorPicker clearfix">
            			 <li>
            			     <a style="background-color:#ede0be" href="/tag/abrilhantado/1.html#work">Abrilhantado</a>
        			 </li>
				  <li>
            			     <a style="background-color:#ede0be" href="/tag/decapado/1.html#work">Decapado</a>
        			 </li>
            			 <li>
            			     <a style="background-color:#f9f7f3" href="/tag/polido/1.html#work">Polido</a>
        			 </li>
 				 <li>
            			     <a style="background-color:#f9f7f3" href="/tag/passivado/1.html#work">Passivado</a>
        			 </li>
            		    	 <li>
            			     <a style="background-color:#b0b0b0" href="/tag/cinza/1.html#work">Cinza</a>
        			 </li>
            			 <li>
            			     <a style="background:url('/images/colorido.gif')" href="/tag/colorido/1.html#work">Colorido</a>
        			 </li>
            			 <li>
            			     <a style="background-color:#703321" href="/tag/marrom/1.html#work">Marrom</a>
        		 	 </li>
            			 <li>
            			    <a style="background-color:#000000" href="/tag/preto/1.html#work">Preto</a>
        			 </li>
			    </ul>
    			</div>
    			<i class="arrow-down"></i>
</div>
                </li>
		<?php // Criar ParentId Processo ... ?>
                <li class="proccess">
                    <a class="toggle-filter" href="javascript:void(17)" onclick="showFilters('proccess')">Proceso Fabrica&ccedil;&atilde;o<!--<i class="genericon genericon-expand"></i>--></a>
		    <div data-link-replace="--facet-proccess--" data-link-set="/category/--facet-proccess--" data-link-unset="/category/" class="filter-menu" id="proccessFilters">
    			<div class="filter-header">
                    	    <strong>Filtrar:</strong>
            	   	</div>
    			<div class="filter-body">
        		    <ul class="rows ">
            			<li>
                       		    <label class="column">
                			<a href="/tag/usinado-cnc/1.html#work">Usinado CNC</a>
            			    </label>
                        	    <label class="column">
                			<a href="/tag/forjado/1.html#work">Forjado</a>
            			    </label>
                        	    <label class="column">
					<a href="/tag/deformado-a-frio/1.html#work">Deformado a Frio</a>
            			    </label>
                    		</li>
    			    </ul>
    			</div>
    			<i class="arrow-down"></i>
		    </div>
                </li>
		<!-- Criar ParentId Normas ... -->
                <li class="standard">
                    <a class="toggle-filter" href="javascript:void(17)" onclick="showFilters('standard')">Normas<!--<i class="genericon genericon-expand"></i>--></a>
		    <div data-link-replace="--facet-standard--" data-link-set="/tag/--facet-standard--" data-link-unset="/category/" class="filter-menu" id="standardFilters">
    			<div class="filter-header">
                    	    <strong>Filtrar por:</strong>
            	   	</div>
    			<div class="filter-body">
        		    <ul class="rows">
            			<li>
                       		    <label class="column">
                			<a href="/tag/din-975/1.html#work">DIN 975</a>
            			    </label>
                        	    <label class="column">
                			<a href="/tag/din-439/1.html#work">DIN 439</a>
            			    </label>
                        	    <label class="column">
					<a href="/tag/deformado-a-frio/1.html#work">Deformado a Frio</a>
            			    </label>
				</li>
				<li>
				    <label class="column">
					<a href="/tag/auto-brocante/1.html#work">AUTO BROCANTE</a>
            			    </label>
				    <label class="column">
					<a href="/tag/pretinox/1.html#work">PRETINOX</a>
            			    </label>
				    <label class="column">
					<a href="/tag/passiva&ccedil;&atilde;o/1.html#work">PASSIVA&Ccedil;&Atilde;O</a>
            			    </label>
                    		</li>
    			    </ul>
    			</div>
    			<i class="arrow-down"></i>
		    </div>
                </li>
		<!-- Criar ParentId Roscas e Pontas -->
                <li class="roscas">
                    <a class="toggle-filter" href="javascript:void(17)" onclick="showFilters('roscas')">Roscas e Pontas<!--<i class="genericon genericon-expand"></i>--></a>
		    <div data-link-replace="--facet-standard--" data-link-set="/tag/--facet-standard--" data-link-unset="/category/" class="filter-menu" id="roscasFilters">
    			<div class="filter-header">
                    	    <strong>Filtrar por:</strong>
            	   	</div>
    			<div class="filter-body">
        		    <ul class="rows">
            			<li>
                       		    <label class="column">
                			<a href="/tag/auto-atarraxantes/1.html#work">Auto Atarraxantes</a>
            			    </label>
                        	    <label class="column">
                			<a href="/tag/inox-plastic/1.html#work">Inox-Plastic</a>
            			    </label>
                        	    <label class="column">
					<a href="/tag/auto-cortantes/1.html#work">Auto Cortantes</a>
            			    </label>
				</li>
				<li>
				    <label class="column">
					<a href="/tag/auto-brocante/1.html#work">Auto Brocante</a>
            			    </label>
				    <label class="column">
					<a href="/tag/rebite-u/1.html#work">Rebite U</a>
            			    </label>
				</li>
    			    </ul>
    			</div>
    			<i class="arrow-down"></i>
		    </div>
                </li>
		<!-- Criar ParentId Estrutura Metalografica -->
                <li class="estructure">
                    <a class="toggle-filter" href="javascript:void(17)" onclick="showFilters('estructure')">Estrutura Metalogr&aacute;fica<!--<i class="genericon genericon-expand"></i>--></a>
		    <div data-link-replace="--facet-standard--" data-link-set="/tag/--facet-standard--" data-link-unset="/category/" class="filter-menu" id="estructureFilters">
    			<div class="filter-header">
                    	    <strong>Filtrar por:</strong>
            	   	</div>
    			<div class="filter-body">
        		    <ul class="rows">
            			<li>
                       		    <label class="column">
                			<a href="/tag/austenitico/1.html#work">Austen&iacute;tico</a>
            			    </label>
                        	    <label class="column">
                			<a href="/tag/ferritico/1.html#work">Ferr&iacute;tico</a>
            			    </label>
                        	    <label class="column">
					<a href="/tag/martensitico/1.html#work">Martens&iacute;tico</a>
            			    </label>
				</li>
				<li>
				    <label class="column">
					<a href="/tag/estrutura-mista/1.html#work">Estrutura Mista</a>
            			    </label>
				    <label class="column">
					<a href="/tag/rebite-u/1.html#work">Rebite U</a>
            			    </label>
				</li>
    			    </ul>
    			</div>
    			<i class="arrow-down"></i>
		    </div>
                </li>

        </ul>
        <!--<i class="genericon genericon-close-alt"></i>-->
    </div>
</div>
<script type="text/javascript">
	/*$("#categoryFilters").bind("click", function() {
		alert("a");
		$("ul.catalog-top-filters li .filter-menu").style(
			"display", "block"
		);
	});*/

	function hideFilters() {
		document.getElementById("categoryFilters").style = 'display: none';
		document.getElementById("materialFilters").style = 'display: none';
		document.getElementById("acabamentoFilters").style = 'display: none';
		document.getElementById("proccessFilters").style = 'display: none';
		document.getElementById("standardFilters").style = 'display: none';
		document.getElementById("roscasFilters").style = 'display: none';
		document.getElementById("estructureFilters").style = 'display: none';
	}

	function showFilters(category) {
		hideFilters();
		document.getElementById(category + "Filters").style = 'display: block';
	}

	document.body.onclick = function(e) {
		if (e.target != 'javascript:void(17)') {
			hideFilters();
		}
	}

	/*
	var g = $(".filter-menu");

	g.bind("click", function(h) { 
		alert(h);
		h.stopPropagation()
	});*/
	/*$("div.filter-menu a.reset-filter").bind("click", function() { 
		$(this).closest("div.filter-menu").find("input:checkbox").removeAttr("checked")
	});
	$("div.filter-menu a.apply-filter").bind("click",function() {
		var l = $(this).closest("div.filter-menu");
		var j = [];
		l.find("input:checkbox:checked").each(function() { 
			j.push($(this).val())
		});
		if (j.length) { 
			var k=l.data("link-replace");
			var h=l.data("link-set").replace(k,j.join("--"));
		} else {
			var h=l.data("link-unset");
		}
		$(this).attr("href",h);
	});
	$("ul.catalog-top-filters a.toggle-filter").bind("click",function(j) { 
		j.preventDefault();
		j.stopPropagation();
		var h = $(this).siblings("div.filter-menu");
		h.is(":visible") ? h.fadeOut("fast") : h.fadeIn("fast");
		h.closest("li").siblings().find(".filter-menu").hide()
	});
	$("body").bind("click",function(){
		g.fadeOut("fast")
	});*/
//});
</script>

