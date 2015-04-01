<?php

App::uses('AppController', 'Controller');
App::uses('File', 'Utility');
App::uses('CakeEmail', 'Network/Email');
/* 
Controller qui va s'occuper de récupérer les données depuis la box
 */

class PpeController extends AppController {
    
    public $uses = array('Mesure', 'User', 'MailManagement');
    public $components = array('Password', 'Log', 'Session');
  
    public function beforeFilter()
    {
        //parent::beforeFilter();
        $this->Auth->allow('index');
          /*if (!
                CakeSession::check('name')){
            
            $this->redirect(array("controller"=>"Players",
                            "action"=>"login"));
        }*/
    }
    
    
     public function index()
    {
         $this->set('myname', "Cynthia C"); 
    }
    
    /*public function login()
    {
        if ($this->request->is('post')){
            if(isset($this->request->data['Login'])){
                $this->User->signUp($this->request->data['Login']['email'],$this->request->data['Login']['password']);  
            }
        }
 
    }
    
     public function login()
    {
         if ($this->request->is('post')) {
       
       /* if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect(array('controller' => 'Ppe', 'action' => 'accueil')));
            
        }
        $this->Session->setFlash(
            __('Username ou password est incorrect'),
            'default',
             array(),
            'auth'
        );
    }*/ 
         
         /*  if (isset($this->request->data['Login'])) { {
                    if ($this->User->checkLogin($this->request->data['Login']['email'], $this->request->data['Login']['password'])) {
                        $this->Session->setflash("Welcome" . $this->request->data['Login']['email']);
                        $this->redirect(array("controller" => "Ppe","action" => "accueil"));
                    }
                }
            }
         }
      
        /*if ($this->request->is('post'))
        {
            if (!empty($this->request->data['Login']))
            {
                $id = $this->User->checkLogin($this->request->data['Login']['email'],
                        $this->request->data['Login']['password']);
                if (!$id)
                {
                    $this->Session->setFlash('Mauvais mot de passe ou email',
                            'flash/flashdanger');
                } else
                {
                   $this->Auth->login();
                   $this->Session->write('Connected', $id);
                   $this->redirect(array('controller' => 'Ppe', 'action' => 'accueil'));
                   $this->Session->setflash("Welcome" . $this->request->data['Login']['email']);
                 
                }
            }
            
           $this->Log->checklogin($this);
        } 
    }*/
    
    
    public function logout()
    {
        /*if ($this->request->is('post'))
        {

            if (!empty($this->request->data['Logout']))
            {
                $this->Session->delete('Connected');
                $this->redirect(array('controller' => 'Ppe', 'action' => 'login'));
            }
            $this->Log->checklogout($this);
        }*/
        
        CakeSession::destroy();
        $this->redirect(array("controller"=>"Users",
                            "action"=>"login"));
    }
    
    
    public function getValues(){
         // On obtiendra la variable de la fonction login car elle y est global
        $id = $this->login();
        
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, "http://my.zipato.com:8080/zipato-web/rest/meters/");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_COOKIE, 'JSESSIONID='.$id.'; Path=/zipato-web/; HttpOnly');
        curl_setopt($c, CURLOPT_HEADER, false);

        $output = curl_exec($c);
        $json = json_decode ($output,true);
        
        $timestamp = time();
        $date = $today = date("Y-m-d H:i:s");
        foreach ($json as $meter)
        {
            $name = $meter['name'];
            foreach ($meter['attributes'] as $attribute)
            {
		$this->Mesure->createMesure($date, $attribute['value'], $meter['uuid'], $attribute['id']);              
            }
        }
    }
    
    public function showValues() {
        
        $this->getValues();
        $this->set('raw',$this->Mesure->find('all'));
    }
    
    
    public function traitement(){
        
    }
    

    
    /** &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
     * &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
     * &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
     */
   
    public function accueil()
    {
        die('Bienvenu');
    }
    public function affichage_graphique()
    {
        
    }
    public function box()
    {
        
    }
    
  
    public function profil()
    {
        
    }
    public function recover()
    {
        
    }
}
