<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppModel', 'Model');

class Mesure extends AppModel {
    public $displayField = 'valeur';
    
    public function createMesure($date, $valeur, $uuidequip, $idequip){
        $newMesure = array (
            'Mesure' => array (
                'date' => $date,
                'valeur' => $valeur,
                'uuidEquipement' => $uuidequip,
                'idEquipement' => $idequip
                )
            );
        $this->create();
        $this->save($newMesure);
    }

}