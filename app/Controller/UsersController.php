<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');


class UsersController extends AppController
{
    
    public $uses = array('Mesure', 'User', 'MailManagement');
    public $components = array('Password', 'Log');
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'subscribe');
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }
    
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        $this->set('user', $this->User->read(null, $id));
    }
    
    public function enrol() {
        if ($this->Session->read('Connected')) {
            return $this->redirect(array('controller' => 'arena', 'action' => 'fighter'), 403);
        }
        if ($this->request->is('post')) {
            if ($this->request->data['password'] == $this->request->data['password2']) {
                $datas = $this->request->data;
                if ($this->Player->save($datas, true, array('email', 'password'))) {
                    $this->Session->setFlash(__('L\'user a été sauvegardé'));

                    // Mise en place d'un mail de confirmation à terminer
                    $mail = new CakeEmail('gmail');
                    $mail->from('noreply@localhost.com')
                            ->template('welcome')
                            ->emailFormat('html')
                            ->to($datas['email'])
                            ->viewVars(array(
                                'email' => $datas['email'],
                                'password' => $datas['password'],
                            ))
                            ->subject('Confirmation d\'inscription à Web Arena')
                            ->send();

                    return $this->redirect('/player/fighter/create/' . $this->Player->id);
                } else {
                    $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
                }
            }
        }
    }
    
    public function login() {
         
        if ($this->request->is('post')) {
            
            $user = $this->request->data['Login'];
            $player = $this->User->find('first', array(
                'conditions' => array(
                    'User.email' => $user['email'],
                    'User.password' => AuthComponent::password($user['password']))
            ));


          //  if (isset($this->request->data['Login'])) { {
             if (!empty($player)) {     
          //  if ($this->User->checklogin($this->request->data['Login']['email'], $this->request->data['Login']['password'])) {
                    debug($this->Session->read());
                if($this->Auth->login($user)){
                        die('logged');
                    }
                    $id = $player['User']['id'];
                    $this->Session->setflash("Welcome" . $this->request->data['Login']['email']);
                  //  $this->Session->write('Connected', $id);
                    $this->redirect(array("controller" => "Ppe", "action" => "accueil"));
                    }
                }
           /* }
            if (isset($this->request->data['Changepw'])) {
                if ($this->User->changepw($this->request->data['Changepw']['email'], $this->request->data['Changepw']['password'], $this->request->data['Changepw']['new']))
                    ;
                $Email = new CakeEmail('gmail');
                $Email->from('webarenaece@gmail.com');
                $Email->to($this->request->data['Changepw']['email']);
                $Email->subject('[geek fight] Password modification ');
                $Email->send('You have changed your password ! your new password is : ' . $this->request->data['Changepw']['new']);
                $this->Session->setflash("A confirmation has been sent to : " . $this->request->data['Changepw']['email']);
            }*/
        }
    //}
        public function logout()
    {
        
       /* CakeSession::destroy();
        $this->redirect(array("controller"=>"Users",
                            "action"=>"login"));*/
        $this->Session->delete('Connected');
        return $this->redirect($this->Auth->logout());    
    }

   
    public function subscribe()
    {
        if ($this->request->is('post'))
        {
            if (!empty($this->request->data['MailManagement']))
            {
                $password = $this->Password->generatePassword();
                $email = $this->request->data['MailManagement']['email'];
                //Création du mail
                //Si le mail est valide on crée un nouveau compte +envoie de mail sinon e-mail invalide

                if ($this->User->createNew($email, $password))
                {
                    if (!$this->MailManagement->sendSubcribingEmail($email, $password))
                    {
                        $this->Session->setflash('email invalide');
                    } else
                    {
                        $this->Session->setflash('Bien enregistrée, un mail vous a été envoyer !');
                       // $this->redirect(array('controller' => 'Ppe', 'action' => 'index'));
                    }
                } else
                {
                    $this->Session->setflash('Cet email existe déjà');
                }
            }
            $this->userid = $this->Log->checklogin($this);   
        }
    }
    
    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User Invalide'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'user a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        // Avant 2.5, utilisez
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User supprimé'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('L\'user n\'a pas été supprimé'));
        return $this->redirect(array('action' => 'index'));
    }
    
     

  }

 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

