<?php
$cakeDescription = __d('cake_dev',
        'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>

<!DOCTYPE html>
<html lang="fr">
    <head>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription; ?>
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('bootstrap-theme.min');
        echo $this->Html->css('bootstrap-social');
        echo $this->Html->css('font-awesome.min');
        echo $this->Html->css('webarena');


        echo $this->fetch('meta');
        echo $this->fetch('css');
        ?>
        <title><?php echo $title_for_layout; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">





        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
            <!-- Script google </body> -->
    <!-- Placez ce script JavaScript asynchrone juste devant votre balise </body> -->
    <script type="text/javascript">
      (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client:plusone.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();
    </script>


    <body>

        <?php echo $this->Html->script('facebook') ?>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                    </button>
                    
                    <?php /**BARRE DE NAVIGATION TOUT EN HAUT */
                    echo $this->html->link('MEye Home',
                            array('controller' => 'Ppe', 'action' => 'subscribe'),
                            array('class' => 'navbar-brand'));
                    ?>

                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                       

                        <li><?php /** BARRE DE NAVIGATION TOUT EN HAUT */
                            echo $this->html->link('Accueil',
                                    array('controller' => 'Ppe', 'action' => 'accueil'));
                            ?></li>
                        <li><?php
                            echo $this->html->link('Connexion',
                                    array('controller' => 'Ppe', 'action' => 'index'));
                            ?></li>


                    </ul>

                    <?php
                    echo $this->Form->create("LoginHeader",
                            array('class' => array('navbar-form', 'navbar-right', 'inline-form')));
                    ?>

                    <div class="form-group ">
                        <?php
                        echo $this->Form->input("email",
                                array('label' => false, 'class' => array('form-control', 'input-sm'), 'div' => false, 'placeholder' => 'Votre email'))
                        ?>


                        <?php
                        echo $this->Form->password("password",
                                array('class' => array('form-control', 'input-sm'), 'placeholder' => 'Votre mot de passe'));
                        ?>
                        <?php
                        $options = array('label' =>  'Connexion',
                            'div' => false, 'class' => array('btn', 'btn-primary', 'btn-sm'));
                        echo $this->Form->end($options);
                        ?>
                    </div>

                </div>


            </div>

        </nav>

        <div id="connexion" class="container" style="margin-top: 60px">

            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>


        </div><!-- /.container -->
        <div id="footer"  class="container footer" >

            <?php
            echo $this->Html->link(
                    $this->Html->image('cake.power.gif',
                            array('alt' => $cakeDescription, 'border' => '0')),
                    'http://www.cakephp.org/',
                    array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
            );
            ?>

            <?php
//@todo ne pas oublier de mettre le lien de suivi de version et l'adresse du site
            echo 'PPE 1483 : ';
            ?>
            <?php echo 'CHRETIEN COCHE COUSIN JOLIVET MAUGERI'; ?>
            <p>
            <?php echo $cakeVersion; ?>
        </p>
    </div>


    <?php echo $this->element('sql_dump'); ?>
            <?php echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');?>
       <?php echo $this->Html->script('facebook'); ?>
       
    <?php echo $this->Html->script('webarena'); ?>
    <?php echo $this->Html->script('bootstrap.min'); ?>
    
    <?php echo $this->fetch('script'); ?>

</body>
</html>
