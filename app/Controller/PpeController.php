<?php

App::uses('AppController', 'Controller');

/* 
Controller qui va s'occuper de récupérer les données depuis la box
 */

class PpeController extends AppController {
    
    public $uses = array('Mesure');
    
    public function login() {
        
        date_default_timezone_set('Europe/Paris');
        $url = 'http://my.zipato.com:8080/zipato-web/json/Initialize';
        $username = 'mathieu.yahiko@gmail.com';
        $password = 'PPE1483';

        $json = json_decode(file_get_contents($url));
        $sid = 'jsessionid';
        $none = 'nonce';
        
        global $id;
        $id = $json->{$sid};
        $nonce = $json->{$none};



        $temp = sha1 ($password);
        $temp2 = $nonce.$temp;
        $pass = sha1($temp2);

        $data = array("username" => "$username", "password" => "$pass", "method" => "SHA1" );
        $data_url = "username=$username&password=$pass&method=SHA1";



        $ch = curl_init('http://my.zipato.com:8080/zipato-web/json/Login');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_COOKIE, 'JSESSIONID='.$id);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $output = curl_exec($ch);
        
        return $id;
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
    
    public function subscribe(){
        if ($this->request->is('post'))
        {

            if (!empty($this->request->data['MailManagement']))
            {
                $password = $this->Password->generatePassword();
                //Création du mail
                //Si le mail est valide on crée un nouveau compte +envoie de mail sinon e-mail invalide


                if ($this->Player->createNew($this->request->data['MailManagement']['email'],
                                $password))
                {
                    if (!$this->MailManagement->sendSubcribingEmail($this->request->data['MailManagement']['email'],
                                    $password))
                    {
                        $this->Session->setFlash('email invalide',
                                'flash/flashdanger');
                    } else
                    {
                        $this->Session->setFlash('Un email vient de vous être envoyé',
                                'flash/flashok');
                    }
                } else
                {
                    $this->Session->setFlash('Cet email existe déjà',
                            'flash/flashdanger');
                }
            }
            //$this->playerid = $this->Log->checklogin($this);
        }
    }
    
    public function traitement(){
        
    }
    

    
    /** &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
     * &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
     * &&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&&
     */
    public function index()
    {
        
    }
    public function accueil()
    {
        
    }
    public function affichage_graphique()
    {
        
    }
    public function box()
    {
        
    }
    public function log_in()
    {
        
    }
    public function log_out()
    {
        
    }
    public function profil()
    {
        
    }
    public function recover()
    {
        
    }
}
