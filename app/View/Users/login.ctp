<?php $this->assign('title', 'login');?>

<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php $this-> layout = 'meyeHome' ?>

<html>

  <head>


    
    <title>M'eye Home</title>
  </head>


  <body>

    <div class="container" id="login">
      <form class="form-signin">
          
          <?php
    echo $this->Form->create('Login');
    ?>
        
        <div id="loghead">
            <?php echo $this->Html->image('logoPPE.png', array('alt' => 'CakePHP', 'height' => '200')); ?>
         
        </div>
        
        <div id='titrelog'><h2 class="form-signin-heading">Connectez-vous</h2></div>
        
       
    <?php
    echo $this->Form->email("email",
            array( 'class' => 'form-control', 'placeholder' => 'Adresse Mail'))
    ?>
        
        <?php
        echo $this->Form->password("password",
                array('class' => 'form-control', 'placeholder' => 'Mot de passe'));
    ?>
    
        <div class="checkbox">
        <label>
            <input type="checkbox" value="remember-me"></input> Remember me
            </label>
          </div>
        <?php
    $options = array('label' => 'Connexion', 'class' => array('btn', 'btn-lg', 'btn-primary', 'btn-block'));
    echo $this->Form->end($options);
    ?>
            </form>
        
        <div class='logprob'>
            <p><?php echo $this->Html->link('Vous n\'avez pas de compte ?', array('controller' => 'Users', 'action' => 'subscribe')); ?></p>
            <p><a>Vous avez oublié votre mot de passe ?</a></p> 
        </div>
        
        
    </div>
      
      

  </body>

</html>