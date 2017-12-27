<?php if (isset($error)): ?>
	<p class="error">
		<?php echo $error; ?>
	</p>
<?php endif;?>

<form method="post" action="index.php?controller=user&action=actionRegister">
	<fieldset class="form-infos">
            <label>Login:
			   <input type="text" placeholder="Login" 
				pattern=".{3,}" title="The login must be at least 3 characters long" maxlength=20 
				name="login" value="<?php if (isset($login)): echo $login; endif;?>" required />
			</label>
            <label>Mot de passe:
				<input type="password" placeholder="Password" 
				pattern=".{4,}" title="The password must be at least 4 characters long" maxlength=30
				name="password" value="<?php if (isset($password)): echo $password; endif; ?>" required />
			</label>
            <label>
				Confirmation mot de passe:
				<input type="password" placeholder="Password (again)"
				pattern=".{4,}" title="The password must be at least 4 characters long" maxlength=30 
				value="<?php if (isset($passwordRetype)): echo $passwordRetype; endif; ?>" name="passwordRetype" required />
			 </label>  
            <label>Email:
				<input type="email" placeholder="Email" name="email" maxlengt=320 
				value="<?php if (isset($email)): echo $email; endif; ?>" required /> 
			</label>
    </fieldset>
	<fieldset class="form-action">
			<input class="form-bouton" type="submit" name="submit" value="Enregistrer" />
	</fieldset>
</form>