<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
}

?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
		<title>Nuestra Farmacia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" media="screen" href="jquery-ui/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="jqgrid/css/ui.jqgrid.css" />
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<style>
			.ui-jqdialog {z-index: 10000 !important;position: absolute !important;}
		</style>
	</head>

	<body style="background-color: #d3d3d3;">

	<?php include "php/navbar.php"; ?>
	<div class="container">
	<div class="row">
	<div class="col-md-12">
	<h2>Medicamentos Disponibles</h2>
	<br>
	<div id="page" data-role="page" data-theme="a">
	 <table id='grid'></table>
		<div id='pager'></div>
	</div>
	</div>
	</div>
	</div>



	<script src="js/jquery.js"></script>
	<script src="jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
	<script src="jqgrid/js/i18n/grid.locale-es.js" type="text/javascript"></script>
    <script src="jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js"  ></script>
	<script type="text/javascript">
	$.jgrid.defaults.width = 780;
	$.jgrid.defaults.responsive = true;

	$(document).ready(function () {
        jQuery('#grid').jqGrid({
				"viewrecords":true,
				"jsonReader":{"repeatitems":false,"subgrid":{"repeatitems":false}},
				"gridview":true,
				"loadonce":true,
				"url":"php/disponiblessuper.php",
				"scrollPaging":true,
				"autowidth":true,
				"rowNum":20,
				"rowList" : [5,10,20],
				"sortname":"id",
				"height":200,
				"datatype":"json",

				"colModel":[
						{"name":"Unidad","index":"Unidad","sorttype":"int","editable":true},
						{"name":"Medicamento","index":"Medicamento","sorttype":"string","editable":true},
						{"name":"Centro","index":"Centro","sorttype":"string","editable":true}
				],
				"loadError":function(xhr,status, err){
					try {
						jQuery.jgrid.info_dialog(jQuery.jgrid.errors.errcap, xhr.responseText , jQuery.jgrid.edit.bClose,
						{buttonalign:'right'});
					} catch(e) {
						alert(xhr.responseText);}
				},
				"rownumbers": true, // show row numbers
                "rownumWidth": 35, // the width of the row numbers columns
                "hoverrows": true,
				"pager":"#pager"
			});

			jQuery('#grid').jqGrid('filterToolbar');

			});


				function agregarDonacion(){
   				window.location="./donar.php";
   				}

        </script>

	</body>
</html>
