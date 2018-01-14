<!---  Zone de formulaire de l'éditeur -->
<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
<?php endif;?>

<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<div class="part">
<h1>Formulaire d'ajout d'un editeur : </h1>
<table>
    
    <form method="post" action="index.php?controller=editeur&action=registerEditeur">

        <div class="group">
           <label for="nomEditeur">Nom de l'éditeur : </label><br />
           <input type="text" name="nomEditeur" id="nomEditeur" placeholder="Hasbro" value="<?php if (isset($nomEditeur)): echo $nomEditeur; endif;?>" required/><br /><br />
        </div>
        
        <div class="right">
           <label for="mailEditeur" >E-Mail de l'éditeur : </label><br />
           <input type="email" name="mailEditeur" maxlengt="320" id="emailEditeur" placeholder="contact@mail.com" value="<?php if (isset($mailEditeur)): echo $mailEditeur; endif; ?>" required /><br /><br />
        </div>
        
        <div class="group">
           <label for="telEdi" >Numéro de téléphone de l'éditeur : </label><br />
           <input type="tel" name="telEditeur" id="telEdi" placeholder="01 23 45 67 89" value="<?php if (isset($telEditeur)): echo $telEditeur; endif; ?>" required /><br /><br />
        </div>
        
        
        <div class="right">
           <label for="siteEditeur">Site internet de l'éditeur :  </label><br />
           <input type="url" name="siteEditeur" id="siteEditeur" placeholder="site-editeur.fr" value="<?php if (isset($siteEditeur)): echo $siteEditeur; endif; ?>" required/><br /><br />
        </div>
        
        <label>Commentaire:
			<input type="text" placeholder="commentaire"
			value="<?php if (isset($comEditeur)): echo $comEditeur; endif; ?>" name="comEditeur"/></label><br/>
        <br />
        <hr/>
        <br/><br/>
        <div class="group">
           <p>L'éditeur est-il intéréssé par le festival ?</p><br/>
           
           <input type="radio" name="interesse" value="interesseOui"  id="interesseOui" class="radio" onclick="bloquer()" /> 
           <label for="interesseOui" class="littlab">Oui</label>
        
           <input type="radio" name="interesse" value="interesseNon" id="interesseNon" class="radio" onclick="bloquer()" /> 
           <label for="interesseNon" class="littlab">Non</label><br /><br />
        </div>
        
        <div class="right">
           <label for="DatePremierContact">Date de premier contact : </label><br />
           <input type="date" name="DatePremierContact" id="DatePremierContact" /><br /><br />
           <br />
        </div>
        
        <label>Nombre de jeux:
			<input type="number" placeholder="Nombre de jeux"
			value="<?php if (isset($nbrJeux)): echo $nbrJeux; endif; ?>" name="nbrJeux" required /></label>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
    
    </form>
</table>
</div>

<!-- Zone de suivi si interessé -->

<!-- Liste des jeux : a dupliquer en fonction des besoins con-->
<div class="part" id="block_form">
<form method="post" action="traitement.php" id="suite_form">
 
       <h3>Jeu à ajouter : </h3>

       <label for="LibelleJeu">Nom du jeu : </label><br />
       <input type="text" name="LibelleJeu" id="LibelleJeu" /><br /><br />


  
       Le jeu est-il un prototype ?<br />
       
      
        <input type="radio" name="EstPrototype"   value="EstPrototypeOui" id="EstPrototypeOui" class="radio" /> <label for="EstPrototypeNon" class="littlab">Oui</label>
    
        <input type="radio" name="EstPrototype" value="EstPrototypeNon" id="EstPrototypeNon" class="radio" /> <label for="EstPrototypeNon" class="littlab">Non</label>
       <br /><br />

       Le jeu est-il surdimensionné ?<br />
       <input type="radio" name="EstSurdimensionne" value="EstSurdimensionneOui" class="radio" id="EstSurdimensionneOui" /> <label for="EstSurdimensionneOui" class="littlab">Oui</label>
    
       <input type="radio" name="EstSurdimensionne" value="EstSurdimensionneNon" id="EstSurdimensionneNon" class="radio"/> <label for="EstSurdimensionneNon" class="littlab">Non</label><br /><br />      

       <label for="LibelleType">Type du jeu : </label><br />
       <select name="LibelleType" id="LibelleType">
           <option value="enfant">Jeu pour enfant</option>
           <option value="familial">Jeu familial</option>
           <option value="expert">Expert</option>
       </select>     
       
</form>
</div>

    <div class="free"></div>
    <input type="button" value="ajouter un jeu" id="btn" />
</html>

<!-- Liste des jeux : a dupliquer en fonction des besoins con-->

<script type="text/javascript">

function bloquer() {
    if (document.getElementById('interesseNon').checked) {
        document.getElementById('suite_form').style.display='none';
        document.getElementById('block_form').style.display='none';
    }else{
        document.getElementById('suite_form').style.display ='none';
    }
    
    
    
    if (document.getElementById('interesseOui').checked) {
        document.getElementById('suite_form').style.display='block';
        document.getElementById('block_form').style.display='block';
    }else{
        document.getElementById('suite_form').style.display ='none';
    }
    
}

    
$(document).ready(function() {
  //var new_span = $('<span>START</span>').addClass('spn');      // new <span> with class="spn"
    
    
  // now we use the new added button, when is clicked
  $('#btn').click(function() {
      
    // insert the "new_span" at the beginning inside all DIVs with class="cls"
    var new_span = document.createElement("div");
    new_span.class = "part";
    console.log(new_span);
    console.log("bbbb");
    new_span.prependTo('div.free');
    });
  });