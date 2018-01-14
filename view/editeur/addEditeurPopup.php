<div class="infos">
    <h2>Ajout d'un éditeur : </h2>
	<form method="post">
		<fieldset class="form-infos">
		    <label>Nom Editeur:
		    	<input type="text" placeholder="Nom de la société" name="nomEditeur" required /></label>

			<label>Email:
				<input type="email" placeholder="Email" name="mailEditeur" maxlengt=320 required /></label>
				
			<label>Telephone:
				<input type="text" placeholder="Telephone" name="telEditeur" /></label>

			<label>Site:
				<input type="text" placeholder="Site" name="siteEditeur"/></label>

			<label>Commentaire:
				<input type="text" placeholder="commentaire" name="comEditeur"/></label>
	        
			<input type="hidden" name="popupJS" value="true" />

	        <input class="edit-button-save" type="button" name="addEditeur" value="Enregistrer" />
	    </fieldset>
	</form>
 </div>

 
<script>
	//Requete AJAX pour ajouter un editeur et récupérer son id et l'ajouter au select
	$("input[name='addEditeur']").click(function(){
		var nomEditeur = $("input[name='nomEditeur']").val();
		var mailEditeur = $("input[name='mailEditeur']").val();
		var telEditeur = $("input[name='telEditeur']").val();
		var siteEditeur = $("input[name='siteEditeur']").val();
		var comEditeur = $("input[name='comEditeur']").val();
		var popupJS = $("input[name='popupJS']").val();

		$.post('index.php?controller=editeur&action=registerEditeur',
		    {
		    	nomEditeur,
		    	mailEditeur,
		    	telEditeur,
		    	siteEditeur,
		    	comEditeur,
		    	popupJS
		    }, function(data) {
		        $("select[name='numEditeur']").append($('<option>', {
				    value: data,
				    text: nomEditeur
				}));
				var div = document.getElementById("newEditeur");
				div.innerHTML = "Editeur ajouté !";
		});
	});

	//On affiche la popup pour ajouter un editeur
	function popupEditeur(){
		$("#newEditeur").dialog({
			width: 1000,			
       		closeOnEscape: false,
       		 open: function(event, ui) {  $(".ui-dialog-titlebar-close", $(this).parent()).hide() },
			buttons: [
	            {
	                text: "fermer",
	                click: function () {
	                	$.ajax({
						      type: "GET",
						      url: "view/editeur/addEditeurPopup.php"
						   }).done(function(html){
						      $('#newEditeur').html(html);
						});
	                    $(this).dialog("close");
	                }
	            }
	        ]
		});
	}

</script>