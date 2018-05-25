<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class User extends Entity{

    protected $_accessible = [
        'user_group_id' => true,
        'full_name' => true,
        'photo' => true,
        'phone' => true,
        'phone_uid'=>true,
        'email' => true,
        'password' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'user_group' => true
    ];

    protected $_hidden = [
        'user_group_id',
        'password',
        'phone_uid',
        #'created',
        'modified'
    ];

    protected function _getNameAndPhone(){
        return $this->_properties['full_name'] .' - '. $this->_properties['phone'];
    }

    /*protected function _getPhoto(){
        return 'full_path_to_photo/' . $this->_properties['photo'];
    }*/
}
