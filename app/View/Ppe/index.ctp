<?php $this-> layout = 'meyeHome' ?>

<html>

  <head>


    
    <title>M'eye Home</title>
  </head>


  <body>

    <div class="container" id="login">
      <form class="form-signin">
        
        <div id="loghead">
            <?php echo $this->Html->image('logoPPE.png', array('alt' => 'CakePHP', 'height' => '200')); ?>
         
        </div>
        <h2 class="form-signin-heading">Connectez-vous</h2>
        <label class="sr-only" for="inputEmail">Address Email</label>
        <input id="inputEmail" class="form-control" type="email" autofocus="" required="" placeholder="Email address"></input>
        <label class="sr-only" for="inputPassword">Mot de passe</label>
        <input id="inputPassword" class="form-control" type="password" required="" placeholder="Password"></input>

      <div class="checkbox">
        <label>
            <input type="checkbox" value="remember-me"></input> Remember me
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div>

  </body>

</html>