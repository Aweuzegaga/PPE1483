<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class user extends AppModel
{
    //tableau contenant les regles de validation (sign in)
    public $validate=array('username'=>array(
        array(
        'rule'=>'alphanumeric',
        'requierd' => true,
        'allowEmpty'=> false,
        'message'=> "Votre pseudo n'est pas valide"),
 
        array(
        'rule' =>'isUnique',
        'message'=>'Ce pseudo est déjà pris')
        
        ),
        'mail'=>array(
        array(
        'rule' =>'email',
        'requierd' => true,
        'allowEmpty'=> false,
        'message'=> "Votre email n'est pas valide"),
 
        array(
        'rule' =>'isUnique',
        'message'=>'Cet email  est déjà pris')
        
        ),
        'password'=>array(
       
        'rule' =>'notEmpty',
        'message'=> "Vous devez entrer un mot de passe",
        'allowEmpty'=> false
            ),
        
        
        
        
        );
    
}

