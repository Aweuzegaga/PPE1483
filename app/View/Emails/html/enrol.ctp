<h2 id="titleEnrol" class="center">Inscrivez-vous à la communauté WebArena!</h2>
<?php
$attr = array(
    'role' => 'form',
    'class' => 'form-horizontal',
);
?>
<div class="row">
    <div class="col-md-10 col-md-offset-3">
        <?php
        echo $this->Form->create('Player', $attr);
        ?>
        <div class="form-group">
            <label for="PlayerEmail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-3">
                <input type="email" class="form-control" id="PlayerEmail" name="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="PlayerPassword" class="col-sm-2 control-label">Mot de passe</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" id="PlayerPassword" name="password"  placeholder="Mot de passe">
            </div>
        </div>
        <div class="form-group">
            <label for="ConfirmPlayerPassword" class="col-sm-2 control-label">Confirmez le mot de passe</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" id="ConfirmPlayerPassword" name="password2" placeholder="Mot de passe">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Créer un compte</button>
            </div>
        </div>
        <?php
        echo $this->Form->end();
        ?>
    </div>
</div>