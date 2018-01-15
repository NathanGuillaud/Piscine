<div class="infos">
	<h2>Ajout d'une zone : </h2>
<form method="post">
	<fieldset class="form-infos">
	    <label>Libelle Zone:
	    	<input type="text" placeholder="Zone Verte" name="libelleZone" required /></label>

		<label>Type jeux:
			<select name="numTypeZone" required>
	       	</select>
   		</label>

   		<input type="hidden" name="popupJS" value="true" />
		<input class="edit-button-save" type="button" name="addZone" value="Enregistrer" />
	</fieldset>
</form>
</div>

<script>


	$(document).ready( function() {
		
	};




	//Requete AJAX pour ajouter un editeur et récupérer son id et l'ajouter au select
	$("input[name='addZone']").click(function(){
		var libelleZone = $("input[name='libelleZone']").val();
		var numType = $("select[name='numTypeZone']").val();		
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
		var popup = $("#newZone").dialog({
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

	//on récupère la liste des types
	$.ajax({
		type: "GET",
		url: "index.php?controller=type&action=getListeType"
		}).done(function(html){
			 $.each( JSON.parse(html), function( key, val ) {
			 	$("select[name='numTypeZone']").append($('<option>', {
				    value: key,
				    text: val
				}));
			 })
		});
</script>