<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif; ?>
<html>
    <head>
    <link type="text/css" href="/style.css">
    </head>
    
    <body>
        <form class="form" method="post" action="index.php?controller=user&action=actionConnect"> 	
            <fieldset class="form-infos">
                <label>
                 Login
                 <input type="text" placeholder="Login" 
                    name="login" value="<?php if (isset($login)): echo $login; endif; ?>" required />
                </label>
               <label>
                  Mot de passe
                 <input type="password" placeholder="Password"
                    name="password" value="<?php if (isset($password)): echo $password; endif; ?>" required />
                </label>
              </fieldset>
              <fieldset class="form-action">
                <input class="form-bouton" type="submit" name="submit" value="Connexion" />
              </fieldset>
        </form>
    </body>
</html>