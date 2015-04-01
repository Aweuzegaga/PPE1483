<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppModel', 'Model');
App::uses('Security', 'Utility');

class MailManagement extends AppModel {

    public $useTable = false;
    //On crée une règle de validation l'email doit être rempli
    //L'adresse e-mail doit-être valide
    //
 
    public $validate = array(
        'email' => array(
            'rule' => 'email',
           
            'message'=>'Veuillez entrer une adresse email correcte.'
         
         )
    );




    public function sendSubcribingEmail($email,$password)
    {
        $this->set($email);
        if ($this->validates())
        {
            App::uses('CakeEmail', 'Network/Email');
            $Email = new CakeEmail();
            $Email->viewVars(array('mail' => $email, 'pwd' => $password))
                    ->template('subscription', 'autoemail')
                    ->config('smtp')
                    ->emailFormat('html')
                    ->to($email)
                    ->subject('Merci de vous être inscrit(e)');
            return $Email->send();
        }
        else
        {   
            return false;
        }
    }
    public function sendRecoveryEmail($email,$password)
    {
        $this->set($email);
        if ($this->validates())
        {
            pr($password);
            App::uses('CakeEmail', 'Network/Email');
            $Email = new CakeEmail();
            $Email->viewVars(array('email' => $email,'password'=>$password))
                    ->template('recovery', 'autoemail')
                    ->from(array('webarenasi4df11@gmail.com' => 'WebArena password recovering'))
                    ->config('smtp')
                    ->emailFormat('html')
                    ->to($email)
                    ->subject('Changer le mot de passe');
            return $Email->send();
        }
        else
        {
            return false;
        }
    }

}
