
<!DOCTYPE html>
<html>
<head>
	
	<title>
            M'eye Home
	</title>
	<?php
		echo $this->Html->meta('icon');
                echo $this->Html->css('bootstrap.min');
                echo $this->Html->css('bootstrap-theme.min');
                echo $this->Html->css('bootstrap-social');
                echo $this->Html->css('font-awesome.min');
          
                echo $this->Html->css('MeyeHome');
                

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
