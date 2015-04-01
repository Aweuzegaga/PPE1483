<html>
    <div class="contain-to-grid sticky">
        <div class="sticky">
            <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
                <ul class="title-area">
                    <li class="name">
                        <h1>WEB ARENA</h1>
                    </li>
                    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a> <!-- Non responsive :(   WHYYYYY ? -->
                    </li>
                </ul>

                <section class="top-bar-section">
                    <!-- Right Nav Section -->
                    <ul class="right">

                    </ul>

                    <!-- Left Nav Section -->
                    <ul class="left">
                        <li>
                            <?php
                            echo $this->Html->link('Home', array(
                                'controller' => 'Arena',
                                'action' => 'index'));
                            ?>
                        </li>
                        <?php if(!CakeSession::check('name')){
?>
                        <li>
                            <?php
                            echo $this->Html->link('Login', array(
                                'controller' => 'Players',
                                'action' => 'login'));
                            ?>
                        </li>
                        <?php 
                        }
                        else{
                          ?>  
                           <li>
                            <?php
                            echo $this->Html->link('Logout', array(
                                'controller' => 'Arena',
                                'action' => 'logout'));
                            ?>
                        </li> 
                        <?php
                        
                        }
                        
                        ?>
                        <li>
                            <?php
                            echo $this->Html->link('Sight ', array(
                                'controller' => 'Arena',
                                'action' => 'sight'));
                            ?>
                        </li>
                        <li>
                            <?php
                            echo $this->Html->link('Character', array(
                                'controller' => 'Arena',
                                'action' => 'character'));
                            ?>
                        </li>
                        <li>
                            <?php
                            echo $this->Html->link('Diary', array(
                                'controller' => 'Arena',
                                'action' => 'diary/allevents'));
                            ?>
                        </li>
                    </ul>
                </section>
            </nav>
        </div>
    </div>
</html>