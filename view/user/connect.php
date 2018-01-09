<body>
<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif; ?>
<div class="infos">
    <h2>Bienvenue sur la page de connexion : </h2>
<form method="post" action="index.php?controller=user&action=actionConnect"> 	
	<fieldset class="form-infos">
	    <label>
	     Login
	     <input type="text" placeholder="Identifiant" 
			name="login" value="<?php if (isset($login)): echo $login; endif; ?>" required />
	    </label>
	   <label>
	      Mot de passe
	     <input type="password" placeholder="Mot de passe"
			name="password" value="<?php if (isset($password)): echo $password; endif; ?>" required />
	    </label>
	  </fieldset>
	  <fieldset class="form-action">
	    <input class="login-button" type="submit" name="submit" value="Connexion" />
	  </fieldset>
</form>
</div>
</body>