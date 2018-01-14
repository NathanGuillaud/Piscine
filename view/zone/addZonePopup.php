<?php 
	 
	$file = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'piscine' . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . 'file.php';
	$file = str_replace('/', DIRECTORY_SEPARATOR, $file);
	if(!in_array($file, get_required_files())){
		require_once $file;
		require_once File::buildPath(array('model', 'modelType.php'));
	}
	$listeType = ModelType::getAllType();
?>
<div class="infos">
	<h2>Ajout d'une zone : </h2>
<form method="post">
	<fieldset class="form-infos">
	    <label>Libelle Zone:
	    	<input type="text" placeholder="Zone Verte" name="libelleZone" required /></label>

		<label>Type jeux:
			<select name="numType" required>
	           <?php
	           		foreach ($listeType as $type) {
	           			echo '<option value="'. htmlspecialchars($type->getNumType()). '">' . htmlspecialchars($type->getLibelleType()) .'</option>';
	           		}
	           ?>
	       	</select>
   		</label>

   		<input type="hidden" name="popupJS" value="true" />
		<input class="edit-button-save" type="button" name="addZone" value="Enregistrer" />
	</fieldset>
</form>
</div>

<script>

	//Requete AJAX pour ajouter un editeur et récupérer son id et l'ajouter au select
	$("input[name='addZone']").click(function(){
		var libelleZone = $("input[name='libelleZone']").val();
		var numType = $("select[name='numType']").val();		
		var popupJS = $("input[name='popupJS']").val();

		$.post('index.php?controller=zone&action=registerZone',
		    {
		    	libelleZone,
		    	numType,
		    	popupJS
		    }, function(data) {
		    	 $("select[name='idZone[]']").append($('<option>', {
				    value: data,
				    text: libelleZone
				}));
				var div = document.getElementById("newZone");
				div.innerHTML = "Zone ajoutée !";
		});
	});

	
	//On affiche la popup pour ajouter un editeur
	function popupZone(){
		$("#newZone").dialog({
			width: 1000,			
       		closeOnEscape: false,
       		 open: function(event, ui) {  $(".ui-dialog-titlebar-close", $(this).parent()).hide() },
			buttons: [
	            {
	                text: "fermer",
	                click: function () {
	                	$.ajax({
						      type: "GET",
						      url: "view/zone/addZonePopup.php"
						   }).done(function(html){
						      $('#newZone').html(html);
						});
	                    $(this).dialog("close");
	                }
	            }
	        ]
		});
	}
</script>