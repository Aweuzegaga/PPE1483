
<?php echo $this->Form->create('User'); ?>

        <h2 class="form-signin-heading">Connectez-vous</h2>
        <label class="sr-only" for="inputEmail">identifiant</label>
        <?php echo $this->Form->imput('username', array('label'=>"Login:")); ?>
        <label class="sr-only" for="inputEmail">Address Email</label>
        <?php echo $this->Form->imput('mail', array('label'=>"Email:")); ?>
        <label class="sr-only" for="inputPassword">Mot de passe</label>
        <?php echo $this->Form->imput('password', array('label'=>"Mot de passe:")); ?>

      
<?php echo $this->Form->end("S'enregistrer"); ?>
