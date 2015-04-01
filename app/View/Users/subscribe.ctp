<?php $this->assign('title', 'subscribe'); ?>

<?php $this->layout = 'meyeHome' ?>

<div id="login">
   
    <h2 id='titrelog' >Inscrivez-vous !</h2>
    <?php
    $attr = array(
        'role' => 'form',
        'class' => 'form-horizontal',
    );
    ?>
    
            
            <?php echo $this->Form->create('MailManagement'); ?>
            
    <div class='logprob'>
        
                    <?php echo $this->Form->email("email",
                        array( 'required', 'type' => 'email',
                    'class' => 'form-control', 'placeholder' => 'exemple@exemple.com'))
                ?>
        </div>
        <div class='logprob'>
   
        <?php
                    $options = array('label' => 'Inscription', 'class' => array('btn', 'btn-primary'));
                    echo $this->Form->end($options);
                    ?>
    </div>
                    
              
       
    
    
        
</div>
      
    

                
       
        
        

                


                
          
           

       
    








