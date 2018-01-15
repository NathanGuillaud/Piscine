<?php $numEditeur = htmlspecialchars($_GET['numEditeur']); ?>
<div class="infos">
    <form method="post" action="index.php?controller=contact&action=registerContact">
        <fieldset class="form-infos">
            <label>Nom Contact:
                <input type="text" placeholder="Nom" name="nomContact" required /></label>

            <label>Prénom Contact:
                <input type="text" placeholder="Prénom" name="prenomContact" required /></label>

            <label>Email:
                <input type="email" placeholder="Email" name="mailContact" maxlengt=320 required /></label>

            <label>Telephone:
                <input type="text" placeholder="Telephone" name="telContact" /></label>

            <label>Poste:
                <input type="text" placeholder="Poste" name="poste"/></label>

            <label>Privilegie:
                <input type="checkbox" name="estPrivilegie"/></label>

            <input type="hidden" value="<?php echo $numEditeur; ?>" name="numEditeur" required />
            <input class="edit-buton-save" type="submit" name="submit" value="Enregistrer" />
        </fieldset>
    </form>
</div>