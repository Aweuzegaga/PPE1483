<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppModel', 'Model');
App::uses('Security', 'Utility');

class User extends AppModel
{
    public $displayField = 'email';
 
    public $name = 'User';
    public $validate = array(
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'an email is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => ''
            )
        )
    );
    
   // public $displayField = 'name';
   // public $name = 'User';
    
     public function createNew($mail, $pwd)
    {
        if ($this->find('first',
                        array('conditions' => array('User.email' => $mail), 'fields' => 'User.email')) == NULL)
        {
            $hashpwd = Security::hash($pwd);
            $this->save(Array('email' => $mail,
                'password' => $hashpwd));
            return true;
        } else
        {
            return false;
        }
    }
    
    public function changepw($email, $pw, $new) {
        $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
        $pw = $passwordHasher->hash($pw);
        $new = $passwordHasher->hash($new);
        if ($this->accountExist($email)) { // si l email existe
            $temp = $this->find('first', array(
                'conditions' => array('User.email' => $email)));

            if ($pw == $temp['User']['password']) { // verifier le mdp correspondant
                $temp['User']['password'] = $new;
                $this->save($temp);
                return true;
            }
        }
    }
    
    
     public function checklogin($login, $pwd)
    {
        $hashpwd = Security::hash($pwd);

        //On récupère juste l'email et on laisse apache tester le mot de passe;
        $data = $this->find('first',
                array('conditions' => array('User.email' => $login)));
        
        if (count($data) != 0)
        {
            if ($data['User']['password'] != $hashpwd)
            {
                return false;
            } else
            {
                CakeSession::start();
                CakeSession::write('name', $temp['User']['id']);
                //return $data['User']['id'];
                return true;
            }
        }
        else{
            return false;
        }
    }

    
}

