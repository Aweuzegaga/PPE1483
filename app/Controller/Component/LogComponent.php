<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LogComponent extends Component {

    public $components = array('Session');

    public function checklogout(Controller $mycontroller)
    {

        $this->Controller = $mycontroller;
        if (isset($this->Controller->data['LogOutHeader']))
        {


            $this->Session->delete('Connected');
            $this->Controller->redirect(array('controller' => 'Arenas', 'action' => 'index'));
        }
    }

    public function checklogin(Controller $mycontroller)
    {
        $this->Controller = $mycontroller;
        if (!empty($this->Controller->request->data['LoginHeader']))
        {
            $id = $this->Controller->Player->checkLogin($this->Controller->request->data['LoginHeader']['email'],
                    $this->Controller->request->data['LoginHeader']['password']);
            if (!$id)
            {
                $this->Session->setFlash('Mauvais mot de passe ou email',
                        'flash/flashdanger');
            } else
            {
                //Cette lign doit-être avant sinon mauvaise redirection
                 $this->Session->write('Connected', $id);
                if (count($this->Controller->Fighter->havePerso($this->Session->read('Connected'))) == 0)
                {
                    $this->Controller->redirect(array('controller' => 'Arenas', 'action' => 'createFighter'));
                } else
                {
                    $this->Controller->redirect(array('controller' => 'Arenas', 'action' => 'fighter'));
                }
               
              
            }
        }
    }

}
