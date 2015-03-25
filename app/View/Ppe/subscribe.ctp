<?php $this->assign('title', 'subscribe'); ?>



<!DOCTYPE html>
<html lang="fr">
  <head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   
     <?php echo $this->Html->charset(); ?>
        <title>
            <?php// echo "WebArenaGroupSI4" ?>:
            <?php// echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('bootstrap-theme.min');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        ?>
    <title><?php echo $title_for_layout;?></title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">



    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <div style="background:black" class="row">
    <h1 class="col-lg-12"><font color="white">
        Bienvenue sur M'Eye Home
    </h1>

</div>
<div style="background:black" class="row">
    
    <h2 class="col-lg-8">Inscription</h2>
    <div class="row">
        <p class="col-lg-7">
            Bienvenue sur le projet M'Eye Home. Il s'agit d'un projet de PPE
            (Projet Pluridisciplinaire en équipe) mis en place à l'ECE Paris.
            Dans ce projet, nous devions essayer de mettre en place notre propre
            centre de traitement des données issues d'une box domotique.
        </p>
        <div class="col-lg-4">
            <div class="row">
                <?php $this->layout = 'connexion' ?>

                <?php echo $this->Form->create('MailManagement'); ?>


                <?php
                echo $this->Form->input("email",
                        array('label' => 'Votre e-mail', 'required', 'type' => 'email',
                    'class' => 'form-control', 'div' => 'form-group', 'placeholder' => 'exemple@exemple.com'))
                ?>


                <?php
                $options = array('label' => 'Inscription', 'class' => array('btn', 'btn-primary'));
                echo $this->Form->end($options);
                ?>
            </div>
           

        </div>
    </div>

</div>






