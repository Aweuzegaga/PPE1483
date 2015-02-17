<?php
class UsersController extends AppController
{
   function signup()
    {
       if($this->request->is('post')) 
           { 
           $d = $this->request->data;
           $d['User']['id'] = null;
           if($this->User->save($d,true,array('username','password','mail')))
               {
               
               }
               
           } 
           }

    }

 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

